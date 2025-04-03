<?php 
 include"config.php";
 session_start();
 if(!isset($_SESSION["username"]))  
	{
		header("location:admin.php");
	}
	else
	{
		if(isset($_GET['delete_id']))
		{
			$delete_id=$_GET['delete_id'];
			$sql = "DELETE FROM product_details WHERE id='$delete_id'";
			if($con->query($sql))
			{
				echo"<script>windows.open('product_details.php')</script>";
			}
			else
			{
				echo"<script>windows.open('admin_main.php')</script>";
				
			}
		}
		$sql="SELECT * FROM product_details";
		$res=$con->query($sql);
		$no_of_products=$res->num_rows;
		$no_of_products_per_page=2;
		$no_of_pages=ceil($no_of_products/$no_of_products_per_page);
		//echo $no_of_pages;
		$page=1;
		if(isset($_GET['page']))
		{
			$page=$_GET['page'];
		}
		$start_limit=($page-1)*$no_of_products_per_page;
		$sql1="SELECT * FROM product_details limit $start_limit,$no_of_products_per_page";
		$res1=$con->query($sql1);
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>e-commerce</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	<body style="background-color:#a4bbd5">
		<?php include"sidenav.php" ?>
        <div class="col ml-5">
            <!-- Start Content-->
                    <div class="container-fluid">
						<div class="row">
                            <div class="col-12">
                                <div class="card-box" style="padding: 10px;">
                                    <h4 class="header-title">Product List</h4>
                                    <p class="text-right">
                                      <a href="add_product.php" class="btn btn-primary btn-radius">Add Product</a>
                                    </p>
                                        <table class="table table-xxl table-bordered">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>SI No</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
												<th>Category</th>
												<th>Original Amount</th>
												<th>Discount Amount</th>
												<th>Description</th>
												<th>Image</th>
                                                <th>Date</th>
												<th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
												while($row=$res1->fetch_assoc())
												{
													$id=$row["id"];
													$product_name=$row["product_name"];
													$product_code=$row["product_code"];
													$category=$row["category"];
													$original_amount=$row["original_amount"];
													$discount_amount=$row["discount_amount"];
													$description=$row["description"];
													$image=$row["image"];
													$date=$row["date"];
                                                ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $product_name; ?></td>
                                                <td><?php echo $product_code; ?></td>
                                                <td><?php echo $category; ?></td>
												<td><?php echo $original_amount; ?></td>
												<td><?php echo $discount_amount; ?></td>
												<td><?php echo $description; ?></td>
												<td><?php echo "<img style='height:50px;width:50px;'src='product/$image'>"; ?></td>
                                                <td><?php echo $date; ?></td>
												<td>
                                                    <?php 
                                                        echo "<a href='product_details.php?delete_id=$id'><i style='color:red;font-weight:10px;' class='fa fa-trash delete'></i></a>"; 
                                                    ?>
                                                </td>
                                            </tr>
											<?php
												}
											?>
                                            </tbody>
                                        </table>
										
                                </div> <!-- end card-box -->
								<?php 
										for($i=1;$i<$no_of_pages+1;$i++)
										{
											if($page==$i)
											{
												echo "<a href='product_details.php?page={$i}' class='link active'>{$i}</a>";
											}
											else
											{
												echo "<a href='product_details.php?page={$i}' class='link'>{$i}</a>";
											}
										}
										?>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->
        </div>
    </div>
</div>
	</body>
	<style>
	.link{
		padding:15px;
		text-decoration:none;
		margin-left:10px;
		border:1px solid #ccc;
		}
		.active{
			background-color:green;
			color:white;
		}
	</style>
</html>
<?php
	}
	?>
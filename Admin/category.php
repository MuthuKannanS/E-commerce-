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
			$sql = "DELETE FROM category WHERE id='$delete_id'";
			if($con->query($sql))
			{
				echo"<script>windows.open('category.php')</script>";
			}
			else
			{
				echo"<script>windows.open('admin_main.php')</script>";
				
			}
		}
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
                                    <h4 class="header-title">Category List</h4>
                                    <p class="text-right">
                                      <a href="add_category.php" class="btn btn-primary btn-radius">Add Category</a>
                                    </p>
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>SI No</th>
                                                <th>Category Name</th>
                                                <th>Category Code</th>
                                                <th>Date</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
                                                    $sql="SELECT * FROM category";
                                                    $res=$con->query($sql);
                                                    $i=0;
                                                    while($row=$res->fetch_assoc())
                                                    {
                                                        $i=$i+1;
                                                        $id=$row["id"];
                                                        $category_name=$row["category_name"];
                                                        $category_code=$row["category_code"];
                                                        $date=$row["date"];
                                                ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $category_name; ?></td>
                                                <td><?php echo $category_code; ?></td>
                                                <td><?php echo $date; ?></td>
												<td>
                                                    <?php 
                                                        echo "<a href='category.php?delete_id=$id'><i style='color:red;font-weight:10px;' class='fa fa-trash delete'></i></a>"; 
                                                    ?>
                                                </td>
                                            </tr>
											<?php
												}
											?>
                                            </tbody>
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->
        </div>
    </div>
</div>
	</body>
	
</html>
<?php
	}
	?>
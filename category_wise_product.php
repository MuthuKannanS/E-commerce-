<?php 
 include"config.php";
 session_start();
 if(!isset($_SESSION["username"]))  
	{
		header("location:admin.php");
	}
	else
	{
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
		<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Category</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fa fa-home"></i> <span class="ms-1 d-none d-sm-inline">All Category</span>
                        </a>
                    </li>
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
                    <li>
                        <a href='<?php echo"category_display.php?cat_name=$category_name"; ?>' class="nav-link px-0 align-middle">
                            <span class="ms-1 d-none d-sm-inline"><?php echo $category_name; ?></span> </a>
                    </li>
                    <?php
						}
					?>
					<li>
                        <a href="main.php" class="nav-link px-0 align-middle">
                            <i class="fa fa-angle-left"></i> <span class="ms-1 d-none d-sm-inline">Back</span></a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col-12">
            <div class="row m-4">
				<?php
					$sql="SELECT * FROM product_details";
					$res=$con->query($sql);
					$i=0;
					while($row=$res->fetch_assoc())
					{
						$i=$i+1;
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
				<div class="col-2 pt-2">
					<div class="card">
						<?php echo "<img class='card-img-top' alt='...' style='height:150px;width:150px;text-align:center;margin-left:15px;'src='admin/product/$image'>"; ?>
					  <div class="card-body">
						<h5 class="card-title"><?php echo $product_name; ?>&nbsp;&nbsp;<a href='<?php echo "detail_view.php?product_id=$id";?>'><i class="fa fa-angle-double-right" style="font-size:36px;"></i></a></h5>
						<p class="card-text">Amount:<b><?php echo $discount_amount; ?></b>&nbsp;&nbsp;<i class="text-decoration-line-through" style="color:red;"><?php echo $original_amount; ?></i></p>
						<a href='<?php echo "payment.php?product_id=$id";?>' class="btn btn-primary">Buy <i class="fa fa-refresh"></i></a>
						<a href='<?php echo "your_order.php?product_id=$id";?>' class="btn btn-success">Add&nbsp;<i class="fa fa-cart-arrow-down"></i></a>
					  </div>
					</div>
				</div>
				<?php 
					}
					?>
			</div>
        </div>
    </div>
</div>
	</body>
</html>
<?php 
	}
	?>
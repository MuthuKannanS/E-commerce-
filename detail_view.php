<?php 
 include"config.php";
 session_start();
    if (!isset($_SESSION["username"]))  
	{
		header("Location:index.php");
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
		<div class="container-fluid ">
		<?php
                if(isset($_GET['product_id']))
                {
					$product_id=$_GET['product_id'];
                    $get_id=$_GET["product_id"];
                    $sql="SELECT * from product_details where id='$get_id'";
                    $res=$con->query($sql);
                    if($row=$res->fetch_assoc())
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
					}
				}
		?>
		<h1 class="mb-4"><?php echo $product_name; ?></h1>
        <div class="row col-12">
			<div class="col-6">
				<?php echo "<img style='height:80%;width:70%;'src='admin/product/$image' class='img-fluid mb-4' alt='Blog Image'>"; ?>
			</div>
			<div class="col-6">
				<h2 style="color:Green;">Description</h2>
				<p><?php echo $description; ?></p>
				<h5 style="color:Green;">product_code</h5>
				<p><?php echo $product_code; ?></p>
				<h5 style="color:Green;">date</h5>
				<p><?php echo $date; ?></p>
				<h5 style="color:Green;">Amount</h5>
				<p><?php echo $discount_amount; ?></p>
				<p class="float-start">
				  <a href='<?php echo "your_order.php?product_id=$id";?>' class="btn btn-warning btn-radius">Add to card</a>
				</p>
				<p class="float-end">
				  <a href='<?php echo "payment.php?product_id=$id";?>' class="btn btn-primary btn-radius">Buy product</a>
				</p>
			</div>
        </div>
		<h1 style="color:green;"> Related Products </h1>
			<div class="row m-4">
			<?php
					$sql="SELECT * FROM product_details where category='$category'";
					$res=$con->query($sql);
					$i=0;
					while($row=$res->fetch_assoc())
					{
						$i=$i+1;
						$id=$row["id"];
						$product_name=$row["product_name"];
						$product_code=$row["product_code"];
						$original_amount=$row["original_amount"];
						$discount_amount=$row["discount_amount"];
						$description=$row["description"];
						$image=$row["image"];
						$date=$row["date"];
				?>
				<div class="col-2 pt-4">
					<div class="card">
						<?php echo "<img class='card-img-top' alt='...' style='height:150px;width:150px;text-align:center;margin-left:15px;'src='assets/images/product/$image'>"; ?>
					  <div class="card-body">
						<h5 class="card-title"><?php echo $product_name; ?>&nbsp;&nbsp;<a href='<?php echo "detail_view.php?product_id=$id";?>'><i class="fa fa-angle-double-right" style="font-size:36px;"></i></a></h5>
						<p class="card-text">Amount:<b><?php echo $discount_amount; ?></b>&nbsp;&nbsp;<i class="text-decoration-line-through" style="color:red;"><?php echo $original_amount; ?></i></p>
						<a href='<?php echo "payemnt.php?product_id=$id";?>' class="btn btn-primary">Buy <i class="fa fa-refresh"></i></a>
						<a href='<?php echo "your_order.php?product_id=$id";?>' class="btn btn-success">Add&nbsp;<i class="fa fa-cart-arrow-down"></i></a>
					  </div>
					</div>
				</div>
				<?php 
					}
					?>
			</div>
		</div>
	</body>
</html>
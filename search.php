<?php
    include "config.php";
    session_start();
    if (!isset($_SESSION["username"]))  
	{
		header("Location:login.php?mes=error");
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
	</head>
	<body style="background-color:#a4bbd5">
		<?php include"top_nav.php"; ?>
		<div class="container-fluid ">
			<div class="row m-4">
				<?php
				if(isset($_GET["submit"]))
				{
					$x=$_GET["search"];
					$sql="SELECT * FROM product_details WHERE CONCAT(product_name,description) LIKE '%$x%'";
					$res=$con->query($sql);
					while($row=$res->fetch_assoc())
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
				<div class="col-2 pt-2">
					<div class="card">
						<?php echo "<img class='card-img-top' alt='...' style='height:150px;width:150px;text-align:center;margin-left:15px;'src='assets/images/product/$image'>"; ?>
					  <div class="card-body">
						<h5 class="card-title"><?php echo $product_name; ?>&nbsp;&nbsp;<a href='<?php echo "detail_view.php?product_id=$id";?>'><i class="fa fa-angle-double-right" style="font-size:36px;"></i></a></h5>
						<p class="card-text">Amount:<b><?php echo $discount_amount; ?></b>&nbsp;&nbsp;<i class="text-decoration-line-through" style="color:red;"><?php echo $original_amount; ?></i></p>
						<a href=""  class="btn btn-primary">Buy <i class="fa fa-refresh"></i></a>
						<a href='<?php echo "your_order.php?product_id=$id";?>' class="btn btn-success">Add&nbsp;<i class="fa fa-cart-arrow-down"></i></a>
					  </div>
					</div>
				</div>
				<?php
				}
				}
				?>
			</div>
		</div>

	</body>
	<script src="asstes/js/scripts.js"></script>
</html>
	<?php
		}
	?>
  
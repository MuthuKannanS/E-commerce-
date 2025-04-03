<?php
	include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>e-commerce</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	<body style="background-color:#a4bbd5">
		<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
		  <div class="container-fluid">
			<a class="navbar-brand" href="index.php"><img src="assets/images/logo1.jpg" style="height:35px;width:50px;" alt="..."></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="login.php">Sign in</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="register.php">Sign up</a>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>
		<div class="container-fluid ">
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
				<div class="col-2 pt-4">
					<div class="card">
						<?php echo "<img class='card-img-top' alt='...' style='height:150px;width:150px;text-align:center;margin-left:15px;'src='admin/product/$image'>"; ?>
					  <div class="card-body">
						<h5 class="card-title"><?php echo $product_name; ?>&nbsp;&nbsp;<a href='<?php echo "detail_view.php?product_id=$id";?>'><i class="fa fa-angle-double-right" style="font-size:36px;"></i></a></h5>
						<p class="card-text">Amount:<b><?php echo $discount_amount; ?></b>&nbsp;&nbsp;<i class="text-decoration-line-through" style="color:red;"><?php echo $original_amount; ?></i></p>
						<button onclick="myFunction()" class="btn btn-primary">Buy <i class="fa fa-refresh"></i></button>
						<button  onclick="myFunction()" class="btn btn-success">Add&nbsp;<i class="fa fa-cart-arrow-down"></i></button>
					  </div>
					</div>
				</div>
				<?php 
					}
					?>
			</div>
		</div>
		<script>
			function myFunction(){
				Swal.fire("Please Login And Purchase!");
			}
		</script>
	</body>
</html>
	  
  
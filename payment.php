<?php 
 include"config.php";
 session_start();
 if(!isset($_SESSION["username"]))  
	{
		header("location:admin.php");
	}
	else
	{
		$username=$_SESSION["username"];
		if(isset($_GET['product_id']))
		{
			$product_id=$_GET['product_id'];
			$sql="SELECT * FROM product_details WHERE id='$product_id'";
			$res=$con->query($sql);
			$row=$res->fetch_assoc();
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
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>e-commerce</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
		<link rel="stylesheet" href="assets/css/style.css">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	<body style="background-color:#a4bbd5">
	<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
		  <div class="container-fluid">
			<a class="navbar-brand" href="main.php"><img src="assets/images/logo1.jpg" style="height:35px;width:50px;" alt="..."></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link active" href="profile.php" date-username="<?php echo $product_code; ?>">Your Profile</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="your_order.php">Your Order</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="main.php">Back</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="logout.php">logout</a>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>
		<div class="container-fluid ">
			<div class="row m-4">
				<div class="col-2 pt-2">
					<div class="card">
						<?php echo "<img class='card-img-top' alt='...' style='height:150px;width:150px;text-align:center;margin-left:15px;'src='admin/product/$image'>"; ?>
					  <div class="card-body">
						<input type="hidden" id="username" value="<?php echo $username; ?>">
						<input type="hidden" id="product_id" value="<?php echo $product_code; ?>">
						<input type="hidden" id="amount" value="<?php echo $discount_amount; ?>">
						
						<h5class="card-title"><?php echo $product_name; ?>&nbsp;&nbsp;<a href='<?php echo "detail_view.php?product_id=$id";?>'><i class="fa fa-angle-double-right" style="font-size:36px;"></i></a></h5>
						<p id="" class="card-text">Amount:<b><?php echo $discount_amount; ?></b>&nbsp;&nbsp;<i class="text-decoration-line-through" style="color:red;"><?php echo $original_amount; ?></i></p>
						<a href="javascript:void(0)" class="btn btn-success buy_now" >Pay Amount <i class="fa fa-refresh"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
	<script src="asstes/js/scripts.js"></script>
	
</html>
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<script>

	  $('body').on('click', '.buy_now', function(e){
		var username = $("#username").val();
		var totalAmount = $("#amount").val();
		var product_id =  $("#product_id").val();
		var options = {
		"key": "rzp_test_h7E4PCXjB1N6Rk",
		"amount":"<?php echo $discount_amount*100; ?>", // 2000 paise = INR 20
		"name": "<?php echo $product_name; ?>",
		"description": "Payment",
		"image": "http://localhost/E-commerce/admin/'<?php echo $image; ?>'",
		"handler": function (response){
			  $.ajax({
				url: 'payment-process.php',
				type: 'post',
				dataType: 'json',
				data: {
					razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id, username : username,
				}, 
				success: function (msg) {

				   window.location.href = 'success.php';
				}
			});
		 
		},

		"theme": {
			"color": "#528FF0"
		}
	  };
	  var rzp1 = new Razorpay(options);
	  rzp1.open();
	  e.preventDefault();
	  });

	</script>
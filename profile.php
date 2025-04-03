<?php
    include "config.php";
    session_start();
    if (!isset($_SESSION["username"]))  
	{
		header("Location:login.php?mes=error");
	}
	else
	{
		$username=$_SESSION["username"];
        $sql="SELECT * FROM user_details WHERE mobile_no='$username'";
        $res=$con->query($sql);
        if($row=$res->fetch_assoc())
        {
            $username=$row["username"];
            $user_id=$row["user_id"];
            $email=$row["email"];
            $mobile_no=$row["mobile_no"];
			
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>e-commerce</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/style.css">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	<body style="background-color:#a4bbd5">
		<?php include"top_nav.php"; ?>
		<div class="container p-5 ">
			<div class="card text-center">
			  <div class="card-header">
				Your Details
			  </div>
			  <div class="card-body">
				 <div class="row">
					<div class="col-6">
						<h4 class="card-title" style="color:red;font-weight:10px;">Customer ID:<?php echo"$user_id" ?></h4>
						<h5 class="card-title">User name:<?php echo"$username" ?></h5>
						<h5 class="card-title">Mobile no:<?php echo"$mobile_no" ?></h5>
						<h5 class="card-title">Email:<?php echo"$email" ?></h5>
						<h6>Your Order: 0</h6>
					</div>
					<div class="col-6">
						<img src="assets/images/profile.jpg" style="height:150px;width:150px;" alt="Image" >
					</div>	
				</div>
			  </div>
			  <div class="card-footer text-muted">
				<a href="main.php" class="btn btn-primary">Place your Order</a>
			  </div>
			</div>
		</div>
	</body>
	<script src="asstes/js/scripts.js"></script>
</html>
	<?php
		}
	}
	?>
  
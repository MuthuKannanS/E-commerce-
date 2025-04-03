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
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	<body style="background-color:#a4bbd5">
		<div class="container col-12 pt-5 my-5">
			<h1>Register</h1>
			<form method="post" action="register.php">
				<div class="row col-12">
					  <div class="form-group col-4 pt-4">
						<label>UserName</label>
						<input type="username" name="username" class="form-control"  placeholder="Enter Your Name" required>
					</div>
					  <div class="form-group col-4 pt-4">
						<label>MobileNO</label>
						<input type="text" name="mobile_no" class="form-control" placeholder="Enter Your Mobileno" required>
					  </div>
					  <div class="form-group col-4 pt-4">
						<label>Email</label>
						<input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
					  </div>
					  <div class="form-group col-4 pt-4">
						<label>Pincode</label>
						<input type="text" name="pincode" class="form-control" placeholder="Enter Your Pincode" required>
					  </div>
					  <div class="form-group col-4 pt-4">
						<label>Create Password</label>
						<input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
					  </div>
					  <div class="form-group col-4 pt-4">
						<label>Confirm Password</label>
						<input type="text" name="confirm_password" class="form-control" placeholder="Confirm password" required>
					  </div>
				</div>
				<div class="row col-12">
					<div class="form-group col-6 pt-5">
						<button type="submit" name="submit" class="btn btn-primary ">Submit</button>
					</div>
					<h5 class="form-group col-6 pt-5">If you have a Account Please <a href="login.php" style="color:red">Login here!</a></h5>
				</div>
			</form>
			<?php 
				if(isset($_POST['submit']))
				{
					$username=$_POST['username'];
					$mobile_no=$_POST['mobile_no'];
					$email=$_POST['email'];
					$pincode=$_POST['pincode'];
					$sql="SELECT * FROM user_code";
					$res=$con->query($sql);
					$row=$res->fetch_assoc();
					$old_user_id=$row["code"];
					$user_id=$old_user_id+1;
					$sql="UPDATE user_code SET code='$user_id'";
					$con->query($sql);
					$customer_id="BBC$user_id";
					$password=$_POST['password'];
					$confirm_password=$_POST['confirm_password'];
					if($password==$confirm_password)
					{
						$sql="INSERT INTO user_details(username,user_id,mobile_no,email,pincode,password) VALUES('$username','$customer_id','$mobile_no','$email','$pincode','$password') ";
						if($con->query($sql))
						{
						 echo "<script> Swal.fire({
							  icon: 'success',
							  title: 'Good Job!',
							  text: 'Login Successfully',
								});</script>";
						echo"<script>window.open('login.php','_self')</script>";
						}
						 else
							{
								echo "<script>Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Invalid Username/Password!',
									});</script>";
							}				
					}
				}
			?>
		</div>
	</body>
</html>
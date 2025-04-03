<?php
	include "config.php";
	session_start();
    if(isset($_SESSION["username"]))  
	{
		header("location:main.php");
	}
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
		<div class="container col-6 pt-5 my-5">
			<h1>Login</h1>
			<?php
				if(isset($_GET["mes"]))
				{
					echo ' <p class="mb-4 mt-3" style="color:yellow" >Please Login Here!!!</p>';
				}
			?>
			<form method="post" action="login.php">
				<div class="form-group pt-4">
					<label>Mobile no</label>
					<input type="text" name="mobile_no" class="form-control" placeholder="Enter Your mobile no" required>
				</div>
				<div class="form-group pt-4">
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
				</div>
				<div class="row col-12">
					<div class="form-group col-6 pt-5">
						<button type="submit" name="submit" class="btn btn-primary ">Submit</button>
					</div>
					<h5 class="form-group col-6 pt-5">If you Don't have a Account Please <a href="register.php" style="color:red">Register here!</a></h5>
				</div>
			</form>
			<?php
				if(isset($_POST["submit"]))
				{	
					
					$username=$_POST["mobile_no"];
					$password=$_POST["password"];
					$sql="SELECT * FROM user_details WHERE (mobile_no='$username' AND password='$password')";
					$res=$con->query($sql);
					if($row=$res->fetch_assoc())
					{
						/*$_SESSION["username"]=$row["mobile_no"];
						$username=$row["username"];
						$mobile_no=$row["mobile_no"];
						$remarks=$mobile_no." "."login";
						$date= date('Y-m-d');
						$time= date('H:i:s');
						$sql2="INSERT INTO user_activity(username,mobile_no,remarks,date,time)VALUES('$username','$mobile_no','$remarks','$date','$time')";
						if($con->query($sql2))
						{*/
							$_SESSION["username"]=$username;
							echo "$username";
							echo "<script>window.open('main.php','_self');</script>";
						#}
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
		  ?>
		</div>
	</body>
</html>
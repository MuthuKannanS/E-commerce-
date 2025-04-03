<?php 
 include"config.php";
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
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body style="background-color:#a4bbd5">
		<?php include"sidenav.php" ?>
        <div class="col ml-5 py-3">
            <h1>Add Category</h1>
			<form method="post" action="add_category.php">
				<div class="row col-12">
					  <div class="form-group col-4 pt-4">
						<label>Category Name</label>
						<input type="text" name="c_name" class="form-control"  placeholder="Enter Your Category Name" required>
					</div>
					  <div class="form-group col-4 pt-4">
						<label>Date</label>
						<input type="date" name="date" class="form-control" required>
					  </div>
				</div>
				<div class="row col-12">
					<div class="form-group col-6 pt-5">
						<button type="submit" name="add" class="btn btn-primary ">Submit</button>
					</div>
				</div>
			</form>
			<?php
				if(isset($_POST["add"]))
				{
					$category_name=$_POST["c_name"];
					$date=$_POST["date"];
					$sql="SELECT * FROM category_code";
					$res=$con->query($sql);
					$row=$res->fetch_assoc();
					$old_cat_id=$row["cat_code"];
					$cat_id=$old_cat_id+1;
					$sql="UPDATE category_code SET cat_code='$cat_id'";
					$con->query($sql);
					$category_id="BBCAT$cat_id";
					$sql="INSERT INTO category (category_name,category_code,date) VALUES ('$category_name','$category_id','$date')";
					if($con->query($sql))
					{
						echo "<script> Swal.fire({
							  icon: 'success',
							  title: 'Good Job!',
							  text: 'Category Added Successfully',
								});</script>";
						echo "<script>window.open('category.php','_self')</script>";
					}
					else
					{
						echo "<script> Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Somthing Wrong ..',
									});</script>";
						echo "<script>window.open('add_category.php','_self')</script>";
					}
				}
			?>
        </div>
    </div>
</div>
	</body>
</html>
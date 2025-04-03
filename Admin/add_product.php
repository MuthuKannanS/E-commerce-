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
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body style="background-color:#a4bbd5">
		<?php include"sidenav.php" ?>
        <div class="col ml-5 py-3">
            <h1>Add Category</h1>
			<form method="post" enctype="multipart/form-data">
				<div class="row col-12">
					<div class="form-group col-4 pt-4">
						<label>Product Name</label>
						<input type="text" name="p_name" class="form-control"  placeholder="Enter Your Product Name" required>
					</div>
					<div class="form-group col-4 pt-4">
						<label>Category</label>
						<select name="c_name" class="form-control" required>
						<?php
						$sql="SELECT * FROM category";
						$res=$con->query($sql);
						while($row=$res->fetch_assoc())
						{
							$cat_name=$row["category_name"];
							echo "<option>$cat_name</option>";
						}
						?>
						</select>
					</div>
					<div class="form-group col-4 pt-4">
						<label>Original Amount</label>
						<input type="text" name="o_amount" class="form-control"  placeholder="Enter Amount" required>
					</div>
					<div class="form-group col-4 pt-4">
						<label>Discount Amount</label>
						<input type="text" name="d_amount" class="form-control"  placeholder="Enter Amount" required>
					</div>
					<div class="form-group col-4 pt-4">
						<label>Description</label>
						<textarea name="description" class="form-control" placeholder="Enter Description" required></textarea>
					</div>
					<div class="form-group col-4 pt-4">
						<label>Image</label>
						<input type="file" name="file" class="form-control" required>
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
					$product_name=$_POST["p_name"];
					$category_name=$_POST["c_name"];
					$o_amount=$_POST["o_amount"];
					$d_amount=$_POST["d_amount"];
					$description=$_POST["description"];
					$date=$_POST["date"];
					$sql="SELECT * FROM product_code";
					$res=$con->query($sql);
					$row=$res->fetch_assoc();
					$old_p_id=$row["p_code"];
					$p_id=$old_p_id+1;
					$sql="UPDATE product_code SET p_code='$p_id'";
					$con->query($sql);
					$product_id="BBP$p_id";
                    $image =basename($_FILES['file']['name']);
					$target_dir ="assets/images/product/";
					$target_file_path=$target_dir.$image;
					if (move_uploaded_file($_FILES["file"]["tmp_name"],$target_file_path))
					{
						$sql="INSERT INTO product_details (product_name,product_code,category,original_amount,discount_amount,description,date,image) VALUES ('$product_name','$product_id','$category_name','$o_amount','$d_amount','$description','$date','$image')";
						if($con->query($sql))
						{
							echo "<script> Swal.fire({
							  icon: 'success',
							  title: 'Good Job!',
							  text: 'Product Added Successfully',
								});</script>";
							echo "<script>window.open('product_details.php','_self')</script>";
						}
						else
						{
							echo "<script>Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Somthing Wrong ..',
									});</script>";
							echo "<script>window.open('add_product.php','_self')</script>";
						}
					}
				}
			?>
        </div>
    </div>
</div>
	</body>
</html>
<?php
	}
	?>
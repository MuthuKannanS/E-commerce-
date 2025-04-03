<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
		  <div class="container-fluid">
			<a class="navbar-brand" href="main.php"><img src="assets/images/logo1.jpg" style="height:35px;width:50px;" alt="..."></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link active" href="profile.php">Your Profile</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="your_order.php">Your Order</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="category_wise_product.php">Category Wise</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="main.php">Back</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="logout.php">logout</a>
				</li>
			  </ul>
			  <form method="GET" class="d-flex" action="search.php">
				<input class="form-control me-2" type="text" name="search"  value="<?php if(isset($_GET['search'])){echo $_GET['search']; }?>">
				<button class="btn btn-outline-success" name="submit" type="submit">Search</button>
			  </form>
			</div>
		  </div>
		</nav>
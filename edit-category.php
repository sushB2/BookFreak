<?php
session_start();
if (!isset($_SESSION["admin_login"])) {
   header("Location: admin_login.php");

}


	#if category id is not set
	if (isset($_SESSION['id'])) {
		# redirect to admin.php 
		header("Location: admin.php");
		exit;
	}

	$id = $_GET['id'];

	
require_once "database.php";
require_once "func_job.php";
require_once "func_category.php";

$categories = get_all_category($conn);

    #if the ID is invalid
    if ($categories == 0) {
    	# redirect to admin.php 
		header("Location: admin_home.php");
		exit;
    }



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
     <div class="container">
			 <nav class="navbar navbar-expand-lg bg-light">
		  <div class="container-fluid">
			
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="btn btn-primary" aria-current="page" href="index.php">Opportunity Hire</a>
				</li>
				
				<li class="nav-item">
				   <a href="logout.php" class="btn btn-primary">Logout</a>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>

		<form action="php/edit-category.php" method="post" class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem">
			<h1 class="text-center pb-5 display-4 fs-3">
				Update Category
			</h1>

			<!-- Alert -->

			<?php if (isset($_GET['error'])) { ?>
		  	<div class="alert alert-info" role="alert">
			  <?=htmlspecialchars($_GET['error']); ?>
			</div>
			<?php } ?>

			<?php if (isset($_GET['success'])) { ?>
		  	<div class="alert alert-success" role="alert">
			  <?=htmlspecialchars($_GET['success']); ?>
			</div>
			<?php } ?>

			<div class="mb-3">
			    <label class="form-label">Category Type</label>
			    
			    <!--id and name show in edit -->
			    <input type="text"
			    value="<?=$category['id']?>" 
			    hidden  
			    name="category_id">

			    <input type="text" class="form-control"
			    value="<?=$category['type']?>" 
			    name="category_name">
			</div>

			 <button type="submit" class="btn btn-primary">Edit Category</button>
		</form>

		
	 </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

 ?>
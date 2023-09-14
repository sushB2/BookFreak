<?php
session_start();

#if the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {


	#if author id is not set
	if (isset($_SESSION['id'])) {
		# redirect to admin.php 
		header("Location: admin.php");
		exit;
	}

	$id = $_GET['id'];

	
	#database connection file
	include "db_conn.php";

	#author helper fiction
    include "php/func-author.php";
    $authors = get_author($conn, $id);


    #if the ID is invalid
    if ($authors == 0) {
    	# redirect to admin.php 
		header("Location: admin.php");
		exit;
    }



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Author</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
     <div class="container">
			 <nav class="navbar navbar-expand-lg bg-light">
		  <div class="container-fluid">
			<a class="navbar-brand" href="admin.php">Admin</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link" aria-current="page" href="index.php">Books</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="add-book.php">Add Book</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="add-category.php">Add Category</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="add-author.php">Add Author</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="logout.php">Logout</a>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>

		<form action="php/edit-author.php" method="post" class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem">
			<h1 class="text-center pb-5 display-4 fs-3">
				Edit Author
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
			    <label class="form-label">Author Name</label>
			    
			    <!--id and name show in edit -->
			    <input type="text"
			    value="<?=$authors['id']?>" 
			    hidden  
			    name="authors_id">

			    <input type="text" class="form-control"
			    value="<?=$authors['name']?>" 
			    name="authors_name">
			</div>

			 <button type="submit" class="btn btn-primary">Edit Author</button>
		</form>

		
	 </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>


<?php }else{
  header("Location: login.php");
  exit;
} ?>
<?php
session_start();

#if the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {


	#if book id is not set
	if (isset($_SESSION['id'])) {
		# redirect to admin.php 
		header("Location: admin.php");
		exit;
	}

	$id = $_GET['id'];

	#database connection file
	include "db_conn.php";

	#Book helper fucntion
	include "php/func-book.php";
    $book = get_books($conn, $id);

    #if the ID is invalid
    if ($book == 0) {
    	# redirect to admin.php 
		header("Location: admin.php");
		exit;
    }

	 #author helper fiction
    include "php/func-author.php";
    $author = get_all_author($conn);

	#category helper fiction
    include "php/func-category.php";
    $categories = get_all_category($conn);

	
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Book</title>
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
				  <a class="nav-link active" href="add-book.php">Add Book</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="add-category.php">Add Category</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="add-author.php">Add Author</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="logout.php">Logout</a>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>


		<!-- multipart/form-data which is used in form element that have a file upload. -->
		<form action="php/edit-book.php" method="post" enctype="multipart/form-data" class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem">
			<h1 class="text-center pb-5 display-4 fs-3">
				Edit Book
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
			    <label class="form-label">Book Title</label>

			    <input type="text"
			    hidden
			    value="<?=$book['id']?>" 
			    name="book_id">

			    <input type="text"
			    value="<?=$book['title']?>" 
			    class="form-control"
			    name="book_title">
			</div>

			<div class="mb-3">
			    <label class="form-label">Book Description</label>
			    <input type="text" 
			    value="<?=$book['description']?>" 
			    class="form-control"
			    name="book_description">
			</div>

			<div class="mb-3">
			    <label class="form-label">Book Author</label>

			      <select name="book_author" class="form-control">
			    	<option value="0">
			    		Select Author
			    	</option>

			    	<?php 

			    	if ($author == 0) {
			    		#nothing
			    	}else {

			    	foreach ($author as $authors) { 
			    		if ($book['author_id'] == $authors['id']) {
			    		?>
			    		
			    		<option 
			    		selected
			    		value="<?=$authors['id']?>">
			    		 <?=$authors['name']?> <!-- from the daata -->
			    		</option>
			    		
			    	<?php }else {  ?>

			    		<option 
			    		value="<?=$authors['id']?>">
			    		 <?=$authors['name']?> <!-- from the daata -->
			    		</option>

			   		 <?php }} } ?>

			    </select>

			</div>

			<div class="mb-3">
			    <label class="form-label">Book Category</label>

			    <select name="book_category" class="form-control">
			    	<option value="0">
			    		Select Category
			    	</option>

			    	<?php 

			    	if ($categories == 0) {
			    		#nothing
			    	}else {

			    	foreach ($categories as $category) { 
			    		if ($book['category_id'] == $category['id']) {
			    		?>
			    		
			    		<option 
			    		selected
			    		value="<?=$category['id']?>">
			    		 <?=$category['name']?> <!-- from the daata -->
			    		</option>
			    		
			    	<?php }else {  ?>

			    		<option 
			    		value="<?=$category['id']?>">
			    		 <?=$category['name']?> <!-- from the daata -->
			    		</option>

			   		 <?php }} } ?>


			    </select>
			</div>

			<div class="mb-3">
			    <label class="form-label">Book Cover</label>
			    <input type="file" class="form-control"
			    name="book_cover">

			    <input type="text"
			    hidden
			    value="<?=$book['id']?>" 
			    name="current_cover">

			    <a href="uploads/cover/<?=$book['cover']?>"
			    class="dark-link">Current Cover </a>
			</div>

			<div class="mb-3">
			    <label class="form-label">File</label>

			    <input type="text"
			    hidden
			    value="<?=$book['id']?>" 
			    name="current_file">

			    <input type="file" class="form-control"
			    name="file">
			    <a href="uploads/file/<?=$book['file']?>"
			    class="dark-link">Current File </a>
			</div>



			 <button type="submit" class="btn btn-primary">Edit Book</button>
		</form>

		
	 </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>


<?php }else{
  header("Location: login.php");
  exit;
} ?>
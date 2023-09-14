<?php
session_start();

#if the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	#database connection file
	include "db_conn.php";

	#Book helper fucntion
	include "php/func-book.php";
    $books = get_all_books($conn);

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
    <title>ADMIN</title>
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
				  <a class="nav-link" href="add-category.php">Add Category</a>
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

		<form action="search.php"
			  method="get" 
				style="width: 100%; max-width: 30rem">
			<div class="input-group my-5">
			  <input type="text" 
			  		class="form-control" 
			  		name="key" 
			  		placeholder="search Book..." 
			  		aria-label="search Book..." aria-describedby="basic-addon2">
			  <button class="input-group-text btn btn-success" 
			  id="basic-addon2">search</button>
			</div>
		</form>

		<?php if ($books == 0) { ?>
			<div class="alert alert-warning text-center mt-5 p-5" role="alert">
				There is no book in the database
			</div>
		<?php } else{ ?>


		<!-- list of all books-->
		<h4 class="mt-5">All Books</h4>
		<table class="table table-bordered shadow">
			<thead>  <!-- The <thead> tag is used to group header content in an HTML table -->
				<tr>
					<tr>
					<th>#</th>
					<th>Title</th>
					<th>Author</th>
					<th>Description</th>
					<th>Category</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody> <!-- The <tbody> tag is used to group the body content in an HTML table.-->

				<?php 
				$i = 0;
				foreach ($books as $book) { 
					$i++;
					?>
				<tr>
					<td><?=$i?></td>
					<td>
						<img width="100" src="uploads/cover/<?=$book['cover']?>" >

						<a class="link-dark d-block text-center"
						href="uploads/file/<?=$book['file']?>">
							<?=$book['title']?>
						</a>

					</td>
					<td>
						<?php if ($author == 0) {
							echo "undefined" ;}else { 
								#using id can see name
								foreach ($author as $authors) {
									if ($authors['id'] == $book['author_id']) {
										echo $authors['name'];
									}
								}
							}
							?>
					</td>
					<td><?=$book['description']?></td>
					<td>						
						<?php if ($categories == 0) {
							echo "undefined" ;}else { 
								#using id can see name
								foreach ($categories as $category) {
									if ($category['id'] == $book['category_id']) {
										echo $category['name'];
									}
								}
							}
							?>
					</td>
					<td>
						<a href="edit-book.php?id=<?=$book['id']?>" class="btn btn-warning">Edit</a>
						<a href="php/delete-book.php?id=<?=$book['id']?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php } ?>


		<?php if ($categories == 0) { ?>
			<div class="alert alert-warning text-center mt-5 p-5" role="alert">
				There is no category in the database
			</div>
		<?php } else{ ?>


		<!-- list of all categories-->
		<h4 class="mt-5">All Categories</h4> <!-- mt-5 distence-->
		<table class="table table-bordered shadow">
			<thead>
				<tr>
					<th>#</th>
					<th>Category Name</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php 
				$j = 0;
				foreach ($categories as $category) {
					$j++;
				?>
				<tr>
					<td><?=$j?></td>
					<td><?=$category['name']?></td>
					<td>
						<a href="edit-category.php?id=<?=$category['id']?>" class="btn btn-warning">Edit</a> <!-- link e id number show korbe -->
						<a href="php/delete-category.php?id=<?=$category['id']?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php } ?>

		<?php if ($author == 0) { ?>
			<div class="alert alert-warning text-center mt-5 p-5" role="alert">
				There is no category in the database
			</div>
		<?php } else{ ?>


		<!-- list of all author-->
		<h4 class="mt-5">All Authors</h4> 
			<table class="table table-bordered shadow">
			<thead>
				<tr>
					<th>#</th>
					<th>Author Name</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php 
				$k = 0;
				foreach ($author as $authors) {
					$k++;
				?>
				<tr>
					<td><?=$k?></td>
					<td><?=$authors['name']?></td>
					<td>
						<a href="edit-author.php?id=<?=$authors['id']?>" class="btn btn-warning">Edit</a>
						<a href="php/delete-author.php?id=<?=$authors['id']?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php } ?>
	 </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>


<?php }else{
  header("Location: login.php");
  exit;
} ?>
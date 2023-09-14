<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>exchange</title>

	 <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="index.php">BookFreak</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="exchange.php">Exchange</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="about.php">About</a>
		        </li>
		        <li class="nav-item">
		          <?php if (isset($_SESSION['user_id'])) {?>
		          	<a class="nav-link" 
		             href="admin.php">Login</a>
		          <?php }else{ ?>
		          <a class="nav-link" 
		             href="login.php">Login</a>
		          <?php } ?>

		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>

	<h1 class="text-center py-4" style="font-family: Brush Script MT, Brush Script Std, cursive; color: green">Exchange Books</h1>

	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>


  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="uploads/cover/jol-jochona.jpg" class="d-block w-100" style="height: 500px;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="uploads/cover/Labu-Elo-Shohoray.jpg" class="d-block w-100" style="height: 500px;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="uploads/cover/danob-muhammed-zafar-iqbal.jpg" class="d-block w-100" style="height: 500px;" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div><br> <br> <br> <br>

<h1 class="text-center" style="font-family: Luminari, fantasy">Hello BookFreak</h1>

<p class="text-center" style="font-family: italic">Where the mind is without fear and the head is
held high. Where knowledge is free. </p>

<h1 class="text-center" style="font-family: Brush Script MT, Brush Script Std, cursive;">"Rabindranath Tagore"</h1>

<p class="text-center">Hello Readers, Here is the chance you can exchange the book. We will exchange 3 books in every 3 weeks. All books have to be in good condition. We won't accept torn paper.  </p>
<p class="text-center">So, what are you waiting for. Mail us and exchange the book.</p>

<h4 class="text-center">freakbook@gmail.com</h4>

<br><br> <br>
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #ebefee;">
    <p class="text-dark">BookFreak.com</p>
  </div>
  <!-- Copyright -->
</footer>

</body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
          </ul>
        </div>
      </div>
    </nav>

  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <form class="p-5 rounded shadow" style="max-width: 30rem; width: 100%" method="POST" action="php/auth.php">


  	<h1 class="text-center display-4 pb-5">LOGIN</h1>

  	<!-- Alart -->

  	<?php if (isset($_GET['error'])) { ?>
  	<div class="alert alert-info" role="alert">
	  <?=htmlspecialchars($_GET['error']); ?>
	</div>
	<?php } ?>

  <div class="mb-3">
    <label for="exampleInputEmail1" 
    class="form-label">Email address</label>
    <input type="email" class="form-control"
    name="email"
    id="exampleInputEmail1" aria-describedby="emailHelp">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" 
    name="password"
    id="exampleInputPassword1">
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <h5> Don't Have an account <a href="register.php">Register</a></h5>

</form>

  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
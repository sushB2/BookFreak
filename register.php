<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <form class="p-5 rounded shadow" style="max-width: 30rem; width: 100%" method="POST" action="php/register.php">


  	<h1 class="text-center display-4 pb-5">Create Account</h1>

  	<!-- Alart -->

  	 <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_GET['error']; ?>
      </div>
        <?php } ?>

        <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success" role="alert">
        <?php echo $_GET['success']; ?>
      </div>
        <?php } ?>

  <div class="mb-3">
    <label for="exampleInputName1" 
    class="form-label">Full Name</label>
    <input type="text" class="form-control"
    name="fname" value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">

    <label for="exampleInputEmail1" 
    class="form-label">Email</label>
    <input type="email" class="form-control"
    name="email" value="<?php echo (isset($_GET['email']))?$_GET['email']:"" ?>">

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" 
    name="password"
    id="exampleInputPassword1">
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
  <h5> Already have an account? <a href="login.php">login</a></h5>

</form>

  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
<?php
session_start();

if(isset($_POST['login'])){

  $email = $_POST['email'];
	$password = $_POST['password'];
  $sql = "SELECT * FROM accounts WHERE email='$email' && password='$password'";

  require_once('db.php');

  $qry = mysqli_query($conn, $sql) or die ("Login unsuccesful");
  $count = mysqli_num_rows($qry);
  $result = $qry->fetch_assoc();
  
  if($count==1){
    $_SESSION['user'] = $result['username'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['password'] = $result['password'];
    $_SESSION['admin'] = $result['admin'];

    if ($_SESSION['admin']) {
      header("Location:adminhome.php");
    } else {
      header("Location:home.php");
    }
  }
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<title>Log into BookLogs</title>
</head>


<body>

<nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php"><img src="logo.png" height="35px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php" style="">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userpage.php">My Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="browse.php">Browse</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid bg-dark text-white text-center">
  <p>Start logging your book reading journey!</p> 
</div>

<div class="container py-5 h-100" >
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card bg-dark text-white" style="border-radius: 1rem;">
        <div class="card-body p-5 text-center">
          <div class="mb-md-5 mt-md-4 pb-5">		
			      <img src="logo.png" height="40px" class="fw-bold mb-3">
            <h3 class="fw-bold mb-2 text-uppercase">Login</h3>
            <form class="pt-3" method="post" name="login" action="">  
              <div class="form-outline form-white mb-2">
                <input type="email" name="email" id="email" placeholder="E-mail" class="form-control form-control-lg" />
              </div>
              <div class="form-outline form-white mb-2">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-lg" />
              </div>
              <p class="small mb-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
              <input type="submit" value="Log in" name="login" class="btn btn-outline-light btn-lg px-5"/>
            </form>
          </div>
          <div>
            <p class="small mb-2">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Sign Up</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
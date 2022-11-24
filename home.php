<?php
include_once("session.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>BookLogs</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

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
        <div class="dropdown nav-item">
          <li>
            <button class="btn dropdown-toggle nav-link" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Browse by Genre</button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#" onClick="filterBooks(this.id)" id="Horror"> Horror </a></li>
                <li><a class="dropdown-item" href="#" onClick="filterBooks(this.id)" id="Thriller"> Thriller </a></li>
                <li><a class="dropdown-item" href="#" onClick="filterBooks(this.id)" id="Fantasy"> Fantasy </a></li>
                <li><a class="dropdown-item" href="#" onClick="filterBooks(this.id)" id="Romance"> Romance </a></li>
                <li><a class="dropdown-item" href="#" onClick="filterBooks(this.id)" id="Young Adult"> Young Adult </a></li>
                <li><a class="dropdown-item" href="#" onClick="filterBooks(this.id)" id="Poetry"> Poetry </a></li>
              </ul>
          </li>
        </div>
      </ul>

	    <!-- SEARCH --> 
      <form class="d-flex" id="searchForm" style="padding-right:30px">
        <input class="form-control me-2" type="text" placeholder="Browse books" name="searched_title" id="searched_title">
        <button class="btn btn-dark" type="button" onclick="showResults()" id="searchButton">Search</button>
      </form>

      <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="img/user.png" height="25px" style="padding-right:10px"/>
          <?php 
          $usr=$_SESSION['user'];
          echo "<span id='usrSessionInfo'>$usr</span>";
          ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

 
<div class="container mt-5" id="mainDiv">
  <div class="row" id="searchDiv">
    <div class="col-sm-4" id="leftcol">
      <h5 id="leftHeader"></h5></br>
      <div class="row">
        <div class="col-sm-6" id="left1"></div>
        <div class="col-sm-6" id="left2"></div>
      </div>
      <div class="row">
        <div class="col-sm-6" id="left3"></div>
        <div class="col-sm-6" id="left4"></div>
      </div>
    </div>

    <div class="col-sm-4" id="middlecol">
      <h5 id="middleHeader"></h5></br>
      <div class="row">
        <div class="col-sm-6" id="middle1"></div>
        <div class="col-sm-6" id="middle2"></div>
      </div>
      <div class="row">
        <div class="col-sm-6" id="middle3"></div>
        <div class="col-sm-6" id="middle4"></div>
      </div>
    </div>

    <div class="col-sm-4" id="rightcol">
      <h5 id="rightHeader"></h5></br>
      <div class="row">
        <div class="col-sm-6" id="right1"></div>
        <div class="col-sm-6" id="right2"></div>
      </div>
      <div class="row">
        <div class="col-sm-6" id="right3"></div>
        <div class="col-sm-6" id="right4"></div>
      </div>      
    </div>
  </div>
</div>

</body>
</html>





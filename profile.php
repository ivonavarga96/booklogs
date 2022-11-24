<?php
require_once("session.php");
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
        <li class="nav-item">
          <a class="nav-link" href="userpage.php">My Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="browse.php">Browse</a>
        </li>
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
</nav>

<div class="container mt-5" id="">
  <div class="row" id="">
    <div class="col-sm-3" id="">
      <h5 id=""></h5></br>
      <div class="row" id="userInfoBox">
        <table>
          <tr>
            <td align="center"><img src="img/user.png" id="profilepic"/></td>
          </tr>
          <tr>
          <th>Username: </th>
          <td><?php 
            $username=$_SESSION['user'];
            echo "<span id='username'>$username</span>";
            ?></td>
          </tr>
          <tr>
            <th>E-mail address: </th>
            <td><?php echo $_SESSION['email'];?></td>
          </tr>
          <tr>
            <th>Password: </th>
            <td><form><input type="password" id='newPassword' value="<?php echo $_SESSION["password"];?>"></input></form></td>
          </tr>

          <tr>
            <th></th>
            <td><a style="text-decoration: underline" href="#" onclick="changePassword()"> Change your password </a></td>
          </tr>
        </table>
      </div>
        <div class="col-sm-9" id=""></div>
      </div>
    </div>

    <div class="col-sm-9" id="">
      <h5 id=""></h5></br>
      <div class="row">
        <div class="col-sm-6" id=""></div>
        <div class="col-sm-6" id=""></div>
      </div>
      <div class="row">
        <div class="col-sm-6" id=""></div>
        <div class="col-sm-6" id=""></div>
      </div>
    </div>
  </div>
</div>



</body>
</html>





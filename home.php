<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<h1> Welcome to Income tax preparation website </h1>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Income_tax_preparation</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="personal.php">Personal details</a></li>
      <li><a href="salary.php">Salary details</a></li>
	  <li><a href="form.php">Generate form 16</a></li>
	  
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><h4>Welcome <?php echo $_SESSION['empid'];?> </h4 </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="crossfade">

	  <figure></figure>

	  <figure></figure>

	  <figure></figure>

	  <figure></figure>

	  <figure></figure>

	</div>
  




</body>
</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title> Welcome to Income tax preparation website </title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="header">
<h1> Welcome to Income tax preparation website </h1>
</div>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Income_tax_preparation</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li class="active"><a href="personal.php">Personal details</a></li>
      <li><a href="salary.php">Salary details</a></li>
	  <li><a href="form.php">Generate form 16</a></li>
	 </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><h4>Welcome <?php echo $_SESSION['empid'];?> </h4 </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav> 

	<div class="btn">
		<a href="enterper.php"><button type="button"class="w3-button w3-black w3-border w3-hover-red w3-round-xxlarge" >Enter Personal details</button></a>
		<br></br>
		
		<a href="display.php"><button type="button" class="w3-button w3-black w3-border w3-hover-green w3-round-xxlarge">Display personal details</button></a>
	</div>
	
</body>
</html>
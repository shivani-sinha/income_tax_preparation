<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title> Welcome to Income tax preparation website </title>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Demo: Fullscreen Background Carousel - Bootstrap Carousel</title>
<meta name="description" content="Fullscreen Background - Bootstrap Carousel - Collection by sevenXdemo - More Information: www.sevenX.de/blog" />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="s.css">
<div class="header">
<h1> Welcome to Income tax preparation website </h1>
</div>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Income_tax_preparation</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li><a href="personal.php">Personal details</a></li>
      <li><a href="salary.php">Salary details</a></li>
	  <li class="active"><a href="form.php">Generate form 16</a></li>
	  </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><h4>Welcome <?php echo $_SESSION['empid'];?> </h4 </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav> 
</head>
<body>


<div id="background-carousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image:url(https://www.authbridge.com/wp-content/uploads/2018/02/Form-16-Verification.jpg)"></div>
        <div class="item" style="background-image:url(https://blog.indialends.com/wp-content/uploads/2018/03/Form-16_banner.jpg)"></div>
        <div class="item" style="background-image:url(https://www.policybazaar.com/images/IncomeTax/part-A-and-part-B-in-form-16.jpg)"></div>  
		</div>
    </div>
</div>
 
<div id="content-wrapper">
<!-- PAGE CONTENT -->
    <div class="container">
        <div class="page-header"><b>Click below to generate your form-16</b></div>
        <div class="well"><div class="btn">
		<a href="frmsix.php"><button type="button" class="btn btn-primary btn-block">Generate form 16 pdf</button></a>
	</div>
        </div><!-- End Well -->
    </div><!-- End Container -->
<!-- PAGE CONTENT -->
</div>
<script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
  /* Additional Javascript (required) */
	$('#myCarousel').carousel({
		pause: 'none'
	})	
});
</script>

	
	

	</body>
</html>
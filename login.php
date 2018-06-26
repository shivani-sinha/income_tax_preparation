<?php
session_start();
$passErr=$nameErr="";
$empid=$password="";
$msg=0;
//connect to database
$db= mysqli_connect("localhost", "root","", "authentication");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST['empid']))
	{
		$nameErr="REQUIRED EMPLOYEE ID";
	}
	else
	{
	$empid= mysqli_real_escape_string($db, $_POST['empid']);
	}
	if(empty($_POST['password']))
	{
		$passErr="REQUIRED PASSWORD";
	}
	else
	{
	$password= mysqli_real_escape_string($db, $_POST['password']);
	
	}
		$password= md5($password);
		$sql="SELECT*FROM users WHERE empid='$empid' AND password='$password'";
		$result=mysqli_query($db, $sql);
		$check=mysqli_fetch_array($result);
		if(isset($check))
		{ 
			$_SESSION['message']= "You are now logged in successfully";
			$_SESSION['empid']= $empid;
			header("location: home.php");//redirect to home page
	}
	else
	{
		//failed
		$_SESSION['message']=" Username or passwords is incorrect";
		$msg=1;
		
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Welcome to Income tax preparation website </title>
<link rel="stylesheet" type="text/css" href="st.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<div class="header">
<h1> Welcome to Income tax return website </h1>
<h2> Login page </h2>
</div>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Income_tax_return</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Welcome to our site</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    </ul>
  </div>
</nav>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<span class="error">* required field</span>
	<table>
		<tr>
		<th><b>Employee code :</b></th>
		<td><input type="text" name="empid" class= "textInput">
		<span class="error">* <?php echo $nameErr;?></span></td>
		</tr>
		
		<tr>
		<th><b>Password :</b></th>
		<td><input type="password" name="password" class= "textInput"> 
		<span class="error">* <?php echo $passErr;?></span></td>
		
		</tr>
		
		<tr>
		<td></td>
		<td><button type="submit" name="Login_btn" value="Login">Login</button>
		</tr>
		</table>
		<?php
		if($msg==1)
		{
		 echo "<span style='color:red'>".$_SESSION['message']."</span>";
		}
		 ?>
</form>
</body>
</html>

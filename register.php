<?php
session_start();
//connect to database
$nameErr=$useErr=$mailErr=$passErr=$pass1Err="";
$empid=$username=$email=$password=$password2="";
$msg=0;
$db= mysqli_connect("localhost", "root","", "authentication")or die("failed to connect to mysql server".mysqli_connect_error());
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST['empid']))
	{
		$nameErr="REQUIRED EMPLOYEE ID";
		$msg=1;
	}else{
	$empid= mysqli_real_escape_string($db, $_POST['empid']);
	}
	if(empty($_POST['username']))
	{
		$useErr="REQUIRED USERNAME";
		$msg=1;
	}else{
	$username= mysqli_real_escape_string($db, $_POST['username']);
	}
	if(empty($_POST['email']))
	{
		$mailErr="REQUIRED EMAIL";
		$msg=1;
	}else{
	$email = mysqli_real_escape_string($db, $_POST['email']);
	}
	if(empty($_POST['password']))
	{
		$passErr="REQUIRED PASSWORD";
		$msg=1;
	}else{
	$password= mysqli_real_escape_string($db, $_POST['password']);
	}
	if(empty($_POST['password']))
	{
		$pass1Err="REQUIRED CONFIRM PASSWORD";
		$msg=1;
	}else{
	$password2= mysqli_real_escape_string($db, $_POST['password2']);
	}
	
	if($password == $password2)
	{
		//create user
		if($msg==1)
		{
			$_SESSION['message']="FILL UP THE REQUIRED FIELD";
		}
		else{
		$password= md5($password);
		$sql="INSERT INTO users(empid ,username ,email, password) VALUES('$empid','$username','$email','$password')";
		if(!mysqli_query($db, $sql))
		{
			echo "error".mysqli_error($db);
		}
		
		else{
		$_SESSION['message']="You are now logged in successfully";
		$_SESSION['empid']= $empid;
		header("location: register.php?msg=2");//redirect to home page
	}
		}
	}
	else
	{
		//failed
		$_SESSION['message']=" The two passwords do not match";
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
<h1> Welcome to Income tax preparation website </h1>
<h2> Signup form </h2>
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
      <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
    </ul>
  </div>
</nav>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<span class="error">* required field</span>
	<table>
	<tr>
		<th>Employee Code :</th>
		<td><input type="text" name="empid" class= "textInput">
		<span class="error">* <?php echo $nameErr;?></span></td>
		</tr>
		<tr>
		<tr>
		<th>Username :</th>
		<td><input type="text" name="username" class= "textInput">
		<span class="error">* <?php echo $useErr;?></span></td>
		</tr>
		<tr>
		<th>e-mail :</th>
		<td><input type="email" name="email" class= "textInput">
		<span class="error">* <?php echo $mailErr;?></span></td>
		</tr>
		<tr>
		<th>Password :</th>
		<td><input type="password" name="password" class= "textInput">
		<span class="error">* <?php echo $passErr;?></span></td>
		</tr>
		<tr>
		<th>Confirm Password :</th>
		<td><input type="password" name="password2" class= "textInput">
		<span class="error">* <?php echo $pass1Err;?></span></td>
		</tr>
		<tr>
		<td></td>
		<td><button type="submit" name="Register_btn" value="Register">Register</button></td>
		</tr>
		<tr>
		<td></td>
		<td>
			<?php 
			if(isset($_GET['msg']))
			{
				$message= $_GET['msg'];
				if($message==2)
					echo "<span style='color:green'>"." Your entry has been successfully inserted!"."</span>";
				echo"<a href='login.php'>login</a>";
			}
			if($msg==1)
				echo $_SESSION['message'];
			?>
		</td>
		
		</tr>
		</table>
</form>
</body>
</html>

<?php
session_start();
$msg=0;
//connect to database
$db= mysqli_connect("localhost", "root","", "authentication");
if(isset($_POST['submit']))
{

	$empid= mysqli_real_escape_string($db, $_POST['empid']);
	$fname= mysqli_real_escape_string($db, $_POST['fname']);
	$mname= mysqli_real_escape_string($db, $_POST['mname']);
	$lname= mysqli_real_escape_string($db, $_POST['lname']);
	$designation= mysqli_real_escape_string($db, $_POST['designation']);
	$day= mysqli_real_escape_string($db, $_POST['day']);
	$month= mysqli_real_escape_string($db, $_POST['month']);
	$byear= mysqli_real_escape_string($db, $_POST['byear']);
	$aad= mysqli_real_escape_string($db, $_POST['aad']);
	$aade= mysqli_real_escape_string($db, $_POST['aade']);
	$phone= mysqli_real_escape_string($db, $_POST['phone']);
	$pan= mysqli_real_escape_string($db, $_POST['pan']);
	$fdb= mysqli_real_escape_string($db, $_POST['fdb']);
	$pbv= mysqli_real_escape_string($db, $_POST['pbv']);
	$rsp= mysqli_real_escape_string($db, $_POST['rsp']);
	$area= mysqli_real_escape_string($db, $_POST['area']);
	$town= mysqli_real_escape_string($db, $_POST['town']);
	$st= mysqli_real_escape_string($db, $_POST['st']);
	$count= mysqli_real_escape_string($db, $_POST['count']);
	$pic= mysqli_real_escape_string($db, $_POST['pic']);
	$en= mysqli_real_escape_string($db, $_POST['en']);
	$adrs= mysqli_real_escape_string($db, $_POST['adrs']);
	$state= mysqli_real_escape_string($db, $_POST['state']);
	$pin= mysqli_real_escape_string($db, $_POST['pin']);
	$cat= mysqli_real_escape_string($db, $_POST['cat']);
	$pand= mysqli_real_escape_string($db, $_POST['pand']);
	
	$tan= mysqli_real_escape_string($db, $_POST['tan']);
	$pfrom= mysqli_real_escape_string($db, $_POST['pfrom']);
	$pto= mysqli_real_escape_string($db, $_POST['pto']);
	$year= mysqli_real_escape_string($db, $_POST['year']);
	
	$sql="INSERT INTO personal(empid ,fname,mname,lname, designation, day, month, byear, aad, aade, phone,pan, fdb, pbv, rsp,area, town, st, count, pic, en, adrs, state, pin, cat, pand,tan, pfrom, pto, year) VALUES('$empid','$fname','$mname','$lname','$designation','$day','$month','$byear','$aad','$aade','$phone','$pan', '$fdb','$pbv','$rsp','$area','$town','$st','$count','$pic','$en', '$adrs','$state', '$pin','$cat','$pand','$tan', '$pfrom', '$pto', '$year')";
		if(!mysqli_query($db, $sql))
		{
			echo "error".mysqli_error($db);
		}
		else{
		$_SESSION['message']="Your persenal details have been stored successfully";
		$_SESSION['username']= $username;
		header("location: enterper.php?msg=1");//redirect to home page
	
		}
}
else
	{
		//failed
		$_SESSION['message']=" Failed to store information";
		$msg=1;
	}
?>
<!DOCTYPE html>
<html>
<head>
<title> Welcome to Income tax preparation website </title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
      <li "class="active"><a href="personal.php">Personal details</a></li>
      <li><a href="salary.php">Salary details</a></li>
	  <li><a href="form.php">Generate form 16</a></li>
	  <li><a href="itr.php">ITR 1</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><h4>Welcome <?php echo $_SESSION['empid'];?> </h4 </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav> 
<h2><b> Fill up all the personal details below :-</b></h2>
 <form class="form-horizontal" action="enterper.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="empid">Employee code:</label>
    <div class="col-sm-2">
      <input type="empid" class="form-control" name="empid" placeholder="Enter employee code">
    </div>
  </div>
  <div class="form-group">
  <label class="control-label col-sm-2" for="name">Employee's name :</label>
  <div class="col-sm-10">
  <div class="row">
                <div class="col-xs-4">
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="enter first name" 
                        maxlength="100" />
                </div>
                <div class="col-xs-4">
                     <input type="text" class="form-control" name="mname" id="mname" placeholder="enter middle name" 
                        maxlength="100" />
                </div>
                <div class="col-xs-4">
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="enter last name" 
                        maxlength="100" />
                </div>
            </div>
			</div>
			</div>
     
  <div class="form-group">
    <label class="control-label col-sm-2" for="designation">Employee designation:</label>
    <div class="col-sm-6">
      <input type="designation" class="form-control" name="designation" placeholder="Enter employee designation">
    </div>
	</div>
	<div class="form-group">
    <label for="date" class="control-label col-sm-2">Date of birth <font color="grey">(DD/MM/YYYY):</font></label>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-xs-4">
                    <input type="number" class="form-control" name="day" id="Day" placeholder="Day" 
                        maxlength="2" tabindex="3" data-toggle="tooltip" title="Day" value="" />
                </div>
                <div class="col-xs-4">
                    <input type="number" class="form-control input-sm-1" name="month" id="Month" 
                        placeholder="Month" maxlength="2" tabindex="4" data-toggle="tooltip" title="Month" value="" />
                </div>
                <div class="col-xs-4">
                    <input type="number" class="form-control input-sm-3" name="byear" id="bYear" 
                        placeholder="Year" maxlength="4" tabindex="5" data-toggle="tooltip" title="Year" value=""/>
                </div>
            </div>
        </div>
    </div>
	<div class=form-group>
    <label class="control-label col-sm-2" for="tan">Employee's AADHAR number(12 digits):</label>
    <div class="col-sm-4">
      <input type="tan" class="form-control" name="aad" maxlength="12" placeholder="Enter 12 digit aadhar num ">
    </div>
  </div>
  <div class=form-group>
    <label class="control-label col-sm-2" for="tan">Employee's AADHAR enrollment ID(28 digits):</label>
    <div class="col-sm-4">
      <input type="tan" class="form-control" name="aade" maxlength="28" placeholder="Enter 28 digit aadhar enrollment id ">
    </div>
  </div>
	<div class="form-group">
	
	<div class="col-sm-10">
	<div class="row">
	<div class="col-xs-6">
    <label class="control-label col-sm-8" for="phone">Employee phone number:</label>
      <input type="phone" class="form-control" name="phone" placeholder="Enter employee phone number">
    </div>
	<div class="col-xs-6">
	<label class="control-label col-sm-8" for="pan">PAN/GIR no:</label>
     <input type="pan" class="form-control" name="pan" placeholder="Enter PAN/GIR no.">
	</div>
	</div>
	</div>
	</div>
	<div class="form-group">
	<label class="control-label col-sm-2" for="name">Employee's address :</label>
  <div class="col-sm-10">
  <div class="row">
                <div class="col-xs-4">
				<label class="control-label col-sm-10" for="name">Flat / Door / Block No.:</label>
                    <input type="text" class="form-control" name="fdb" id="fdb" placeholder="enter flat/door/block no." 
                        maxlength="100" />
                </div>
                <div class="col-xs-4">
				<label class="control-label col-sm-20" for="name">Name of Premises / Building / Village	:</label>																					

                     <input type="text" class="form-control" name="pbv" id="pbv" placeholder="enter name of premises/building/village" 
                        maxlength="100" />
                </div>
                <div class="col-xs-4">
				<label class="control-label col-sm-12" for="name">Road / Street/ Post Office :</label>
                    <input type="text" class="form-control" name="rsp" id="rsp" placeholder="enter road/street/post office" 
                        maxlength="100" />
                </div>
            </div>
			<div class="row">
                <div class="col-xs-4">
				<label class="control-label col-sm-10" for="name">Area / Locality :</label>
                    <input type="text" class="form-control" name="area" id="area" placeholder="enter area/locality" 
                        maxlength="100" />
                </div>
                <div class="col-xs-4">
				<label class="control-label col-sm-20" for="name">Town/ City/ District :</label>																					

                     <input type="text" class="form-control" name="town" id="town" placeholder="enter town/city/district" 
                        maxlength="100" />
                </div>
                <div class="col-xs-4">
				<label class="control-label col-sm-12" for="name">State	 :</label>
                    <input type="text" class="form-control" name="st" id="st" placeholder="enter state" 
                        maxlength="20" />
                </div>
				<div class="col-xs-4">
				<label class="control-label col-sm-12" for="name">country	 :</label>
                    <input type="text" class="form-control" name="count" id="count" placeholder="enter country" 
                        maxlength="20" />
                </div>
				<div class="col-xs-4">
				<label class="control-label col-sm-12" for="name">pin code	 :</label>
                    <input type="text" class="form-control" name="pic" id="pic" placeholder="enter pin code" 
                        maxlength="6" />
                </div>
            </div>
			</div>
			</div>
	
  <div class="form-group">
    <label class="control-label col-sm-2" for="designation">Employer's details:</label>
    <div class="col-sm-10">
  <div class="row">
                <div class="col-xs-4">
				<label class="control-label col-sm-10" for="name">Name of the Organization:</label>
                    <input type="text" class="form-control" name="en" id="en" placeholder="enter name of organization" 
                        maxlength="30" />
                </div>
                <div class="col-xs-8">
				<label class="control-label col-sm-20" for="name">Employer's address	:</label>																					

                     <input type="text" class="form-control" name="adrs" id="adrs" placeholder="enter address" 
                        maxlength="100" />
                </div>
                <div class="col-xs-4">
				<label class="control-label col-sm-12" for="name">state :</label>
                    <input type="text" class="form-control" name="state" id="state" placeholder="enter state" 
                        maxlength="30" />
                </div>
				<div class="col-xs-4">
				<label class="control-label col-sm-12" for="name">pin code :</label>
                    <input type="text" class="form-control" name="pin" id="pin" placeholder="enter pin" 
                        maxlength="6" />
                </div>
            </div>
		</div>
	</div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="pan">Employer's category:</label>
    <div class="col-sm-4">
      <select class="form-control" name="cat" id="sel1" placeholder="select">
			<option>GOV</option>
			<option>PSU</option>
			<option>OTH</option>
			<option>NA</option>
		</select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pan">PAN no of the deductor:</label>
    <div class="col-sm-4">
      <input type="pand" class="form-control" name="pand" placeholder="Enter PAN no.">
    </div>
  </div>
  <div class=form-group>
    <label class="control-label col-sm-2" for="tan">TAN of deductor:</label>
    <div class="col-sm-4">
      <input type="tan" class="form-control" name="tan" placeholder="Enter TAN ">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="period">Period :</label>
	<div class="col-sm-10">
  <div class="row">
                <div class="col-xs-4">
                    <input type="text" class="form-control" name="pfrom" id="pfrom" placeholder="enter starting period" 
                        maxlength="10" />
                </div>
                <div class="col-xs-4">
                     <input type="text" class="form-control" name="pto" id="pto" placeholder="enter ending period" 
                        maxlength="100" />
                </div>
	</div>
</div>
</div>
      <div class="form-group">
    <label class="control-label col-sm-2" for="year">Assessment year:</label>
    <div class="col-sm-10">
      <input type="year" class="form-control" name="year" placeholder="Enter assessment year">
    </div>
  </div>

  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <?php 
			if(isset($_GET['msg']))
			{
				$message= $_GET['msg'];
				if($message==1)
					echo "<span style='color:green'> Your entry has been successfully inserted!</span>";
			}
			?>
	  </div>
  </div>

</form> 
	
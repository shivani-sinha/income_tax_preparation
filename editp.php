<?php
session_start();
//connect to database
$db= mysqli_connect("localhost", "root","", "authentication");
//select databaste
mysqli_select_db($db,"authentication");
$emp=$_SESSION['empid'];
$sql="SELECT * FROM personal WHERE empid='$emp'";
$record=mysqli_query($db, $sql);
foreach ($record as $res) {
     
	$fname= $res['fname'];
	$mname= $res['mname'];
	$lname= $res['lname'];
	$designation= $res['designation'];
	$day= $res['day'];
	$month= $res['month'];
	$byear= $res['byear'];
	$aad= $res['aad'];
	$aade= $res['aade'];
	$phone= $res['phone'];
	$pan= $res['pan'];
	$fdb= $res['fdb'];
	$pbv= $res['pbv'];
	$rsp=$res['rsp'];
	$area= $res['area'];
	$town= $res['town'];
	$st= $res['st'];
	$count= $res['count'];
	$pic= $res['pic'];
	$en= $res['en'];
	$adrs= $res['adrs'];
	$state=$res['state'];
	$pin= $res['pin'];
	$cat=$res['cat'];
	$pand= $res['pand'];
	
	$tan= $res['tan'];
	$pfrom= $res['pfrom'];
	$pto= $res['pto'];
	$year= $res['year'];
	
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Welcome to Income tax preparation website </title>
<link rel="stylesheet" type="text/css" href="e.css">
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
<form method="post" action="edit.php">
<table>
		
			<tr>
			<th>Employee name : </th>
			<td><input type="text" name="fname" value="<?php echo $fname;?>"></td>
			<td><input type="text" name="mname" value="<?php echo $mname;?>"></td>
			<td><input type="text" name="lname" value="<?php echo $lname;?>"></td>
			</tr>
			<tr>
			<th>Employee designation:  </th>
			<td><input type="text" name="designation" value="<?php echo $designation;?>"></td>
			</tr>
			<tr>
			<th>Date of birth:  </th>
			<td><input type="number" name="day" value="<?php echo $day;?>"></td>
			<td><input type="number" name="month" value="<?php echo $month;?>"></td>
			<td><input type="number" name="byear" value="<?php echo $byear;?>"></td>
			</tr>
			<tr>
			<th>Aadhar number (12 digit):  </th>
			<td><input type="numeric" name="aad" value="<?php echo $aad;?>"></td>
			</tr>
			<tr>
			<th>Aadhar enrollment id(28 digits) :  </th>
			<td><input type="numeric" name="aade" value="<?php echo $aade;?>"></td>
			</tr>
			<tr>
			<th>Employee phone number :  </th>
			<td><input type="numeric" name="phone" value="<?php echo $phone;?>"></td>
			
			</tr>
			<tr>
			<th>Employee pan number:  </th>
			<td><input type="pan" name="pan" value="<?php echo $pan;?>"></td>
			
			</tr>
			<tr>
			<th>Flat / Door / Block No.:  </th>
			<td><input type="text" name="fdb" value="<?php echo $fdb;?>"></td>
			</tr>
			<tr>
			<th>Name of Premises / Building / Village: </th>
			<td><input type="text" name="pbv" value="<?php echo $pbv;?>"></td>
			</tr>
			<tr>
			<th>Road/Street/Post Office: </th>
			<td><input type="text" name="rsp" value="<?php echo $rsp;?>"></td>
			</tr>
			<tr>
			<th>Area/Locality: </th>
			<td><input type="text" name="area" value="<?php echo $area;?>"></td>
			</tr>
			<tr>
			<th>Town/city/District: </th>
			<td><input type="text" name="town" value="<?php echo $town;?>"></td>
			</tr>
			<tr>
			<th>State: </th>
			<td><input type="text" name="st" value="<?php echo $st;?>"></td>
			</tr>
			<tr>
			<th>Country: </th>
			<td><input type="text" name="count" value="<?php echo $count;?>"></td>
			</tr>
			<tr>
			<th>Pin code: </th>
			<td><input type="text" name="pic" value="<?php echo $pic;?>"></td>
			</tr>
			<tr>
			<th>Employer's name: </th>
			<td><input type="text" name="en" value="<?php echo $en;?>"></td>
			</tr>
			<tr>
			<th>Employer's address: </th>
			<td><input type="numeric" name="adrs" value="<?php echo $adrs;?>"></td>
			<td><input type="numeric" name="state" value="<?php echo $state;?>"></td>
			<td><input type="numeric" name="pin" value="<?php echo $pin;?>"></td>
			</tr>
			<tr>
			<th>Employer's category: </th>
			<td><select class="form-control" name="cat" id="sel1" placeholder="select">
			<option>GOV</option>
			<option>PSU</option>
			<option>OTH</option>
			<option>NA</option>
			</select></td>
			</tr>
			<tr>
			<th>PAN of deductor </th>
			<td><input type="text" name="pand" value="<?php echo $pand;?>"></td>
			</tr>
			<tr>
			<th>TAN of deductor </th>
			<td><input type="text" name="tan" value="<?php echo $tan;?>"></td>
			</tr>
			<tr>
			<th>Period: </th>
			<td><input type="text" name="pfrom" value="<?php echo $pfrom;?>"></td>
			<td><input type="text" name="pto" value="<?php echo $pto;?>"></td>
			</tr>
			<tr>
			<th>Assesment year: </th>
			<td><input type="text" name="year" value="<?php echo $year;?>"></td>
			</tr>
			<tr>
			<td></td>
		<td><button type="submit" name="update" class="btn btn-default">Update</button></td>
	</tr>
	</form>
	</body>
	</html>
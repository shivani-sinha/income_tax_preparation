<?php
session_start();
//connect to database
$db= mysqli_connect("localhost", "root","", "authentication");
//select databaste
mysqli_select_db($db,"authentication");
$emp=$_SESSION['empid'];
$sql="SELECT * FROM personal WHERE empid='$emp'";
$record=mysqli_query($db, $sql);
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

<table>
		
		
	<?php
	$recordcheck= mysqli_num_rows($record);
	if($recordcheck>0)
	{
		
		while($row = mysqli_fetch_assoc($record))
			
		{	echo "<tr>";
			echo"<th></th>";
			echo"<td></td>";
			echo"<td> <a href='editp.php?edit=$row[empid]'>edit</a> </td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>Employee code :  </th>";
			echo"<td>".$row['empid']."</td>";
			
			echo "</tr>";	
			echo "<tr>";
			echo"<th>Employee name :  </th>";
			echo"<td>".$row['fname']." ".$row['mname']." ".$row['lname']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo "<tr>";
			echo"<th>Employee designation:  </th>";
			echo"<td>".$row['designation']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>Date of birth:  </th>";
			echo"<td>".$row['day'].".".$row['month'].".".$row['byear']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>Aadhar number (12 digit):  </th>";
			echo"<td>".$row['aad']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>Aadhar enrollment id(28 digits) :  </th>";
			echo"<td>".$row['aade']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>Employee phone number :  </th>";
			echo"<td>".$row['phone']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo"<th>Employee pan number:  </th>";
			echo"<td>".$row['pan']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo"<th>Flat / Door / Block No.:  </th>";
			echo"<td>".$row['fdb']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo"<th>Name of Premises / Building / Village: </th>";
			echo"<td>".$row['pbv']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo"<th>Road/Street/Post Office: </th>";
			echo"<td>".$row['rsp']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>Area/Locality: </th>";
			echo"<td>".$row['area']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo"<th>Town/city/District: </th>";
			echo"<td>".$row['town']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo"<th>State: </th>";
			echo"<td>".$row['st']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo"<th>Country: </th>";
			echo"<td>".$row['count']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo"<th>Pin code: </th>";
			echo"<td>".$row['pic']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo"<th>Employer's name: </th>";
			echo"<td>".$row['en']."</td>";
			
			echo "</tr>";
			echo "<tr>";
			echo"<th>Employer's address: </th>";
			echo"<td>".$row['adrs']."  ".$row['state']."  ".$row['pin']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>Employer's category: </th>";
			echo"<td>".$row['cat']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>PAN of deductor </th>";
			echo"<td>".$row['pand']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>TAN of deductor </th>";
			echo"<td>".$row['tan']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>Period: </th>";
			echo"<td>".$row['pfrom']."  to  ".$row['pfrom']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>Assesment year: </th>";
			echo"<td>".$row['year']."</td>";
			echo "</tr>";
		}
	}
	?>
	
	</body>
	</html>
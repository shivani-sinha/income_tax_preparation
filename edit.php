<?php
session_start();

//connect to database
$db= mysqli_connect("localhost", "root","", "authentication");
 $emp=$_SESSION['empid'];
if(isset($_POST['update']))
{    

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
	
             
               //updating the table
        
        $sql="UPDATE personal SET fname='$fname',mname='$mname',lname='$lname', designation='$designation', day='$day', month='$month', byear='$byear', aad='$aad', aade='$aade', phone='$phone',pan='$pan', fdb='$fdb', pbv='$pbv', rsp='$rsp',area='$area', town='$town', st='$st', count='$count', pic='$pic', en='$en', adrs='$adrs', state='$state', pin='$pin', cat='$cat', pand='$pand',tan='$tan', pfrom='$pfrom', pto='$pto', year='$year' WHERE empid=$emp";
		if(!mysqli_query($db, $sql))
		{
			echo "error".mysqli_error($db);
		}
		else{
        //redirectig to the display page. In our case, it is index.php
        header("Location: display.php");
    }
}
?>
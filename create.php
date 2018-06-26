<?php
session_start();
//connect to database
$db= mysqli_connect("localhost", "root","", "authentication");
if(isset($_POST['submit']))
{

		$empid= mysqli_real_escape_string($db, $_POST['empid']);
	$a= mysqli_real_escape_string($db, $_POST['a']);
	$b= mysqli_real_escape_string($db, $_POST['b']);
	$c= mysqli_real_escape_string($db, $_POST['c']);
	$d=$a + $b + $c;
	$ls= mysqli_real_escape_string($db, $_POST['ls']);
	$bal=$d-$ls;
	$ent= mysqli_real_escape_string($db, $_POST['ent']);
	$temp= mysqli_real_escape_string($db, $_POST['temp']);
	$agre=$ent+ $temp;
	$sal=$bal- $agre;
	$fa= mysqli_real_escape_string($db, $_POST['fa']);
	$fb= mysqli_real_escape_string($db, $_POST['fb']);
	$va= mysqli_real_escape_string($db, $_POST['va']);
	$vb= mysqli_real_escape_string($db, $_POST['vb']);
	$vc= mysqli_real_escape_string($db, $_POST['vc']);
	$total=$fa+$fb-($va+ $vb +$vc);
	$gross=$sal+ $total;
	$sa= mysqli_real_escape_string($db, $_POST['sa']);
	$sb= mysqli_real_escape_string($db, $_POST['sb']);
	$sc= mysqli_real_escape_string($db, $_POST['sc']);
	$sd= mysqli_real_escape_string($db, $_POST['sd']);
	$se= mysqli_real_escape_string($db, $_POST['se']);
	$sf= mysqli_real_escape_string($db, $_POST['sf']);
	$sg= mysqli_real_escape_string($db, $_POST['sg']);
	$sh= mysqli_real_escape_string($db, $_POST['sh']);
	$tdeduct= $sa+ $sb+ $sc+ $sd+ $se+ $sf+ $sg+ $sh;
	$si= mysqli_real_escape_string($db, $_POST['si']);
	$sj= mysqli_real_escape_string($db, $_POST['sj']);
	$sk= mysqli_real_escape_string($db, $_POST['sk']);
	$agrededuct= $tdeduct+ $si+ $sj+ $sk;
	$tincome= $gross- $tdeduct;
	$sea= mysqli_real_escape_string($db, $_POST['sea']);
	$seb= mysqli_real_escape_string($db, $_POST['seb']);
	$nettax= $sea-$seb;
	$sur= mysqli_real_escape_string($db, $_POST['sur']);
	$edu= mysqli_real_escape_string($db, $_POST['edu']);
	$tax= $nettax+ $sur+ $edu;
	$rel= mysqli_real_escape_string($db, $_POST['rel']);
	$tpay=$tax- $rel;
	$less= mysqli_real_escape_string($db, $_POST['less']);
	$lessb= mysqli_real_escape_string($db, $_POST['lessb']);
	$taxpay=($less+ $lessb)-$tpay;
	$sql="INSERT INTO salary(empid ,a, b, c, d, ls, bal, ent, temp, agre, sal, fa, fb, va, vb, vc, total, gross, sa, sb, sc, sd, se, sf, sg, sh, tdeduct, si, sj, sk, agrededuct, tincome, sea, seb, nettax, sur, edu, tax, rel, tpay, less, lessb, taxpay) VALUES('$empid','$a','$b', '$c', '$d', '$ls', '$bal', '$ent', '$temp', '$agre', '$sal', '$fa', '$fb', '$va', '$vb', '$vc', '$total', '$gross', '$sa', '$sb', '$sc', '$sd', '$se', '$sf', '$sg', '$sh', '$tdeduct', '$si', '$sj', '$sk', '$agrededuct', '$tincome', '$sea', '$seb', '$nettax', '$sur', '$edu', '$tax', '$rel', '$tpay', '$less', '$lessb', '$taxpay')";
		if(!mysqli_query($db, $sql))
		{
			echo "error".mysqli_error($db);
		}
		else{
			
		$_SESSION['message']="Your persenal details have been stored successfully";
		$_SESSION['username']= $username;
		header("location: create.php?msg=1");//redirect to home page
		}
}
else
	{
		//failed
		$_SESSION['message']=" Failed to store information";
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
      <li><a href="personal.php">Personal details</a></li>
      <li "class="active"><a href="salary.php">Salary details</a></li>
	  <li><a href="form.php">Generate form 16</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><h4>Welcome <?php echo $_SESSION['empid'];?> </h4 </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav> 
 <form class="form-horizontal" action="create.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="empid">Employee code:</label>
	<div class="col-sm-2">
    <input type="empid" class="form-control" name="empid">
	</div>
  </div><br>
  <div class="form-group">
   <br> <label for="name">1.Gross Salary/Pension:</label></br>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="a">a) Salary as per provision contained in sec 17(1):</label>
    <div class="col-sm-2">
	<input type="a" class="form-control" name="a">
	</div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="b">b) Value of perquisites u/s 17(2) as per  form no 12BA:</label>
    <div class="col-sm-2">
	<input type="b" class="form-control" name="b">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="c">c) Profits in lieu of salary u/s 17(3) as per Form No 12BA:</label>
    <div class="col-sm-2">
	<input type="c" class="form-control" name="c">
  </div>
  </div>
  <div class="form-group">
    <label  class="control-label col-sm-4 for="less">2.Less:  Allowance to the extent exempt u/s 10
:</label>
<div class="col-sm-5">
    <input type="ls" class="form-control" name="ls">
  </div>
  </div>
  <div class="form-group">
    <label for="deduct">3.Deductions:</label>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="ent">a)Entertainment allowance :</label>
    <div class="col-sm-2">
	<input type="ent" class="form-control" name="ent">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="temp">b)Tax on employment :</label>
    <div class="col-sm-2">
	<input type="temp" class="form-control" name="temp">
  </div>
  </div>
  <div class="form-group">
    <label for="4">4) Any other income reported by the employee:</label>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="fa">a) Income under the head "Income from house property"
 :</label>
 <div class="col-sm-2">
    <input type="fa" class="form-control" name="fa">
  </div>
  </div>
  <div class="form-group">
	<label class="control-label col-sm-4 for="fb">b) Income under the head " Income from other sources":</label>
 <div class="col-sm-2">
    <input type="fb" class="form-control" name="fb">
  </div>
  </div>
  <div class="form-group">
    <label for="deduct">5.Other Deductions:</label>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-4 for="va">a) Less:Interest on Education loan repayment  u/s 80(E):</label>
 <div class="col-sm-2">
    <input type="va" class="form-control" name="va">
  </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-4 for="vb">d) Less:Interest on Housing Loan exempt u/s 24(b) :</label>
    <div class="col-sm-2">
	<input type="vb" class="form-control" name="vb">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="vc">e) Less: u/s 80(U) :</label>
    <div class="col-sm-2">
	<input type="vc" class="form-control" name="vc">
  </div>
  </div>
  <div class="form-group">
    <label for="deduct">6.Deductions under chapter VI- A:</label>
  </div>
  <div class="form-group">
    <label for="deduct">(A) Section 80C,80CCC and 80CCD :</label>
  </div>
  <div class="form-group">
    <label for="deduct">a) Section 80C :</label>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="sa">i) Provident fund :</label>
    <div class="col-sm-2">
	<input type="sa" class="form-control" name="sa">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="sb">ii) LIC Premium:</label>
    <div class="col-sm-2">
	<input type="sb" class="form-control" name="sb">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="sc">iii) Investment in 6 years NSC :</label>
    <div class="col-sm-2">
	<input type="sc" class="form-control" name="sc">
  </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-4 for="sd">iv) Interest accrued on 6 year NSC :</label>
    <div class="col-sm-2">
	<input type="sd" class="form-control" name="sd">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="se">v) Tution Fees paid for education of children :</label>
    <div class="col-sm-2">
	<input type="se" class="form-control" name="se">
  </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-4 for="sf">vi) Fixed deposit with bank in Tax savings scheme/ Mutual Fund
:</label>
<div class="col-sm-2">
    <input type="sf" class="form-control" name="sf">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="sg">vii) Public Provident Fund / ULIP :</label>
   <div class="col-sm-2">
   <input type="sg" class="form-control" name="sg">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="sh">viii) Repayment of Housing Loan :</label>
    <div class="col-sm-2">
	<input type="sh" class="form-control" name="sh">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="si">(b) sec 80CCG :</label>
    <div class="col-sm-2">
	<input type="si" class="form-control" name="si">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="sj">(c) sec 80CCD :</label>
    <div class="col-sm-2">
	<input type="sj" class="form-control" name="sj">
  </div>
  </div>
  <div class="form-group">
    <label for="deduct">(B) Other Scheme (e.g 80D to 80G etc) :</label>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="sk">(a)Medi claim u/s 80D:</label>
    <div class="col-sm-2">
	<input type="sk" class="form-control" name="sk">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="sea">7  a)Tax on total income :</label>
    <div class="col-sm-2">
	<input type="sea" class="form-control" name="sea">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="seb">  b) Rebate u/s 87A  :</label>
    <div class="col-sm-2">
	<input type="seb" class="form-control" name="seb">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="sur">  8. Surcharge (on tax computed at Sl No.7) :</label>
    <div class="col-sm-2">
	<input type="sur" class="form-control" name="sur">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="edu"> 9. Education Cess ( on tax at S.No.7 and surcharge at S.No 8)  :</label>
    <div class="col-sm-2">
	<input type="edu" class="form-control" name="edu">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="relief">  10. Relief under section 89 (attach details) :</label>
    <div class="col-sm-2">
	<input type="rel" class="form-control" name="rel">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="tax">  11.  Less: (a) Tax Deducted at source u/s 192(1)  :</label>
    <div class="col-sm-2">
	<input type="less" class="form-control" name="less">
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4 for="tax">             b) Tax paid by the employer on behalf of the employee :</label>
    <div class="col-sm-2">
	<input type="leesb" class="form-control" name="lessb">
  </div>
  </div>
  
 <div class="form-group">
    <div class="control-label col-sm-4 class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form> 

</body>
</html>
	

			
		

		
		

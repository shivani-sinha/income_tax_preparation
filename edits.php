<?php
session_start();
//connect to database
$db= mysqli_connect("localhost", "root","", "authentication");
//select databaste
mysqli_select_db($db,"authentication");
$emp=$_SESSION['empid'];
$sql="SELECT * FROM salary WHERE empid='$emp'";
$record=mysqli_query($db, $sql);
foreach ($record as $res) {
	$a= $res['a'];
	$b= $res['b'];
	$c= $res['c'];
	$d= $res['d'];
	$ls= $res['ls'];
	$bal= $res['bal'];
	$ent= $res['ent'];
	$temp= $res['temp'];
	$agre= $res['agre'];
	$sal= $res['sal'];
	$fa= $res['fa'];
	$fb= $res['fb'];
	$va= $res['va'];
	$vb=$res['vb'];
	$vc= $res['vc'];
	$total= $res['total'];
	$gross= $res['gross'];
	$sa= $res['sa'];
	$sb= $res['sb'];
	$sc= $res['sc'];
	$sd= $res['sd'];
	$se=$res['se'];
	$sf= $res['sf'];
	$sg=$res['sg'];
	$sh= $res['sh'];
	
	$tdeduct= $res['tdeduct'];
	$si= $res['si'];
	$sj= $res['sj'];
	$sk= $res['sk'];
	$agrededuct= $res['agrededuct'];
	$tincome= $res['tincome'];
	$sea= $res['sea'];
	$seb= $res['seb'];
	$nettax=$res['nettax'];
	$sur= $res['sur'];
	$edu=$res['edu'];
	$tax= $res['tax'];
	
	$rel= $res['rel'];
	$tpay= $res['tpay'];
	$less= $res['less'];
	$lessb= $res['lessb'];
	$taxpay= $res['taxpay'];
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
      <li><a href="personal.php">Personal details</a></li>
      <li class="active"><a href="salary.php">Salary details</a></li>
	  <li><a href="form.php">Generate form 16</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><h4>Welcome <?php echo $_SESSION['empid'];?> </h4 </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav> 
<form method="post" action="editsa.php">
<table>
		
			<tr>
			<th>1.Gross Salary/Pension::  </th>
			</tr>
			<tr>
			<th>a) Salary as per provision contained in sec 17(1) :  </th>
			<td><input type="decimal" name="a" value="<?php echo $a;?>"></td>
			</tr>
			<tr>
			<th>b) Value of perquisites u/s 17(2) as per  form no 12BA :  </th>
			<td><input type="decimal" name="b" value="<?php echo $b;?>"></td>
			</tr>
			<tr>
			<th>c) Profits in lieu of salary u/s 17(3) as per Form No 12BA :  </th>
			<td><input type="decimal" name="c" value="<?php echo $c;?>"></td>
			</tr>
			<tr>
			<th>d) Total :  </th>
			<td><input type="decimal" name="d" value="<?php echo $d;?>"></td>
			</tr>
			<tr>
			<th>2.Less:  Allowance to the extent exempt u/s 10:  </th>
			<td><input type="decimal" name="ls" value="<?php echo $ls;?>"></td>
			</tr>
			<tr>
			<th>3.Balance(1-2):  </th>
			<td><input type="decimal" name="bal" value="<?php echo $bal;?>"></td>
			</tr>
			<tr>
			<th>4.DEDUCTIONS : </th>
			</tr>
			<tr>
			<th>a) Entertainment allowance :  </th>
			<td><input type="decimal" name="ent" value="<?php echo $ent;?>"></td>
			</tr>
			<tr>
			<th>b)Tax on Employment:  </th>
			<td><input type="decimal" name="temp" value="<?php echo $temp;?>"></td>
			</tr>
			<tr>
			<th> 5.Aggregate of 4(a) to (b) :  </th>
			<td><input type="decimal" name="agre" value="<?php echo $agre;?>"></td>
			</tr>
			<tr>
			<th>6.INCOME CHARGEABLE UNDER THE HEAD SALARIES(3-5) : </th>
			<td><input type="decimal" name="sal" value="<?php echo $sal;?>"></td>
			</tr>
			<tr>
			<th>7.ADD : Any other income reported by the employee:  </th>
			</tr>
			<tr>
			<th>a) Income under the head 'Income from house property' :  </th>
			<td><input type="decimal" name="fa" value="<?php echo $fa;?>"></td>
			</tr>
			<tr>
			<th>b) Income under the head ' Income from other sources':  </th>
			<td><input type="decimal" name="fb" value="<?php echo $fb;?>"></td>
			</tr>
			<tr>
			<th>c) Less:Interest on Education loan repayment  u/s 80(E):  </th>
			<td><input type="decimal" name="va" value="<?php echo $va;?>"></td>
			</tr>
			<tr>
			<th>d) Less:Interest on Housing Loan exempt u/s 24(b):  </th>
			<td><input type="decimal" name="vb" value="<?php echo $vb;?>"></td>
			</tr>
			<tr>
			<th>e) Less: u/s 80(U) :  </th>
			<td><input type="decimal" name="vc" value="<?php echo $vc;?>"></td>
			</tr>
			<tr>
			<th>Total of (a+b-c-d-e) :  </th>
			<td><input type="decimal" name="total" value="<?php echo $total;?>"></td>
			</tr>
			<tr>
			<th>8.GROSS TOTAL INCOME (6+7):  </th>
			<td><input type="decimal" name="gross" value="<?php echo $gross;?>"></td>
			</tr>
			<tr>
			<th>9. Deductions under chapter VI - A :  </th>
			</tr>
			<tr>
			<th>(A) Section 80C,80CCC and 80CCD :  </th>
			</tr>
			<tr>
			<th>(a) Sec-80C :  </th>
			</tr>
			<tr>
			<th>i) Provident Fund:  </th>
			<td><input type="decimal" name="sa" value="<?php echo $sa;?>"></td>
			</tr>
			<tr>
			<th>ii) LIC Premium :  </th>
			<td><input type="decimal" name="sb" value="<?php echo $sb;?>"></td>
			</tr>
			<tr>
			<th>iii) Investment in 6 years NSC:  </th>
			<td><input type="decimal" name="sc" value="<?php echo $sc;?>"></td>
			</tr>
			<tr>
			<th>iv) Interest accrued on 6 year NSC :  </th>
			<td><input type="decimal" name="sd" value="<?php echo $sd;?>"></td>
			</tr>
			<tr>
			<th>v) Tution Fees paid for education of children:  </th>
			<td><input type="decimal" name="se" value="<?php echo $se;?>"></td>
			</tr>
			<tr>
			<th>vi) Fixed deposit with bank in Tax savings scheme/ Mutual Fund :  </th>
			<td><input type="decimal" name="sf" value="<?php echo $sf;?>"></td>
			</tr>
			<tr>
			<th>vii) Public Provident Fund / ULIP :  </th>
			<td><input type="decimal" name="sg" value="<?php echo $sg;?>"></td>
			</tr>
			<tr>
			<th>viii) Repayment of Housing Loan:  </th>
			<td><input type="decimal" name="sh" value="<?php echo $sh;?>"></td>
			</tr>
			<tr>
			<th>Total (Allowable Amount u/s 80C):  </th>
			<td><input type="decimal" name="tdeduct" value="<?php echo $tdeduct;?>"></td>
			</tr>
			<tr>
			<th>(b) sec 80CCG :  </th>
			<td><input type="decimal" name="si" value="<?php echo $si;?>"></td>
			</tr>
			<tr>
			<th>(c)sec 80CCD :  </th>
			<td><input type="decimal" name="sj" value="<?php echo $sj;?>"></td>
			</tr>
			<tr>
			<th>(B) Other Scheme (e.g 80D to 80G etc) :  </th>
			</tr>
			<tr>
			<th>a) Medi claim u/s 80D :  </th>";
			<td><input type="decimal" name="sk" value="<?php echo $sk;?>"></td>
			</tr>
			<tr>
			<th>10 Aggregate of deductible amount under Chapter VIA :  </th>
			<td><input type="decimal" name="agrededuct" value="<?php echo $agrededuct;?>"></td>
			</tr>
			<tr>
			<th>11 TOTAL INCOME (8-10) :  </th>
			<td><input type="decimal" name="tincome" value="<?php echo $tincome;?>"></td>
			</tr>
			<tr>
			<th>12. a)Tax on Total Income :  </th>
			<td><input type="decimal" name="sea" value="<?php echo $sea;?>"></td>
			</tr>
			<tr>
			<th>     b) Rebate u/s 87A :  </th>
			<td><input type="decimal" name="seb" value="<?php echo $seb;?>"></td>
			</tr>
			<tr>
			<th>     c) Net Tax Payable:  </th>
			<td><input type="decimal" name="nettax" value="<?php echo $nettax;?>"></td>
			</tr>
			<tr>
			<th>13.Surcharge (on tax computed at Sl No.12):  </th>
			<td><input type="decimal" name="sur" value="<?php echo $sur;?>"></td>
			</tr>
			<tr>
			<th>14.Education Cess ( on tax at S.No.12 and surcharge at S.No 13:  </th>
			<td><input type="decimal" name="edu" value="<?php echo $edu;?>"></td>
			</tr>
			<tr>
			<th>15.Tax payable (12+13+14): </th>
			<td><input type="decimal" name="tax" value="<?php echo $tax;?>"></td>
			</tr>
			<tr>
			<th> 16. Relief under section 89 (attach details):  </th>
			<td><input type="decimal" name="rel" value="<?php echo $rel;?>"></td>
			</tr>
			<tr>
			<th>17.Tax payable(15-16):  </th>
			<td><input type="decimal" name="tpay" value="<?php echo $tpay;?>"></td>
			</tr>
			<tr>
			<th>18 Less: (a) Tax Deducted at source u/s 192(1):  </th>
			<td><input type="decimal" name="less" value="<?php echo $less;?>"></td>
			</tr>
			<tr>
			<th>         (b) Tax paid by the employer on behalf of the employee :  </th>
			<td><input type="decimal" name="lessb" value="<?php echo $lessb;?>"></td>
			</tr>
			<tr>
			<th>19.Tax Payable/ Refundable (17-18):  </th>
			<td><input type="decimal" name="taxpay" value="<?php echo $taxpay;?>"></td>
			</tr>
			<tr>
			<td></td>
		<td><button type="submit" name="update" class="btn btn-default">Update</button></td>
	</tr>
	</table>
	</form>
	</body>
	</html>

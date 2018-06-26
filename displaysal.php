
<?php
session_start();
//connect to database
$db= mysqli_connect("localhost", "root","", "authentication");
//select databaste
mysqli_select_db($db,"authentication");
$emp=$_SESSION['empid'];
$sql="SELECT * FROM salary WHERE empid='$emp'";
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

<table>
		
		
	<?php
	$recordcheck= mysqli_num_rows($record);
	if($recordcheck>0)
	{
		while($row = mysqli_fetch_assoc($record))
		{	echo "<tr>";
			echo"<th></th>";
			echo"<td></td>";
			echo"<td> <a href='edits.php?edit=$row[empid]'>edit</a> </td>";
			echo "</tr>";
			
		
	
			echo "<tr>";
			echo"<th>Employee code :  </th>";
			echo"<td>".$row['empid']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<tr>";
			echo"<th>1.Gross Salary/Pension::  </th>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>a) Salary as per provision contained in sec 17(1) :  </th>";
			echo"<td>".$row['a']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>b) Value of perquisites u/s 17(2) as per  form no 12BA :  </th>";
			echo"<td>".$row['b']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>c) Profits in lieu of salary u/s 17(3) as per Form No 12BA :  </th>";
			echo"<td>".$row['c']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>d) Total :  </th>";
			echo"<td>".$row['d']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>2.Less:  Allowance to the extent exempt u/s 10:  </th>";
			echo"<td>".$row['ls']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>3.Balance(1-2):  </th>";
			echo"<td>".$row['bal']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>4.DEDUCTIONS : </th>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>a) Entertainment allowance :  </th>";
			echo"<td>".$row['ent']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>b)Tax on Employment:  </th>";
			echo"<td>".$row['temp']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th> 5.Aggregate of 4(a) to (b) :  </th>";
			echo"<td>".$row['agre']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>6.INCOME CHARGEABLE UNDER THE HEAD SALARIES(3-5) : </th>";
			echo"<td>".$row['sal']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>7.ADD : Any other income reported by the employee:  </th>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>a) Income under the head 'Income from house property' :  </th>";
			echo"<td>".$row['fa']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>b) Income under the head ' Income from other sources':  </th>";
			echo"<td>".$row['fb']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>c) Less:Interest on Education loan repayment  u/s 80(E):  </th>";
			echo"<td>".$row['va']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>d) Less:Interest on Housing Loan exempt u/s 24(b):  </th>";
			echo"<td>".$row['vb']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>e) Less: u/s 80(U) :  </th>";
			echo"<td>".$row['vc']."</td>";
			echo "</tr>";
			echo"<th>Total of (a+b-c-d-e) :  </th>";
			echo"<td>".$row['total']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>8.GROSS TOTAL INCOME (6+7):  </th>";
			echo"<td>".$row['gross']."</td>";
			echo "</tr>";
			echo"<tr>";
			echo"<th>9. Deductions under chapter VI - A :  </th>";
			echo "</tr>";
			echo"<tr>";
			echo"<th>(A) Section 80C,80CCC and 80CCD :  </th>";
			echo "</tr>";
			echo"<tr>";
			echo"<th>(a) Sec-80C :  </th>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>i) Provident Fund:  </th>";
			echo"<td>".$row['sa']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>ii) LIC Premium :  </th>";
			echo"<td>".$row['sb']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>iii) Investment in 6 years NSC:  </th>";
			echo"<td>".$row['sc']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>iv) Interest accrued on 6 year NSC :  </th>";
			echo"<td>".$row['sd']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>v) Tution Fees paid for education of children:  </th>";
			echo"<td>".$row['se']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>vi) Fixed deposit with bank in Tax savings scheme/ Mutual Fund :  </th>";
			echo"<td>".$row['sf']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>vii) Public Provident Fund / ULIP :  </th>";
			echo"<td>".$row['sg']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>viii) Repayment of Housing Loan:  </th>";
			echo"<td>".$row['sh']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>Total (Allowable Amount u/s 80C):  </th>";
			echo"<td>".$row['tdeduct']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>(b) sec 80CCG :  </th>";
			echo"<td>".$row['si']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>(c)sec 80CCD :  </th>";
			echo"<td>".$row['sj']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>(B) Other Scheme (e.g 80D to 80G etc) :  </th>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>a) Medi claim u/s 80D :  </th>";
			echo"<td>".$row['sk']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>10 Aggregate of deductible amount under Chapter VIA :  </th>";
			echo"<td>".$row['agrededuct']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>11 TOTAL INCOME (8-10) :  </th>";
			echo"<td>".$row['tincome']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>12. a)Tax on Total Income :  </th>";
			echo"<td>".$row['sea']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>     b) Rebate u/s 87A :  </th>";
			echo"<td>".$row['seb']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>     c) Net Tax Payable:  </th>";
			echo"<td>".$row['nettax']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>13.Surcharge (on tax computed at Sl No.12):  </th>";
			echo"<td>".$row['sur']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>14.Education Cess ( on tax at S.No.12 and surcharge at S.No 13:  </th>";
			echo"<td>".$row['edu']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>15.Tax payable (12+13+14): </th>";
			echo"<td>".$row['tax']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th> 16. Relief under section 89 (attach details):  </th>";
			echo"<td>".$row['rel']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>17.Tax payable(15-16):  </th>";
			echo"<td>".$row['tpay']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>18 Less: (a) Tax Deducted at source u/s 192(1):  </th>";
			echo"<td>".$row['less']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>         (b) Tax paid by the employer on behalf of the employee :  </th>";
			echo"<td>".$row['lessb']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo"<th>19.Tax Payable/ Refundable (17-18):  </th>";
			echo"<td>".$row['taxpay']."</td>";
			echo "</tr>";
		}
	}
	?>
	</table>
	</body>
	</html>
		
		
		
		
		
		
		
		
		
		
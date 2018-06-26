<?php
session_start();
//connect to database
$db= mysqli_connect("localhost", "root","", "authentication");
//select databaste
mysqli_select_db($db,"authentication");

require_once('fpdf/fpdf.php');
class PDF extends FPDF
{
	
	function Header()
	{
		$this->SetFont('Arial','B',12);
		$this->cell(10);
		$this->cell(180,5,"FORM NO.16",1,0,'C');
		$this->ln();
		$this->SetFont('Arial','',10);
		$this->cell(10);
		$this->cell(180,5,"[See rule31(1)(a)]",1,0,'C');
		$this->ln(10);
		$this->SetFont('Arial','U',10);
		$this->cell(10);
		$this->cell(180,5,"CERTIFICATE UNDER SECTION 203 OF THE INCOME TAX ACT,1961 FOR TAX DEDUCTED AT SOURCE ON SALARY ",0,0,'C');
		$this->ln(20);
		
	}
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page'.$this->PageNo(),0,0,'C');
		
	}
	
}
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
$emp=$_SESSION['empid'];

$sql="SELECT * FROM personal p INNER JOIN salary s ON p.empid=s.empid WHERE p.empid='$emp'";
$record=mysqli_query($db, $sql);
$recordcheck= mysqli_num_rows($record);
	if($recordcheck>0)
	{
		
		while($row = mysqli_fetch_array($record))
		{
			$pdf->SetFont('Arial','U',11);
			$pdf->cell(10);
		    $pdf->cell(100,7,"Name and Address of the employer",1,0);
			$pdf->cell(80,7,"Name and Designation of the employee",1,0);
			$pdf->ln();
			$pdf->SetFont('Arial','',10);
			$pdf->cell(10);
			$x=$pdf->GetX();
			$y=$pdf->GetY();
			$pdf->multicell(100,7,utf8_decode($row['en'] . chr(10) . $row['adrs'] . chr(32). $row['state']. chr(10). $row['pin']),1,'L');
			$pdf->SetXY($x+100,$y);
			$pdf->multicell(80,10.5,utf8_decode($row['fname'].chr(32).$row['mname'].chr(32).$row['lname'] . chr(10) . $row['designation']),1,'L');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(90,7,"PAN no. OF DEDUCTOR",1,0);
			$pdf->cell(10);
			$pdf->cell(80,7,"PAN/GIR no. OF EMPLOYEE",1,0);
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(90,7, $row['pand'],1,0);
			$pdf->cell(10);
			$pdf->cell(80,7, $row['pan'],1,0);
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(90,7,"TAN no. OF DEDUCTOR",1,0);
			$pdf->cell(10);
			$pdf->cell(80,7,"PERIOD",1,0,'C');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(90,7, $row['tan'],1,0);
			$pdf->cell(10);
			$pdf->cell(80,7, $row['pfrom']." to ". $row['pto'],1,0,'C');
			$pdf->ln();
			$pdf->cell(110);
			$pdf->cell(80,7,"       ASSESMENT YEAR     ",1,0,'C');
			$pdf->ln();
			$pdf->cell(110);
			$pdf->cell(80,7, $row['year'],1,0,'C');
			$pdf->ln(20);
			$pdf->cell(10);
			$pdf->SetFont('Arial','U',11);
			$pdf->cell(180,7,"DETAILS OF SALARY/PENSION PAID AND ANY OTHER INCOME AND TAX DEDUCTED",0,0);
			$pdf->ln(10);
			$pdf->cell(10);
			$pdf->SetFont('Arial','U',10);
			$pdf->cell(180,7,"1.Gross Salary/Pension: ",1,0);
			$pdf->ln();
			$pdf->cell(10);
			$pdf->SetFont('Arial','',10);
			$pdf->cell(140,7,"a) Salary as per provision contained in sec 17(1) : ",1,0);
			$pdf->cell(40,7,$row['a'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"b) Value of perquisites u/s 17(2) as per  form no 12BA : ",1,0);
			$pdf->cell(40,7,$row['b'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"b) Value of perquisites u/s 17(2) as per  form no 12BA : ",1,0);
			$pdf->cell(40,7,$row['c'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"d) Total :  ",1,0);
			$pdf->cell(40,7,$row['d'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"2.Less:  Allowance to the extent exempt u/s 10:  ",1,0);
			$pdf->cell(40,7,$row['ls'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"3.Balance(1-2):   ",1,0);
			$pdf->cell(40,7,$row['bal'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(180,7,"4.DEDUCTIONS :    ",1,0);
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"a) Entertainment allowance :   ",1,0);
			$pdf->cell(40,7,$row['ent'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"b)Tax on Employment:   ",1,0);
			$pdf->cell(40,7,$row['temp'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"5.Aggregate of 4(a) to (b) :  ",1,0);
			$pdf->cell(40,7,$row['agre'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"6.INCOME CHARGEABLE UNDER THE HEAD SALARIES(3-5) :   ",1,0);
			$pdf->cell(40,7,$row['sal'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(180,7,"7.ADD : Any other income reported by the employee:    ",1,0);
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"a) Income under the head 'Income from house property' :   ",1,0);
			$pdf->cell(40,7,$row['fa'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"b) Income under the head ' Income from other sources':    ",1,0);
			$pdf->cell(40,7,$row['fb'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"c) Less:Interest on Education loan repayment  u/s 80(E):   ",1,0);
			$pdf->cell(40,7,$row['va'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"d) Less:Interest on Housing Loan exempt u/s 24(b):  ",1,0);
			$pdf->cell(40,7,$row['vb'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"e) Less: u/s 80(U) :   ",1,0);
			$pdf->cell(40,7,$row['vc'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"Total of (a+b-c-d-e):   ",1,0);
			$pdf->cell(40,7,$row['total'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"8.GROSS TOTAL INCOME (6+7):    ",1,0);
			$pdf->cell(40,7,$row['gross'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(180,7,"9. Deductions under chapter VI - A :    ",1,0);
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(180,7,"(A) Section 80C,80CCC and 80CCD :   ",1,0);
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(180,7,"(a) Sec-80C :    ",1,0);
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"i) Provident Fund: :   ",1,0);
			$pdf->cell(40,7,$row['sa'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"ii) LIC Premium  :   ",1,0);
			$pdf->cell(40,7,$row['sb'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"iii) Investment in 6 years NSC:   ",1,0);
			$pdf->cell(40,7,$row['sc'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"iv) Interest accrued on 6 year NSC :   ",1,0);
			$pdf->cell(40,7,$row['sd'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"v) Tution Fees paid for education of children:     ",1,0);
			$pdf->cell(40,7,$row['se'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"vi) Fixed deposit with bank in Tax savings scheme/ Mutual Fund :    ",1,0);
			$pdf->cell(40,7,$row['sf'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"vii) Public Provident Fund / ULIP :  ",1,0);
			$pdf->cell(40,7,$row['sg'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"viii) Repayment of Housing Loan:    ",1,0);
			$pdf->cell(40,7,$row['sh'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"Total (Allowable Amount u/s 80C):   ",1,0);
			$pdf->cell(40,7,$row['tdeduct'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"(b) sec 80CCG :   ",1,0);
			$pdf->cell(40,7,$row['si'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"(c)sec 80CCD :   ",1,0);
			$pdf->cell(40,7,$row['sj'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(180,7,"(B) Other Scheme (e.g 80D to 80G etc) :   ",1,0);
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"a) Medi claim u/s 80D :   ",1,0);
			$pdf->cell(40,7,$row['sk'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"10 Aggregate of deductible amount under Chapter VIA :  ",1,0);
			$pdf->cell(40,7,$row['agrededuct'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"11 TOTAL INCOME (8-10) :   ",1,0);
			$pdf->cell(40,7,$row['tincome'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"12. a)Tax on Total Income :   ",1,0);
			$pdf->cell(40,7,$row['sea'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"     b) Rebate u/s 87A : ",1,0);
			$pdf->cell(40,7,$row['seb'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"     c) Net Tax Payable: ",1,0);
			$pdf->cell(40,7,$row['nettax'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"13.Surcharge (on tax computed at Sl No.12):   ",1,0);
			$pdf->cell(40,7,$row['sur'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"14.Education Cess ( on tax at S.No.12 and surcharge at S.No 13:  ",1,0);
			$pdf->cell(40,7,$row['edu'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"15.Tax payable (12+13+14):  ",1,0);
			$pdf->cell(40,7,$row['tax'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"16. Relief under section 89 (attach details):  ",1,0);
			$pdf->cell(40,7,$row['rel'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"17.Tax payable(15-16):   ",1,0);
			$pdf->cell(40,7,$row['tpay'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"18 Less: (a) Tax Deducted at source u/s 192(1):    ",1,0);
			$pdf->cell(40,7,$row['less'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"         (b) Tax paid by the employer on behalf of the employee :    ",1,0);
			$pdf->cell(40,7,$row['lessb'],1,0,'R');
			$pdf->ln();
			$pdf->cell(10);
			$pdf->cell(140,7,"19.Tax Payable/ Refundable (17-18):  ",1,0);
			$pdf->cell(40,7,$row['taxpay'],1,0,'R');
		}
	}
	
	$pdf->Output();
?>


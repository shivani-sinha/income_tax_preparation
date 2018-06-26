<?php
session_start();

//connect to database
$db= mysqli_connect("localhost", "root","", "authentication");
 $emp=$_SESSION['empid'];
if(isset($_POST['update']))
{    
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
	$sql="UPDATE salary SET a='$a', b='$b', c='$c', d='$d', ls='$ls', bal='$bal', ent='$ent', temp='$temp', agre='$agre', sal='$sal', fa='$fa', fb='$fb', va='$va', vb='$vb', vc='$vc', total='$total', gross='$gross', sa='$sa', sb='$sb', sc='$sc', sd='$sd', se='$se', sf='$sf', sg='$sg', sh='$sh', tdeduct='$tdeduct', si='$si', sj='$sj', sk='$sk', agrededuct='$agrededuct', tincome='$tincome', sea='$sea', seb='$seb', nettax='$nettax', sur='$sur', edu='$edu', tax='$tax', rel='$rel', tpay='$tpay', less='$less', lessb='$lessb', taxpay='$taxpay' WHERE empid=$emp";
	if(!mysqli_query($db, $sql))
		{
			echo "error".mysqli_error($db);
		}
		else{
        //redirectig to the display page. In our case, it is index.php
        header("Location: displaysal.php");
		}
}
?>


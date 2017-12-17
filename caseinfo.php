<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/10
 * Time: 18:47
 */
require './init.php';
$username=$_SESSION['user']['username'];
$sf=$_SESSION['user']['sf'];
$date=date('Y-m');
$restunum=$_GET['snum'];
$sql1="select stunum,stuname,college,grade,specity,sex,nation from stuinfo where stunum='".$restunum."'";
//echo $sql1;
$query1=mysql_query($sql1);
$result=mysql_fetch_array($query1);
$stuname=$result['stuname'];
$college=$result['college'];
$specity=$result['specity'];
$grade=$result['grade'];
$sex=$result['sex'];
$nation=$result['nation'];

$sql2="select * from testscore where stunum='".$restunum."' and inserttime='".$date."'";
//echo $sql2;
$query2=mysql_query($sql2);
$rs2=mysql_fetch_array($query2);
$isonlychild=$rs2['isonlychild'];
$familyaddress=$rs2['familyaddress'];
$familyecnomic=$rs2['familyecnomic'];
$familystructure=$rs2['familystructure'];
$familyralation=$rs2['familyralation'];
$healthy=$rs2['healthy'];
$study=$rs2['study'];
$socialship=$rs2['socialship'];
$sh1=$rs2['sh1'];
$sh2=$rs2['sh2'];
$sh3=$rs2['sh3'];
$sh4=$rs2['sh4'];
$sh5=$rs2['sh5'];
$sh6=$rs2['sh6'];
$sh7=$rs2['sh7'];
$sh8=$rs2['sh8'];
$sl1=$rs2['sl1'];
$sl2=$rs2['sl2'];
$sl3=$rs2['sl3'];
$sl4=$rs2['sl4'];
$qx1=$rs2['qx1'];
$qx2=$rs2['qx2'];
$qx3=$rs2['qx3'];
$qx4=$rs2['qx4'];
$qx5=$rs2['qx5'];
$qx6=$rs2['qx6'];
$xw1=$rs2['xw1'];
$xw2=$rs2['xw2'];
$xw3=$rs2['xw3'];
$xw4=$rs2['xw4'];
$xw5=$rs2['xw5'];
$tr1=$rs2['tr1'];
$tr2=$rs2['tr2'];
$tr3=$rs2['tr3'];
$tr4=$rs2['tr4'];
$tr5=$rs2['tr5'];
$tr6=$rs2['tr6'];
$tr7=$rs2['tr7'];
$tr8=$rs2['tr8'];
$tr9=$rs2['tr9'];
$tr10=$rs2['tr10'];
$tr11=$rs2['tr11'];
$tr12=$rs2['tr12'];
$tr13=$rs2['tr13'];
$tr14=$rs2['tr14'];
$tr15=$rs2['tr15'];
$tr16=$rs2['tr16'];
$tr17=$rs2['tr17'];
$tr18=$rs2['tr18'];


if($sf=='心理委员'){
    require './stucaseinfo.html';
}else if($sf=='心理健康中心'){
    require './caseinfo.html';
}else{
    require './caseinfo.html';
}
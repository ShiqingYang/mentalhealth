<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/6
 * Time: 16:08
 */
require './init.php';
$username=$_SESSION['user']['username'];
$sf=$_SESSION['user']['sf'];
$date=date('Y-m');
$restunum=$_GET['snum'];

//表单处理
if($_POST){
    //定义允许的字段
    $allow_fields = array('college','grade','nation','sex');
    //获取员工更新数据表单
    $update = array();
    foreach($allow_fields as $v){
        $data = input_post($v); //接收$_POST数据
        $data = db_escape(filter($data)); //数据过滤
        //把键和值按照sql更新语句中的语法要求连接，并存入到$update数组中
        $update[] = "`$v`='$data'";
    }
    //把$update数组元素使用逗号连接
    $update_sql = implode(',', $update);
    $sql = "update stuinfo set $update_sql where stunum=$restunum";

    $allow_fields2 = array('college','grade','nation','sex','isonlychild','familyaddress','familyecnomic','familystructure','familyralation','healthy','study','socialship','sh1','sh2','sh3','sh4','sh5','sh6','sh7','sh8','sl1','sl2','sl3','sl4','qx1','qx2','qx3','qx4','qx5','qx6','xw1','xw2','xw3','xw4','xw5','tr1','tr2','tr3','tr4','tr5','tr6','tr7','tr8','tr9','tr10','tr11','tr12','tr13','tr14','tr15','tr16','tr17','tr18');
    //获取员工更新数据表单
    $update2 = array();
    foreach($allow_fields2 as $v){
        $data2 = input_post($v); //接收$_POST数据
        $data2 = db_escape(filter($data2)); //数据过滤
       // echo $data2;
        //把键和值按照sql更新语句中的语法要求连接，并存入到$update数组中
        $update2[] = "`$v`='$data2'";
    }
    //把$update数组元素使用逗号连接
    $update_sql2 = implode(',', $update2);
    $sql2 = "update testscore set $update_sql2 where stunum=$restunum";

//计分
    $totalscore=0;
//年级
    if($_POST['grade']==1 || $_POST['grade']==4) $s1=1;
    else if($_POST['grade']==2 || $_POST['grade']==3) $s1=0;
//民族
    if($_POST['nation']==1) $s2=1;
    else if($_POST['nation']==0) $s2=0;
//性别
    if($_POST['sex']==1) $s3=1;
    else if($_POST['sex']==0) $s3=0;
//独生
    if($_POST['isonlychild']=='是') $s4=1;
    else if($_POST['isonlychild']=='否') $s4=0;
//家庭所在地
    if($_POST['familyaddress']=='农村' || $_POST['familyaddress']=='小城镇') $s5=1;
    else if($_POST['familyaddress']=='中小城市' || $_POST['familyaddress']=='大城市') $s5=0;
//家庭经济情况
    if($_POST['familyecnomic']=='贫困') $s6=2;
    else if($_POST['familyecnomic']=='温饱') $s6=1;
    else if($_POST['$familyecnomic']=='富裕' || $_POST['familyecnomic']=='小康')  $s6=0;
//家庭结构
    if($_POST['familystructure']=='孤儿'||$_POST['familystructure']=='寄养') $s7=2;
    else if($_POST['familystructure']=='单亲' ||$_POST['familystructure']=='离异' ||$_POST['familystructure']=='父母婚姻不和睦') $s7=1;
    else if($_POST['familystructure']=='其他') $s7=0;
//亲子关系
    if($_POST['familyralation']=='和睦') $s8=0;
    else if($_POST['familyralation']=='疏离' ||$_POST['familystructure']=='不合') $s8=1;
//健康状况
    if($_POST['healthy']=='健康') $s9=0;
    else if($_POST['healthy']=='目前患有严重疾病') $s9=2;
    else  if($_POST['healthy']=='曾患重大疾病' || $_POST['healthy']=='目前患有疾病') $s9=1;
//学习水平
    if($_POST['study']=='不好') $s10=1;
    else if($_POST['study']=='极差') $s10=2;
    else if($_POST['study']=='好' || $_POST['study']=='一般')  $s10=0;
//社交状况
    if($_POST['socialship']=='人际关系差') $s11=1;
    else if($_POST['socialship']=='人际关系极差') $s11=2;
    else if($_POST['socialship']=='人际关系良好'|| $_POST['socialship']=='一般')  $s11=0;
//遭受重大学业挫折
    if($_POST['sh1']=='是') $s12=3;
    else if($_POST['sh1']=='否') $s12=0;
//被处分或惩罚
    if($_POST['sh2']=='是') $s13=3;
    else if($_POST['sh2']=='否') $s13=0;
//罹患疾病（指严重疾病和慢性疾病）
    if($_POST['sh3']=='是') $s14=3;
    else if($_POST['sh3']=='否')  $s14=0;
//发生严重人际冲突（包括朋友和亲人）
    if($_POST['sh4']=='是') $s15=3;
    else if($_POST['sh4']=='否')  $s15=0;
//失恋
    if($_POST['sh5']=='是') $s16=1;
    else if($_POST['sh5']=='否')  $s16=0;
//债务危机
    if($_POST['sh6']=='是') $s17=1;
    else if($_POST['sh6']=='否')  $s17=0;
//找不到工作
    if($_POST['sh7']=='是') $s18=1;
    else if($_POST['sh7']=='否')  $s18=0;
//沉迷网络
    if($_POST['sh8']=='是') $s19=1;
    else if($_POST['sh8']=='否')  $s19=0;
//生理反应
    if($_POST['sl1']=='是') $s20=1;
    else  if($_POST['sl1']=='否')  $s20=0;
    if($_POST['sl2']=='是') $s21=1;
    else  if($_POST['sl2']=='否')  $s21=0;
    if($_POST['sl3']=='是') $s22=1;
    else  if($_POST['sl3']=='否')  $s22=0;
    if($_POST['sl4']=='是') $s23=1;
    else  if($_POST['sl4']=='否')  $s23=0;
//头疼
    if($_POST['qx1']=='是') $s24=1;
    else if($_POST['qx1']=='否') $s24=0;
    if($_POST['qx2']=='是') $s25=1;
    else if($_POST['qx2']=='否') $s25=0;
    if($_POST['qx3']=='是') $s26=1;
    else if($_POST['qx3']=='否') $s26=0;
    if($_POST['qx4']=='是') $s27=1;
    else if($_POST['qx4']=='否') $s27=0;
    if($_POST['qx5']=='是') $s28=3;
    else if($_POST['qx5']=='否') $s28=0;
    if($_POST['qx6']=='是') $s29=3;
    else if($_POST['qx6']=='否') $s29=0;
//情绪反应
    if($_POST['xw1']=='是') $s30=1;
    else if($_POST['xw1']=='否') $s30=0;
    if($_POST['xw2']=='是') $s31=1;
    else if($_POST['xw2']=='否') $s31=0;
    if($_POST['xw3']=='是') $s32=3;
    else if($_POST['xw3']=='否') $s32=0;
    if($_POST['xw4']=='是') $s33=3;
    else if($_POST['xw4']=='否') $s33=0;
    if($_POST['xw5']=='是') $s52=3;
    else  if($_POST['xw5']=='否') $s52=0;
//他人印象
    if($_POST['tr1']=='是') $s34=1;
    else if($_POST['tr1']=='否') $s34=0;
    if($_POST['tr2']=='是') $s35=1;
    else if($_POST['tr2']=='否') $s35=0;
    if($_POST['tr3']=='是') $s36=1;
    else if($_POST['tr3']=='否') $s36=0;
    if($_POST['tr4']=='是') $s37=1;
    else if($_POST['tr4']=='否') $s37=0;
    if($_POST['tr5']=='是') $s38=1;
    else if($_POST['tr5']=='否') $s38=0;
    if($_POST['tr6']=='是') $s39=1;
    else if($_POST['tr6']=='否') $s39=0;
    if($_POST['tr7']=='是') $s40=1;
    else if($_POST['tr7']=='否') $s40=0;
    if($_POST['tr8']=='是') $s41=1;
    else if($_POST['tr8']=='否') $s41=0;
    if($_POST['tr9']=='是') $s42=1;
    else if($_POST['tr9']=='否') $s42=0;
    if($_POST['tr10']=='是') $s43=1;
    else if($_POST['tr10']=='否') $s43=0;
    if($_POST['tr11']=='是') $s44=1;
    else if($_POST['tr11']=='否') $s44=0;
    if($_POST['tr12']=='是') $s45=1;
    else if($_POST['tr12']=='否') $s45=0;
    if($_POST['tr13']=='是') $s46=1;
    else if($_POST['tr13']=='否') $s46=0;
    if($_POST['tr14']=='是') $s47=1;
    else if($_POST['tr14']=='否') $s47=0;
    if($_POST['tr15']=='是') $s48=1;
    else if($_POST['tr15']=='否') $s48=0;
    if($_POST['tr16']=='是') $s49=1;
    else if($_POST['tr16']=='否') $s49=0;
    if($_POST['tr17']=='是') $s50=1;
    else if($_POST['tr17']=='否') $s50=0;
    if($_POST['tr18']=='是') $s51=1;
    else if($_POST['tr18']=='否') $s51=0;

    $totalscore=$s1+$s2+$s3+$s4+$s5+$s6+$s7+$s8+$s9+$s10+$s11+$s12+$s13+$s14+$s15+$s16+$s17+$s18+$s19+$s20+$s21+$s22+$s23+$s24+$s25+$s26+$s27+$s28+$s29+$s30+$s31+$s32+$s33+$s34+$s35+$s36+$s37+$s38+$s39+$s40+$s41+$s42+$s43+$s44+$s45+$s46+$s47+$s48+$s49+$s50+$s51+$s52;
    $sql3="update testscore set totalscore=".$totalscore." where stunum=".$restunum;
    db_query($sql3);
    if($res = db_query($sql) && $res2=db_query($sql2)){
        header('Location: stulist.php');
        die;
    }else{
        alert_back('更新失败！');
    }
}





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

require './stuedit.html';
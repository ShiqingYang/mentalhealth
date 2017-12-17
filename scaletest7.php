<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/12
 * Time: 23:31
 */
require './init.php';
$username=$_SESSION['user']['username'];
$sf=$_SESSION['user']['sf'];
$date=date('Y-m');
$sql="select * from scaletest7";
$sc7=db_fetch_all($sql);
$restunum=$_GET['snum'];

if($_POST){
    $jjwt=$_POST['jjwt'];
    $zz=$_POST['zz'];
    $qz=$_POST['qz'];
    $hx=$_POST['hx'];
    $tb=$_POST['tb'];
    $hlh=$_POST['hlh'];

    //将分数update到成绩表中
    //echo "<script type='text/javascript'>alert('".$answer."');</script>";

}

require  './scaletest7.html';
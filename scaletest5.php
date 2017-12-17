<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/13
 * Time: 15:39
 */
require './init.php';
$username=$_SESSION['user']['username'];
$sf=$_SESSION['user']['sf'];
$date=date('Y-m');
$restunum=$_GET['snum'];

if($_POST){
    $zf=$_POST['zf'];
    $kgf=$_POST['kgf'];
    $zgf=$_POST['zgf'];
    $lyd=$_POST['lyd'];

    //将分数update到成绩表中
    //echo "<script type='text/javascript'>alert('".$answer."');</script>";

}

require './scaletest5.html';
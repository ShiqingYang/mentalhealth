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
    $score=$_POST['score'];
    $py=$_POST['py'];

    //将分数update到成绩表中
    //echo "<script type='text/javascript'>alert('".$answer."');</script>";

}

require './scalesuicide.html';
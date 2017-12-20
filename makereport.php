<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/12
 * Time: 10:40
 */
require './init.php';
$username=$_SESSION['user']['username'];
$sf=$_SESSION['user']['sf'];
$stunum=$_GET['snum'];
$date=date('Y-m');


if($_POST){
    $xysb=$_POST['xysb'];
    $sbr=$_POST['reportperson'];
    $tel=$_POST['reporttel'];
    $time=$_POST['reporttime'];
    //存入数据库
    $sql="insert into report (stunum,xysb,sbr,tel,date) VALUES ('".$stunum."','".$xysb."','".$sbr."','".$tel."','".$time."')";
    if($rs=db_query($sql)){
        header('Location: down.php');
    }
}

require './makereport.html';
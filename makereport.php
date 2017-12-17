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
$restunum=$_GET['snum'];
if($_POST){
    $xysb=$_POST['xysb'];
    $sbr=$_POST['reportperson'];
    $tel=$_POST['reporttel'];
    $time=$_POST['reporttime'];

    //存入数据库
}

require './makereport.html';
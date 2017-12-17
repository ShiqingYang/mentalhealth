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
$sql="select * from scaletest3";
$sc3=db_fetch_all($sql);

require  './scaletest3.html';
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
$sql="select * from scaletest6";
$sc6=db_fetch_all($sql);

require  './scaletest6.html';
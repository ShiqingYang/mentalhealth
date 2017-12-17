<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/13
 * Time: 15:41
 */
require './init.php';
$username=$_SESSION['user']['username'];
$sf=$_SESSION['user']['sf'];
$date=date('Y-m');
$restunum=$_GET['snum'];

require './scales.html';
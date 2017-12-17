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
$date=date('Y-m');
$sql="select * from testscore WHERE inserttime='".$date."' and college ='".$sf."' order by totalscore desc";
$rows=db_fetch_all($sql);
require 'reportlist.html';
<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/12
 * Time: 11:24
 */
require './init.php';
$username=$_SESSION['user']['username'];
$sf=$_SESSION['user']['sf'];
$sql="select * from testscore WHERE college ='".$sf."' and totalscore>10 order by totalscore desc";
$rows=db_fetch_all($sql);
require 'indanger.html';
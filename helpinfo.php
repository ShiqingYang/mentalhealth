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

if($sf=='心理委员'){
    require './stuhelpinfo.html';
}else if($sf=='心理健康中心'){
    require './helpinfo.html';
}else{
    require './helpinfo.html';
}
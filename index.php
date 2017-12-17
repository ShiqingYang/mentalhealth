<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/6
 * Time: 9:37
 */
//载入项目初始化脚本
require './init.php';
//判断用户是否登录，如果登录，获取用户ID
$user_id = checkLogin();  //如果没有登录，自动跳转到登录
$username=$_SESSION['user']['username'];
$sf=$_SESSION['user']['sf'];
if($sf=='心理委员'){
    header('Location: stuadminadd.php');
}else if($sf=='心理健康中心'){
    header('Location: stulist.php');
}else{
    header('Location: stulist.php');
}

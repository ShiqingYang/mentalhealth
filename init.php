<?php
//当文件的编码是utf-8时，要同时设定网页字符集为utf-8，防止中文乱码
header('Content-Type:text/html;charset=utf-8');

//连接数据库
//避免PHP5.5提示，使用“@”屏蔽错误
$link = @mysql_connect('localhost','root','') || exit('数据库连接失败');

//选择项目的数据库
mysql_select_db('xljk');

//设置数据库编码格式为utf8
mysql_query('set names utf8');
//载入函数库
require './library/function.php';
//启动Session
session_start();
error_reporting(E_ERROR);
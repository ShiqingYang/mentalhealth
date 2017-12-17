<?php
//载入项目初始化脚本
require './init.php';

//判断是否有登录表单提交
if($_POST){
	//接收表单字段
	$username = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$sf=isset($_POST['sf'])?$_POST['sf']:'';
	//将用户名转换为小写
	$username = strtolower($username);
    $sql="select `id`,`username`,`pwd`,`identity`,`identityid` from `admin` where username='".$username."'";
    $result = mysql_query($sql);

//处理结果集
    $user_data = mysql_fetch_assoc($result);

    if($user_data['username'] == $username && $user_data['pwd'] == $password && $user_data['identityid']==$sf){
        //开启Session会话，将用户ID和用户名保存到Session中
        $_SESSION['user'] = array('id'=>$user_data['id'], 'username'=>$user_data['username'], 'sf'=>$user_data['identity']);
        header('Location: index.php');
        exit;  //重定向后停止脚本继续执行
    }
	error('登录失败！用户名或密码错误。');  //验证失败
}

//没有提交表单时，载入登录页面
require './login.html';
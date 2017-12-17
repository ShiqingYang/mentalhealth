<?php

//判断用户是否登录
function checkLogin(){
	//当用户没有登录时，重定向到登录页面
	if(!isset($_SESSION['user'])){
		header('Location: login.php'); 
		exit; //停止脚本文件继续执行
	}
	//用户已登录，返回用户ID
	return isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
}

//判断验证码
function checkCaptcha($captcha){
	//判断验证码
	if(empty($_SESSION['captcha'])){  //如果Session中不存在验证码，则退出
		error('验证码已经过期，请刷新页面重试。');
	}
	//获取验证码并清除Session中的验证码
	$true_captcha = $_SESSION['captcha'];
	unset($_SESSION['captcha']); //限制验证码只能验证一次，防止重复利用
	//忽略字符串的大小写，进行比较
	if(strtolower($captcha) !== strtolower($true_captcha)){
		error('您输入的验证码不正确！请刷新页面重试。');
	}
}
//提示错误并退出
function error($msg){
	exit('<script>alert("'.htmlspecialchars($msg).'");history.back();</script>');
}
function db_query($sql) {
    //执行SQL语句
    if($result = mysql_query($sql)) {
        return $result;
    }else if(DB_DEBUG){
        echo 'SQL执行失败:<br>';
        echo '错误的SQL为:', $sql, '<br>';
        echo '错误的代码为:', mysql_errno(), '<br>';
        echo '错误的信息为:', mysql_error(), '<br>';
        die;
    }else{
        die('SQL语句执行失败。');
    }
}

/**
 * 处理结果集中有多行数据的方法
 * @param string $sql 待执行的SQL
 * @return array 返回遍历结果集后的二维数组
 */
function db_fetch_all($sql) {
    //执行query()函数
    if ($result = db_query($sql)) {
        //执行成功
        //遍历结果集
        $rows = array();
        while( $row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $rows[] = $row;
        }
        //释放结果集资源
        mysql_free_result($result);
        return $rows;

    } else {
        //执行失败
        return false;
    }
}

/**
 * 处理结果集中只有一行数据的方法
 * @param string $sql 待执行的SQL语句
 * @return array 返回结果集处理后的一维数组
 */
function db_fetch_row($sql) {
    //执行query()函数
    if ($result = db_query($sql)) {
        //从结果集取得一次数据即可
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        return $row;
    } else {
        return false;
    }
}

/**
 * 处理结果集只有一个数据的方法
 */
function db_fetch_column($sql){
    if($result = db_query($sql)){
        $row = mysql_fetch_row($result);
        return $row[0];
    }else{
        return false;
    }
}

/**
 * 对数据进行SQL转义
 * @param string $data 待转义字符串
 * @return string 转义后的字符串
 */
function db_escape($data){
    //转义字符串中的特殊字符
    return mysql_real_escape_string($data);
}

//接收GET变量
function input_get($name){
    return isset($_GET[$name]) ? $_GET[$name] : '';
}
//接收POST变量
function input_post($name){
    return isset($_POST[$name]) ? $_POST[$name] : '';
}

/**
 * 对字符串数据进行过滤
 * @param string $data 待转义字符串
 * @return string 转义后的字符串
 */
function filter($data,$func=array('trim','htmlspecialchars')){
    foreach($func as $v){
        //调用可变函数过滤数据
        $data = $v((string)$data);
    }
    return $data;
}

/**
 * JavaScript弹窗并返回
 */
function alert_back($msg){
    echo "<script>alert('$msg');history.back();</script>";
    exit;
}
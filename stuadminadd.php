<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/6
 * Time: 13:34
 */
/* 首先选择月份
 * 找出和他一个班的同学，列表显示当月的清空，每一个同学的信息可以查看和编辑，有是否填写完成的标志，每一项有不同的得分
 * 点击查看，即查看，查看页面里包含编辑按钮
 * 编辑，提交保存。该学生当月标志变为1，显示已填写标志
 * 每一项指标都要保存
 */

require './init.php';
$username=$_SESSION['user']['username'];
$sf=$_SESSION['user']['sf'];
$sql="select stunum,stuname,college,specity,sex,nation from stuinfo where specityid=(select specityid from stuinfo where isstuadmin='1' and stunum='".$username."')";
//echo $sql;
$query = mysql_query($sql);
$rows = array();
while( $row = mysql_fetch_array($query, MYSQL_ASSOC)) {
    $rows[] = $row;
}

require './stuadminadd.html';

<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/6
 * Time: 12:59
 */
session_start();
unset($_SESSION['user']);
header('Location:login.php');
exit;
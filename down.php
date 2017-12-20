<?php
/**
 * Created by PhpStorm.
 * User: Y
 * Date: 2017/12/12
 * Time: 10:40
 */
require './init.php';
require_once 'PHPWord.php';
$username = $_SESSION['user']['username'];
$sf = $_SESSION['user']['sf'];
$date = date('Y-m');
$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template.docx');


$sql = "select * from report  ORDER BY id desc limit 1 ";
$query = mysql_query($sql);
if ($rs = mysql_fetch_array($query)) {
    $stunum = $rs['stunum'];
    $xysb = $rs['xysb'];
    $sbr = $rs['sbr'];
    $tel = $rs['tel'];
    $time = $rs['date'];
    $sql2 = "select stuname from stuinfo where stunum='" . $stunum . "'";
    $query2 = mysql_query($sql2);
    if ($rs2 = mysql_fetch_array($query2)) {
        $stuname = $rs2['stuname'];
        $document->setValue('Value1', iconv('utf-8', 'GB2312//IGNORE', $xysb));
        $document->setValue('Value2', iconv('utf-8', 'GB2312//IGNORE', $sbr));
        $document->setValue('Value3', iconv('utf-8', 'GB2312//IGNORE', $tel));
        $document->setValue('Value4', iconv('utf-8', 'GB2312//IGNORE', $time));
        $document->setValue('Value5', iconv('utf-8', 'GB2312//IGNORE', $stunum));
        $document->setValue('Value6', iconv('utf-8', 'GB2312//IGNORE', $stuname));
        $document->save('ReportForm' . $stunum . $time . '.docx');
    }
}

require './down.html';
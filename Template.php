<?php
require_once 'PHPWord.php';
$stunum='161';
$date=date('Y-m');
$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template.docx');

$document->setValue('Value1', 'Sun');
$document->setValue('Value2', 'Mercury');
$document->setValue('Value3', 'Venus');
$document->setValue('Value4', 'Earth');
$document->setValue('Value5', 'Mars');
$document->setValue('Value6', 'Jupiter');
$document->setValue('Value7', 'Saturn');
$document->setValue('Value8', 'Uranus');
$document->setValue('Value9', iconv('utf-8', 'GB2312//IGNORE', '杨士卿'));
$document->setValue('Value10', 'Pluto');

$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));

$document->save('上报表'.$stunum.$date.'.docx');
require './down.html?stunum=<?php echo $stunum;?>';
?>
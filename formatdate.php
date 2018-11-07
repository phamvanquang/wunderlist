<?php
$t = time();
echo $t . "<br>";
echo date("Y-m-d",$t)."<br>";
$date = "1/11/1111 15:20:20";
$date = strtotime($date);
$date = date("d/m/Y H:i:s",$date);
echo $date . "<br>";
$date=date_create("2013-03-11");
echo date_format($date,"Y/d/m H:i:s")."<br>";
$time = date("Y/m/d H:i:s","2018/10/10");
echo date_timestamp_get($time);
$date = date_create();
echo date_format($date, 'Y-m-d H:i:s') . "<br />";
echo date_format($date, 'H:i:s d-m-Y ');
?>
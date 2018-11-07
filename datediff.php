<?php
$datetime1 = date_create('1998-07-22 20:20:10');
$datetime2 = date_create('2018-10-12 21:10:10');
$interval = date_diff($datetime1, $datetime2);
$interval = date_interval_format($interval,'%y-%d-%m %h:%i:%s');
echo $interval." <br>";
echo date("Y/m/d");
?>
<?php
$date = date_create();
print_r($date);
$a = "11/12/2018";
$a = strtotime($a);
$a = date("d-m-Y",$a);
echo $a."<br>";
$date = date_create('2017-05-1');
date_sub($date, date_interval_create_from_date_string('3 months'));
echo date_format($date, 'Y-m-d');
?>
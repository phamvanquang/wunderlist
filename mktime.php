<?php
$date = date_create();
echo date_format($date, 'Y-m-d H:i:s') . "<br />";
echo date_format($date, 'H:i:s d-m-Y ') . "<br />";
$timestamp = mktime(10,10,10,10,15,2108);
echo $timestamp;
$info = getdate();
echo "<pre>";
    print_r($info);
echo "</pre>";
?>
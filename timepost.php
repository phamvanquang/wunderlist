<?php
$timepost = "20/10/2018 20:10:10";
$timecomment = "22/10/2018 21:20:20";
date_default_timezone_set('Asia/Ho_Chi_Minh');
$datepost = date_parse_from_format("d/m/Y H:i:s",$timepost);
$datecomment = date_parse_from_format("d/m/Y H:i:s",$timecomment);
//print_r($datepost);
//print_r($datecomment);
$tspost = mktime($datepost['hour'],$datepost['minute'],$datepost['second'],$datepost['month'],$datepost['day'],$datepost['year']);
$tscomment = mktime($datecomment['hour'],$datecomment['minute'],$datecomment['second'],$datecomment['month'],$datecomment['day'],$datecomment['year']);
$distance = $tscomment - $tspost;
switch ($distance) {
    case ($distance < 60):
        echo $distance . "second ago";
        break;
    case ($distance >= 60 && $distance< 3600):
        $minute = round($distance/60);
        if($minute == 1) echo $minute ." minute ago";
        else echo $minute ." minutes ago";
        break; 
    case ($distance >= 3600 && $distance < 84600):
        $hour = round($distance/3600);
        if($hour == 1) echo $hour ." hour ago";
        else echo $hour ." hours ago";
        break;
    default:
        $result = date('d/m/Y \a\t H:i:s',$tscomment);
}
echo $result;
?>
<?php
	$timePost = '29/06/2013 09:20:23';
	$timeReply = '29/06/2013 09:20:26';
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$datePost = date_parse_from_format("d/m/Y H:i:s", $timePost);
	$dateReply = date_parse_from_format("d/m/Y H:i:s", $timeReply);
	$tsPost = mktime($datePost['hour'],$datePost['minute'],$datePost['second'],$datePost['month'],$datePost['day'],$datePost['year']);
	$tsReply = mktime($dateReply['hour'],$dateReply['minute'],$dateReply['second'],$dateReply['month'],$dateReply['day'],$dateReply['year']);
	$distance = $tsReply - $tsPost;
	switch ($distance) {
		case ($distance < 60):
			if($distance == 1) $result = $distance ." second ago ";
			else $result = $distance ." seconds ago ";
			break;
		case ($distance >= 60 && $distance < 3600):
			$minute = round($distance/60);
			if($minute == 1) $result = $minute ." minute ago ";
			else $result = $minute ."minutes ago";
			break;
		case ($distance >= 3600 && $distance < 86400):
			$hour = round($distance/3600);
			if($hour == 1) $result = $hour ." hour ago ";
			else $result = $hour ." hours ago ";
			break;
		case (round($distance/86400) == 1):
			$result = " Yesterday at ". date("H:i:s",$tsReply);
			break;
		default:
			$result = date('d/m/Y \a\t H:i:s',$tsReply);
	}
	echo $result;
?>
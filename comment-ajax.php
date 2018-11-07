<?php
include("wunderlistconnect.php");
$task_id = $_POST['task_id'];
$content = $_POST['content'];
//$task_id = 128;
//$content = "Anh";
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = date_create();
$time =  date_format($time, 'Y-m-d H:i:s');
$sql = "INSERT INTO comments(content, time, task_id) VALUES(:content, :time, :task_id)";
$query = $conn->prepare($sql);
$query->execute(array(":content"=>$content,":time"=>$time,":task_id"=>$task_id));
?>
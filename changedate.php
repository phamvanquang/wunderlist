<?php
include("wunderlistconnect.php");
$task_id = $_POST['task_id'];
$date = $_POST['date'];
$sql = "UPDATE task SET date=? WHERE id=?";
$query = $conn->prepare($sql);
$query->execute(array($date,$task_id));
?>
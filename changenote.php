<?php
include("wunderlistconnect.php");
$task_id = $_POST['task_id'];
$note = $_POST['note'];
$sql = "UPDATE task SET note=? WHERE id=?";
$query = $conn->prepare($sql);
$query->execute(array($note,$task_id));
?>
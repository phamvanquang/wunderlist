<?php
include("wunderlistconnect.php");
$task_id = $_POST['task_id'];
$sql = "DELETE FROM task WHERE id=?";
$query = $conn->prepare($sql);
$query->execute(array($task_id));
?>
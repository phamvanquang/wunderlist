<?php
include("wunderlistconnect.php");
$task_id = $_POST['task_id'];
$task_name = $_POST['task_name'];
$sql = "UPDATE task SET name=? WHERE id=?";
$query = $conn->prepare($sql);
$query->execute(array($task_name, $task_id));
$sql = "SELECT name FROM task WHERE id=?";
$query = $conn->prepare($sql);
$query->execute(array($task_id));
echo $name = $query->fetch()['name'];
?>
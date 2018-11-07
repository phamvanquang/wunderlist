<?php
include("wunderlistconnect.php");
$task_id = $_POST['task_id'];
$sql = "SELECT name FROM task WHERE id=?";
$query = $conn->prepare($sql);
$query->execute(array($task_id));
$row = $query->fetch();
echo $name = $row['name'];
?>
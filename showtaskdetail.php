<?php
include("wunderlistconnect.php");
$task_id = $_POST['task_id'];
$sql = "SELECT * FROM task WHERE id=?";
$query = $conn->prepare($sql);
$query->execute(array($task_id));
$row = $query->fetch();
echo $row = json_encode($row);
?>
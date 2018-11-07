<?php
include("wunderlistconnect.php");
$task_id = $_POST['task_id'];
$checks = 2;
$sql = "UPDATE task SET checks=? WHERE id=?";
$query = $conn->prepare($sql);
$query->execute(array($checks,$task_id));
?>
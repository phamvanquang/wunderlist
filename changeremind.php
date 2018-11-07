<?php
include("wunderlistconnect.php");
$task_id = $_POST['task_id'];
$remind = $_POST['remind'];
$sql = "UPDATE task SET remind=? WHERE id=?";
$query = $conn->prepare($sql);
$query->execute(array($remind,$task_id));
?>
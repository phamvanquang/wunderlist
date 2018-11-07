<?php
include("wunderlistconnect.php");
$task_id = $_POST['task_id'];
//$task_id = 128;
$sql = "SELECT * FROM comments WHERE task_id=?";
$query = $conn->prepare($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute(array($task_id));
$row = $query->fetchAll();
echo json_encode($row);
?>
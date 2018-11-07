<?php
include("wunderlistconnect.php");
$search = $_POST['search'];
if($search != ""){
$sql = "SELECT task.name,task.id,lists.name as namelists FROM task INNER JOIN lists ON task.lis_id = lists.id WHERE task.name LIKE CONCAT('%', CONVERT('$search', BINARY), '%') AND checks = 1";
$query = $conn->prepare($sql);
$query->execute();
$row = $query->fetchAll();
echo json_encode($row);
}
?>
<?php
include("wunderlistconnect.php");
$lis_id = $_POST['lis_id'];
$name = $_POST['name'];
$checks = $_POST['checks'];
$sql = "INSERT INTO task(name, checks, lis_id) VALUES(:name, :checks, :lis_id)";
$query = $conn->prepare($sql);
$query->execute(array(":name"=>$name,":checks"=>$checks,":lis_id"=>$lis_id));
//$result = $query->fetch();
//$result = json_encode($result);
//echo ($result);
echo $conn->lastInsertId();
?>
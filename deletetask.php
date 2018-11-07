<?php
include("wunderlistconnect.php");
if(isset($_GET['task'])){
    $task_id = $_GET['task'];
    $sql = "SELECT lis_id FROM task WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute(array($task_id));
    $lis_id = $query->fetch()['lis_id'];
    $sql = "DELETE FROM task WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute(array($task_id));
    header("location:wunderlist.php?lists=$lis_id");
}
?>
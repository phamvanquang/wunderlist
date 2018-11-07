<?php
include('wunderlistconnect.php');
if(isset($_GET['task_id'])){
    $task_id = $_GET['task_id'];
    $checks = 1;
    $sql = "SELECT lis_id FROM task WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute(array($task_id));
    $lis_id = $query->fetch()['lis_id'];
    $sql = "UPDATE task SET checks=? WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute(array($checks,$task_id));
    header("location:wunderlist.php?lists=$lis_id");
}
?>
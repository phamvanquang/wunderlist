<?php
session_start();
include("wunderlistconnect.php");
$current_pass = $_POST['current_pass'];
$new_pass = $_POST['new_pass'];
$repeat_pass = $_POST['repeat_pass'];
$sql = "SELECT pass FROM account WHERE pass=?";
$query = $conn->prepare($sql);
$query->execute(array($current_pass));
if($query->rowCount() > 0){
    if($new_pass == $repeat_pass){
        $sql = "UPDATE account SET pass=? WHERE id=?";
        $query = $conn->prepare($sql);
        $query->execute(array($new_pass,$_SESSION['id']));
        echo $success = "Change success";
    }else{
        echo $error = "Mật khẩu không trùng nhau";
    }
}else{
   echo $error = "Mật khẩu không đúng";
}
?>
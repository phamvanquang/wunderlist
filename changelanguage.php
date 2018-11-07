<?php
session_start();
include("wunderlistconnect.php");
$language = $_POST['language'];
if($language == "vi"){
    include("vi.php");
    $_SESSION['lang'] = $language;
    $sql = "UPDATE account SET language=? WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute(array($language,$_SESSION['id']));
    echo json_encode($lang);
}
if($language == "en"){
    include("en.php");
    $sql = "UPDATE account SET language=? WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute(array($language,$_SESSION['id']));
    $_SESSION['lang'] = $language;
    echo json_encode($lang);
}
?>
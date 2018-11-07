<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=test_pdo',root,'quang1998');
}
catch (PDOException $e) {
    print "Error!:" . $e->getMessage() ."<br/>";
    die();
}
?>
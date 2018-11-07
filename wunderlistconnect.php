<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=wunderlist;charset=utf8',root,'quang1998',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch(PDOException $e){
    print "Error!:" . $e->getMessage() ."<br/>";
    die();
}
?>
<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=ajaxtest;charset=utf8',root,'quang1998',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch(PDOException $e){
    print "Error!:" . $e->getMessage() ."<br/>";
    die();
}
    $sql = "SELECT * FROM member";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = array();
    while($row = $query->fetch()){
        $result[] = $row['name']; 
    };
    die (json_encode($result));
    print_r($result);
?>
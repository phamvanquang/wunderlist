<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=wunderlist;charset=utf8',root,'quang1998',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch(PDOException $e){
    print "Error!:" . $e->getMessage() ."<br/>";
    die();
}   
$email = $_POST['email'];
$pass = $_POST['pass'];
$sql = "SELECT email, pass FROM account WHERE email=:email,pass=:pass";
$query = $conn->prepare($sql);
$query->execute(array(":email"=>$email,":pass"=>$pass));
if($query->rowCount() > 0){
    echo $result = "Đăng nhập thành công";
}
else{
    echo $result = "Đăng nhập thất bại";
}
?>
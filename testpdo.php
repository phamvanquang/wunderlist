<?php
include('pdo.php');
/*
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $row){
   echo $row['name'];
}
*/
/*$stmt = $conn->prepare('INSERT INTO users (name, email, password, age) VALUES (:name,:email,:password,:age)');
$name = 'tuan';
$email = 'tuan@gmail.com';
$password = '12345';
$age = 21;
$data = array(':name'=>$name,':email'=>$email,':password'=>$password,':age'=>$age);
$stmt->execute($data);
*/
/*
$stmt = $conn->prepare('INSERT INTO users (name, email, password, age) VALUES (:name, :email, :password, :age)');
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':age', $age);
$name = "quang1";
$email = "quang1@gmail.com";
$password = "12345";
$age = 21;
$stmt->execute();
$name = "quang2";
$email = "quang2@gmail.com";
$password = "12345";
$age = 21;
$stmt->execute();
*/
$stmt = $conn->prepare('SELECT * FROM users');
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
while($row = $stmt->fetch()){
    echo "<pre>";
    print_r($row);
    echo "<pre>";
}
$stmt = $conn->prepare('DELETE FROM users where id = :id');
$stmt->execute(array(':id'=>5));
echo $stmt->rowCount();
?>

<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=test_pdo',root,'quang1998');
}
catch(PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br>";
    die();
}
$stmt = $conn->query('SELECT name FROM test');
while ($row = $stmt->fetch()) {
    echo $row['name'] . "\n";
}
$stmt = $conn->query('SELECT name FROM test');
foreach ($stmt as $row) {
    echo $row['name'] . "\n";
}
?>
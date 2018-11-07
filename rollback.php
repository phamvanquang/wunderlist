<?php
include('pdo.php');
/* Begin a transaction, turning off autocommit */
$conn->beginTransaction();

/* Change the database schema and data */
$sth = $conn->exec("DROP TABLE users");
$sth = $conn->exec("UPDATE test
    SET name = 'quang'");

/* Recognize mistake and roll back changes */
$conn->rollBack();

/* Database connection is now back in autocommit mode */
?>
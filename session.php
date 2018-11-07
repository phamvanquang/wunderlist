<?php
session_start();
$_SESSION['test'] = "trng";
echo $_SESSION['test'];
unset($_SESSION['test']);
echo $_SESSION['test'];
?>
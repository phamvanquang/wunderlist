<?php
 setcookie('user', 'quang', time() + 60);
 if (isset($_COOKIE['user']))
 {
 echo $_COOKIE['user'];
 }
 else{
     echo "hết phiên";
 }
?>
<?php
   try {
      $error = 'Luôn luôn ném lỗi này';
      throw new Exception($error);
      
      // Phần code mà theo sau một ngoại lệ sẽ không được thực thi.
      echo 'Phần code này không bao giờ được thực thi';
   }
   catch (Exception $e) {
      echo 'Bắt ngoại lệ: ',  $e->getMessage(), "\n";
   }
   
   // Tiếp tục tiến trình thực thi
   echo 'Hello World';
?>
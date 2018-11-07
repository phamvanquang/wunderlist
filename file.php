<?php
$path = "file.txt";
$fp = @fopen($path,"r");
if(!$fp){
    echo "mở file không thành công";
}
else{
   /* echo "mở file thành công";
    while(!feof($fp)){
        echo fgets($fp);
    }*/
    $data = fread($fp, filesize("file.txt"));
    echo $data;
}
?>
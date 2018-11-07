<?php
$fp = @fopen("file.txt","w+");
if(!$fp){
    echo "mở file không thành công";
}
else{
    $data = "tr beo";
    fwrite($fp,$data);
}
$data = fread($fp, filesize("file.txt"));
echo $data;
?>
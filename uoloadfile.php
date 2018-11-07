<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="avatar"/>
        <input type="submit" name="uploadclick" value="upload">
    </form>
</body>
<?php
print_r($_FILES);
if(isset($_POST['uploadclick'])){
    if(isset($_FILES['avatar'])){
        if($_FILES['avatar']['error'] > 0){
            echo "File upload bị lỗi";
        }
        else{
            move_uploaded_file($_FILES['avatar']['tmp_name'],'./storage/'.$_FILES['avatar']['name']);
            echo "File uploaded";
            echo $_FILES['avatar']['tmp_name'];
        }
    }
}
?>
</html>
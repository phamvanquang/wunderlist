<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
    <script>
        function load_ajax(){
           $.ajax({
               url:"result.php",
               type:"post",
               dataType:"text",
               data:{
                   number : $("#number").val()
               },
               success:function(result){
                   $("#result").html(result);
               }
           });
        }
    </script>
</head>
<body>
<div id="result">
    Nội dung
</div>
<input type="text" value="" id="number"/>
<input type="button" name="clickme" id="clickme" onclick="load_ajax()" value="Click Me">
</body>
</html>
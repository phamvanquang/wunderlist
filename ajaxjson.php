<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
    <script language="javascript">
      $(document).ready(function(){
        $('#json-click').click(function(){
           $.ajax({
               url:"json.php",
               type:"post",
               dataType:"json",
               success:function(result){
                a="";
                $.each (result, function (key, value){
                    alert( key + ": " + value );
                    a += value;
                    //console.log(result);
                });
                $('#result2').html(a);  
               }
           })
       })
      })
    </script>
</head>
<body>
        <div id="result1">TEXT</div>
        <div id="result2">JSON</div>
        <div id="result3">XML</div>
        <br/>
        <input type="button" name="clickme" id="text-click" value="Get List By Text"/>
        <input type="button" name="clickme" id="json-click" value="Get List By Json"/>
        <input type="button" name="clickme" id="xml-click" value="Get List By XML"/>
    
</body>
</html>
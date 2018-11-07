<?php
$subject = '<div>Div1</div><div>Div2</div><div>Div3</div>';
preg_match_all('/<div>(.*?)<\/div>/', $subject, $matches);
echo '<pre>';
var_dump($matches);
echo '</pre>';
?>
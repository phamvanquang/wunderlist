<?php
$a = [];
for($i = 0;$i<50;$i++){
$a[] = rand(1,100);
}
$chan = [];
$le = [];
function chan_le($a,$i,&$chan,&$le){
	if($i==count($a)) return null;
	if($a[$i]%2 ==0) $chan[] = $a[$i];
	else $le[] = $a[$i];
	chan_le($a,++$i,$chan,$le);	
}
$i=0;
chan_le($a,$i,$chan,$le);

print_r($chan);
print_r($le);
?>
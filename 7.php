<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="js/jquery-ui.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#date" ).datepicker({
    	dateFormat: "dd-mm-yy",
    	changeYear: true,
    	changeMonth: true,
    	yearRange: "1998:2018"
    });
  } );
  </script>
</head>
<body>
	<?php
		$arrType = array('-- Select Type --','Day','Month','Year');
		function createSelect($arrData,$name,$keySelected){
			$strDays = "";
					if(!empty($arrData)){
						$strDays .= '<select name="'.$name.'">';
						/*for($i =0;$i < count($arrData);$i++){
							if($keySelected==$i){
								$strDays .= '<option value="'.$i.'" selected="selected">'.$arrData[$i].'</option>';
							}else{
								$strDays .= '<option value="'.$i.'">'.$arrData[$i].'</option>';
							}
						}*/
						foreach ($arrData as $key => $value) {
							if($keySelected==$key){
								$strDays .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
							}else{
								$strDays .= '<option value="'.$key.'">'.$value.'</option>';
							}
						}
						$strDays .= '</select>';
					}
					return $strDays;
		}
		function addTime($date,$type,$value){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$arrDate = date_parse_from_format("d/m/Y", $date);
			switch ($type) {
				case 'Day':
					$ts = mktime(0,0,0,$arrDate['month'],$arrDate['day'] + $value,$arrDate['year']);
					break;
				case 'Month':
					$ts = mktime(0,0,0,$arrDate['month'] + $value,$arrDate['day'],$arrDate['year']);
					break;
				case 'Year':
					$ts = mktime(0,0,0,$arrDate['month'],$arrDate['day'],$arrDate['year'] + $value);
					break;
			}
			echo $result = date("d/m/Y",$ts);
			return $result;
		}
		if(isset($_POST['date'])){
			$date = $_POST['date'];
		}else{
			$date ='';
		}
		if(isset($_POST['select-type'])){
			$type = $_POST['select-type'];
		}else{
			$type ='';
		}
		if(isset($_POST['value'])){
			$value = $_POST['value'];
		}else{
			$value ='';
		}
		$strTypes = createSelect($arrType,'select-type',$type);
		if(!empty($date)){
			addTime($date,$arrType[$type],$value);
		}else{
			echo "";
		}
	?>
	 <form action="#" method="post" name="mainForm" id="mainForm">
	 	<p>Date: <input readonly="readonly" type="text" id="date" name="date" value="<?php echo $date ?>"></p>
	 	<div class="row">
	 		<span>Type</span>
	 		<?php
	 			echo $strTypes;
	 		?>
	 	</div>
	 	<div class="row">
	 		<span>Value</span>
	 		<input type="text" name="value" value="<?php echo $value ?>">
	 	</div>
	 	<div class="row">
	 		<input type="submit" name="sbm" value="Submit">
	 	</div>
	 </form>
</body>
</html>
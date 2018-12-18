<?php
function ourToS($value){
	return "'" . $value . "'";
}

function getTime(){
	date_default_timezone_set("Asia/Taipei");
	return date("Y-m-d H:i:s") . "<br>";
}
?>

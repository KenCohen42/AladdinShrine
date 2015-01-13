<?php

$EonString = "";

foreach ($_GET as $g=>$v){
	if(strpos($g, "eon") === 0){
		$TSF = substr(trim($g), strlen("eon"), strlen($g) - strlen("eon")); //Timestamp prefix
		if(is_numeric($TSF) && strlen($TSF) == 10){
			$EonString .= "$TSF,";
			}
		}
	}
$EonString = substr($EonString, 0, strlen($EonString)-1);//remove the trailing comma
header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php?EonList=$EonString");

?>
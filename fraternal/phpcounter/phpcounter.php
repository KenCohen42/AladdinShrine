<?php
define("InPHPC", TRUE);

/*

PHPCounter 7.3 Beta

Feb05 release.


*/

//Include the settings
global $Settings;
global $IgnoreIP;
global $IgnoreHosts;
global $IgnoreUA;
global $TimeStampPrefix;

$Settings = array();
$Settings = parse_ini_file(dirname(__FILE__) . "/settings.ini"); // load the settings
require_once dirname(__FILE__) . "/functions.php"; //Globals functions.
require_once dirname(__FILE__) . "/prelims.php"; //prelims need functions

/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

This is the main bit of the counter!

=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-*/
	
	
$Count = 0;

$StartingCWD = getcwd();


global $CountFileName;

/*Prepare the variables*/
	$remote = "";
	if(!$remote = GetVar("HTTP_X_FORWARDED_FOR",false)){
	    $remote = gethostbyaddr(GetVar("REMOTE_ADDR", "127.0.0.1"));
		}
	
	if(!$remote_host = GetVar("REMOTE_HOST", false)) {
	   $remote_host = GetVar("REMOTE_ADDR",  "-");
	}
	
	$remote_user = GetVar("REMOTE_USER",  "-");
	
	$remote_ident = GetVar("REMOTE_IDENT",  "-");
	
	$server_port = GetVar("SERVER_PORT", 80);
	
	if($server_port!=80) {
	    $server_port =  ":" . $server_port;
		}
	else{
	    $server_port =  "";
		}
	
	$server_name = GetVar("SERVER_NAME",  "-");
	
	$request_method = GetVar("REQUEST_METHOD",  "GET");
	
	$request_uri = GetVar("REQUEST_URI",  "");
	
	$user_agent = GetVar("HTTP_USER_AGENT",  "");
	
	$referer = GetVar("HTTP_REFERER", "#");
	
	$script_name = GetVar("PHP_SELF", "");
	
	$QS = GetVar("QUERY_STRING", "");
	
	$RemoteIdent = GetVar("REMOTE_IDENT", "-");
	$RemoteUser = GetVar("REMOTE_USER", "-");
	
	$Lang = GetVar("HTTP_ACCEPT_LANGUAGE", "N/D");
	
	$CookieString = "";
	if(count($_COOKIE) > 0){
		while (list($key, $val) = each($_COOKIE)) {
			$CookieString .= $key ."=". $val .";";
			}
		}
	else{
		$CookieString = "-";
		}
		
	$SNMD5 = md5($script_name);
		
	$CountFileName = GetCountsDir() . $GLOBALS["TimeStampPrefix"] . "--" . $SNMD5 . ".count";

	$GLFN = GetGlobalsDir() . "GlobalLog-" . $GLOBALS["TimeStampPrefix"] . ".txt";

	if($Settings["DEBUG"] == TRUE){
		echo "<div>CFN: $CountFileName and GLFN: $GLFN</div>";
		}
	
	/*End preparing variables */
	
	/* 
	Check to see if the log files are there or not. If not, create them...
	*/
	
	//The global log file...
	if(!file_exists($GLFN)){
		touch($GLFN);
		chmod($GLFN, 0666);
		}
		
	//The count file
	if(!file_exists($CountFileName)){
		$GLOBALS["Count"] = $Settings["StartCounterAt"];
		
		if(is_numeric(@$_GET["StartCounter"])){
			$GLOBALS["Count"] += $_GET["StartCounter"];
			}
			
		if($Settings["KeepCountWhenChangingEpochs"]){
			if($Settings["DEBUG"] == TRUE){
				echo "<p>In KeepCountWhenChangingEpochs</p>";
				}
				
			$PreviousEpoch = GetPreviousEpoch($script_name);
			
			if($Settings["DEBUG"] == TRUE){
				echo "<p>Found previous epoch with time stamp: $PreviousEpoch</p>";
				}
				
			//Now we have the previous Epoch's count file: scavange it for the info we need
			if($PreviousEpoch > 0){ //fixes a bug where the previous Epoch is not found...
				$FA = file(GetCountsDir() . $PreviousEpoch . "--" . $SNMD5. ".count");
				$GLOBALS["Count"] += $FA[1]; //tada!
				}
			}// EOB if(KeepCountWhen...
			
		touch($CountFileName);
		if(!chmod($CountFileName, 0666));
		$CountString = "$script_name\n". $GLOBALS["Count"] . "\n0";
		$CountFP = @fopen($CountFileName, "wb");
		if($CountFP){
			if(flock($CountFP, LOCK_EX)){
				fwrite($CountFP, $CountString);
				flock($CountFP, LOCK_UN);
				}
			fclose($CountFP);
			}
		}
		
		
		//-======================
		
	
if(!IgnoreCount()){
	
	if($Settings["DEBUG"] == TRUE){
		echo "<p>Not ignoring this hit...</p>";
		}
	
	$HitTime = time() + (60*60*$Settings["TimeZoneDifferenceFromServer"]);
	$s = "$script_name\t$request_uri\t$referer\t$user_agent\t$remote\t$HitTime\t$RemoteIdent\t$RemoteUser\t$request_method\t$CookieString\t$Lang\n";

	$CountFP = fopen($GLFN, "ab");
	if(flock($CountFP, LOCK_EX)){
		fwrite($CountFP, $s);
		flock($CountFP, LOCK_UN);
		}
	fclose($CountFP);

	//chmod($CountFileName, 0666);
	$FA = file($CountFileName);
	$GLOBALS["Count"] = $FA[1] + 1 + $GLOBALS["Count"];
	$CountString = "$script_name\n". $GLOBALS["Count"] . "\n$HitTime";
	$CountFP = @fopen($CountFileName, "wb");
	if($CountFP){
		if(flock($CountFP, LOCK_EX)){
			fwrite($CountFP, $CountString);
			flock($CountFP, LOCK_UN);
			}
		fclose($CountFP);
		}
	}
else{
	if($Settings["DEBUG"] == TRUE){
		echo "<p>Ignoring this hit...</p>";
		echo "<p>Getting the count file: $CountFileName</p>";
		}
	//just get the current count...		
	$FA = file($CountFileName);
	$GLOBALS["Count"] = trim($FA[1]);
	if(!$GLOBALS["Count"]){ //one time when the Count is empty is if this is the very first hit in the epoch and is being ignored.
		$GLOBALS["Count"] = 1; //default output
		}
	}
	
//OUTPUT STARTS HERE!
if($Settings["OutputCountText"]){
	require $Settings["OutputCountTextPlugin"];	
	}
	
if($Settings["OutputCountImage"]){
	require $Settings["OutputCountImagePlugin"];	
	}
$GLOBALS["TotalVisitors"] = count(file($GLFN));
chdir($StartingCWD);	


?>
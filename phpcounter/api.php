<?php
if(!defined("InPHPC")){
	echo "Quit fooling around!";
	exit;
	}
	
	global $init_DataArray;
	global $init_DataString;
	
	$init_DataArray = array();
	$init_DataString = "";

	
/*
This function gives plugins the time prefix they
need in order to know which epoch they are analysing.
*/

	function GetTimePrefix(){
		if(IsTimePrefixValid($_GET["EpochPrefix"])){
			return $_GET["EpochPrefix"];
			}	
		elseif(IsTimePrefixValid($_POST["EpochPrefix"]) && $_POST["indexDownloadMode"]){
			return $_POST["EpochPrefix"];
			}
		else{
			return GetDawn();
			}
		}

	function GetRandomColour(){
		GLOBAL $image;
		return imagecolorallocate($image, rand(0,175), rand(0,175), rand(0,175));
		}
		
	function EchoDataStart(){
		if($EonList = GetEonList()){
			asort($EonList);		
			echo "<p class=\"DropEM\">Analysing log files for the Eon containing the Epochs that start on the following dates:</p><ul>";
			foreach($EonList as $l){
				echo "<li>" . date("d M y", $l) . "</li>";
				}
			echo "</ul>";
			return true;
			}
		if($TimePrefix = GetTimePrefix()){
			$GLFN = GetGlobalsDir() . "GlobalLog-" . $TimePrefix . ".txt";
			if(file_exists($GLFN)){
				global $init_DataArray;
				$DataCount =  count($init_DataArray);
				$TimeSpan = (mktime() - $TimePrefix)/(60 * 60 * 24);
				echo "<div class=\"DropEM\">Analysing log file for the Epoch that started on " . date("d M y", $TimePrefix) . ".</div>";
				echo "<div class=\"DropEM\">Time since start of Epoch: " . number_format((mktime() - $TimePrefix)/(60*60*24), 2, ".", "") . " days; " . number_format($DataCount/$TimeSpan, 2, ".", "") . " hits per day.</div>";
				return true;
				}
			}
		return FALSE;
		}
		
	function GetNumberOfHits(){
		global $init_DataArray;
		return count($init_DataArray);
	}
	
	/*
This function returns the current Epoch's or Eon's data
as an array. The array contains the lines of the log files.

Meant to be used internally and not called by a plugin.

Returns an array.
*/

	function _GetDataAsArray(){
		if($EonList = GetEonList()){
			asort($EonList);
			$a = array();
			foreach($EonList as $e){
				$a = array_merge($a, file(GetGlobalsDir() . "GlobalLog-" . $e . ".txt"));
				}
			return $a;
			}
		elseif($TimePrefix = GetTimePrefix()){
			$GLFN = GetGlobalsDir() . "GlobalLog-" . $TimePrefix . ".txt";
			if(file_exists($GLFN)){
				return file($GLFN);
				}
			else{
				return FALSE;
				}
			}
		else{
			return FALSE;
			}
		}

/*
This function returns the current Epoch's or Eon's data
as a text string. The string is actually composed of all the
lines of the log files.

Meant to be called internally and not by a plugin.

Returns a string.
*/

	function _GetDataAsString(){
		if($EonList = GetEonList()){
			asort($EonList);
			$a = "";
			foreach($EonList as $e){
				$GLFN = GetGlobalsDir() . "GlobalLog-" . $e . ".txt";
				if(file_exists($GLFN)){
					$a .= fread(fopen($GLFN, "rb"), filesize($GLFN));
					}
				}
			return $a;
			}
		elseif($TimePrefix = GetTimePrefix()){
			$GLFN = GetGlobalsDir() . "GlobalLog-" . $TimePrefix . ".txt";
			
			if(file_exists($GLFN)){
				if($fs = filesize($GLFN)){
					return fread(fopen($GLFN, "rb"), $fs);
					}
				}
			else{
				return FALSE;
				}
				
			}
		else{
			return FALSE;
			}
		
		}

	
/*
This function returns an array containing the time stamps of all
Epochs in the currently defined Eon.

*/

	function GetEonList(){
		$string = $_GET["EonList"];
		//clean up for security reasons :)
		$List = explode(",", $string);
		$EonListArray = array();
		foreach($List as $l){
			if(is_numeric($l) && strlen($l) == 10){
				//passed the first check - it's a ten digit number
				if(file_exists(GetGlobalsDir() . "GlobalLog-" . $l . ".txt")){
					//the Epoch actually exists
					$EonListArray[] = $l;
					}
				}
			}
		if(count($EonListArray) > 0){
			return $EonListArray;
			}
		else{
			return FALSE;
			}
		}
		
		
function GetDataAsArray(){
	global $init_DataArray;
	return $init_DataArray;
	}
	
function GetDataAsString(){
	global $init_DataString; 
	return $init_DataString;
	}
	
	
/*
This function is fed an hit's log file line ($EntryText) 
and it returns the piece of info that the plugin require
($Info).

The $Info is a string from one of the following:

ScriptName
RequestURI
Referer
UA
Remote
HitTime
RemoteIdent
RemoteUser
RequestMethod
CookieString
Lang
*/
function GetHitInfo($EntryText, $Info){
	list($ScriptName, $RequestURI, $Referer, $UA, $Remote, $HitTime, $RemoteIdent, $RemoteUser, $RequestMethod, $CookieString, $Lang) = explode("\t", trim($EntryText));
	switch($Info){
		case "ScriptName":
			return $ScriptName;
			break;
		case "RequestURI":
			return $RequestURI;
			break;
		case "Referer":
			return $Referer;
			break;
		case "UA":
			return $UA;
			break;
		case "Remote":
			return $Remote;
			break;
		case "HitTime":
			return $HitTime;
			break;
		case "RemoteIdent":
			return $RemoteIdent;
			break;
		case "RemoteUser":
			return $RemoteUser;
			break;
		case "RequestMethod":
			return $RequestMethod;
			break;
		case "CookieString":
			return $CookieString;
			break;
		case "Lang":
			return $Lang;
			break;
		default:
			//echo "<div>Defaulted...</div>";
			return false;
		}
	
	}
	
	
	//seed the random number generator
	srand(mktime());
	//load the data
	$init_DataArray = _GetDataAsArray();	
	$init_DataString = _GetDataAsString();
	
?>

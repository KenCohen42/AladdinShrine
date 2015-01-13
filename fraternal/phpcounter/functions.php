<?php

if(!defined("InPHPC")){
	echo "Quit fooling around!";
	exit;
	}

/*
This function returns the time in microseconds.

*/
	function GetMicroTime(){
	  list($usec, $sec) = explode(" ",microtime());
	   return ((float)$usec + (float)$sec);
	}
		/*

This function returns the time stamp of the start of the 
current Epoch - i.e., the dawn of the current epoch.	

*/
	function GetDawn(){
		$DataDir = dirname(__FILE__) . "/";
		$fd = fopen($DataDir . "dawn.txt", "r");
		$D = trim(fread($fd, filesize($DataDir . "dawn.txt")));
		fclose($fd);
		return $D;
		}
		
		/*

This function validates the EpochPrefix variable to make
sure it matches the set format. Anything else is rejected.

This is for security.

A valid PHPCounter time stamp is a valid Unix time stamp,
so it is 10 digits long.

Returns TRUE on validation; FALSE otherwise.

*/

	function IsTimePrefixValid($stamp){
		if(strlen(trim($stamp)) == 10 && is_numeric(trim($stamp))){
			return TRUE;
			}
		else{
			return FALSE;
			}
		}
		
	function IgnoreCount(){
		global $Settings;
		global $IgnoreIP;
		global $IgnoreHosts;
		global $IgnoreUA;
		global $CurrentlyOnline;
		
		$ret = FALSE;
		$CONTINUE = TRUE;
		
		//Confusion: Sometimes it is called REMOTE_HOST and sometimes HTTP_HOST. So we check for both
		
		$CurrentUA = GetVar("HTTP_USER_AGENT", NULL);
		if(!$CurrentRemote = GetVar("REMOTE_HOST", false)) {
		   $CurrentRemote = GetVar("REMOTE_ADDR",  "UNKNOWN");
		}
		$CurrentHTTPHost = GetVar("HTTP_HOST", "UNKNOWN");
		$CurrentRemoteAddr = GetVar("REMOTE_ADDR", NULL);
		
		foreach($IgnoreUA as $agent){
			if(strpos($CurrentUA, $agent) !== FALSE){
				$ret = TRUE;
				$CONTINUE = FALSE;
				if($Settings["DEBUG"] == TRUE){
					echo "Ignoring the UA: " . $CurrentUA . "<br>";
					}
				}
			}
		foreach($IgnoreHosts as $host){
			if(strpos($CurrentRemote, $host) !== FALSE || strpos($CurrentHTTPHost, $host) !== FALSE){
				$ret = TRUE;
				$CONTINUE = FALSE;
				if($Settings["DEBUG"] == TRUE){
					echo "<p>Ignoring the Host: $CurrentRemote / $CurrentHTTPHost </p>";
					}
				}
			}
		foreach($IgnoreIP as $ip){
			if(strpos($CurrentRemoteAddr, $ip) !== FALSE){
				$ret = TRUE;
				$CONTINUE = FALSE;
				if($Settings["DEBUG"] == TRUE){
					echo "Ignoring the IP: " . $CurrentRemoteAddr . "<br>";
					}
				}
			}
		
		
		/*
		Now we have to check if this is a recent hit. Please read the RecentHitsWhitePaper.txt
		file for information about the algorithm.
		*/
		$now = mktime();
		
		$hash_name = $CurrentRemote . GetIndividualUniqueName();
		if($Settings["DEBUG"]){
			echo "Hash name: $hash_name<br>";
			}
		$rem = md5($hash_name);
		$dir = dirname(__FILE__) . "/locks/";
		chdir($dir);
	    // Open directory;
	    $handle = @opendir($dir) or die("Directory \"$dir\" not found.");
	    
	    while($entry = readdir($handle)){
	        if($entry != ".." && $entry != "." && !is_dir($entry)){
		        if($Settings["DEBUG"] == TRUE){
			    	echo "<div>Reading dir; entry is $entry</div>";
		    		}
			    
		        if($entry == "error_log"){
					unlink($dir . $entry);
					}
				else{
					 //Got a tracking file. File naming convention md5(remote).time_of_hit
		            $hit_data = explode(".", $entry);
		            $hit_rem = $hit_data[0];
		            $hit_time = $hit_data[1];
		            if($Settings["DEBUG"] == TRUE){
						echo "Found hit_rem: $hit_rem and hit_time: $hit_time<br>";
						}
		            if($hit_rem == $rem){
			             //We have a multiple hit
			            if($Settings["DEBUG"] == TRUE){
							echo "Found hit_rem: $hit_rem to equal $rem<br>";
							}
							
						if(($now - $hit_time < $Settings["TimeDifference"])){
							if($Settings["TrackRecentHits"] == TRUE){
								//To be ignored.
								if($Settings["DEBUG"] == TRUE){
									echo "Ignoring this current hit: $hit_rem; fn is: $fn<br>";
									}
								$ret = TRUE;
								}
							unlink($dir . $hit_rem . "." . $hit_time);
							}
						elseif((($now - $hit_time) > $Settings["TimeDifference"])){
							//multiple hit, from an "old" time, to be deleted.
							$fn = $dir . $hit_rem . "." . $hit_time;
							if($Settings["DEBUG"] == TRUE){
								echo "<b>Deleting</b> the current hit: $hit_rem<br> <b>fn</b> is: $fn<br>";
								}
							unlink($fn);
							}
		            	}
		            else{
			            if(($now - $hit_time >= $Settings["TimeDifference"])){
							//An "old" hit to another page - delete it.
							//We should not touch the value of $ret here because of the order of the entries.
							if($Settings["DEBUG"] == TRUE){
								echo "Deleting the following hit: $hit_rem; <b>fn is:</b> $fn<br>";
								}
							unlink($dir . $hit_rem . "." . $hit_time);
							}
						else{
							$CurrentlyOnline++;
							}
		            	}
		            }//eob else if(error_log)...
				}
			}//eob while ($entry)
		
		//now create this hit's entry.
		touch($dir . $rem . "." . $now);//quickest way to create a file
		$CurrentlyOnline++;
		if($Settings["DEBUG"] == TRUE){
			echo "<div> Currently online: " . $CurrentlyOnline . "</div>";
			}
		return $ret;
	}//eob IgnoreCount
	
	/*

This function will try to fetch any requested 
environment variable. It sends back a default
value if the requested variable is not found.

It does so by searching through the "standard"
PHP environment variables and arrays. 

*/
	function GetVar($name,$default) {
		global $HTTP_SERVER_VARS;
		$ret = "";
	    if(@$_SERVER["$name"]) {
	    	$ret = $_SERVER["$name"];
	    	}
	    elseif(@$HTTP_SERVER_VARS["$name"]){
		    $ret = $HTTP_SERVER_VARS["$name"];
	    	}
	    elseif(@$_GET["$name"]){
		    $ret = $_GET["$name"];
	    	}
	    elseif(@$_POST["$name"]){
		    $ret = $_POST["$name"];
	    	}
	    else {
	    	$ret = $default;
	    }
	    //Clean up for security!
	    return trim(htmlspecialchars(stripslashes($ret))); 
	}//eob GetVar
	
	/*
This function creates a unique name based on the current
page to be logged. This will be used to create the log's 
filename. 

Returns a unique string based on the page's name.
*/
	function GetIndividualUniqueName(){
		$countpage = GetVar("PHP_SELF", "");
		$countpage = preg_replace("/(\?.*)/", "", $countpage); //remove the QUERY_STRING
		$countpage = preg_replace("/[^\w]/", "_", $countpage); 
		//echo "<p>Unique name is: " . $countpage . "</p>";
		return $countpage;
		}
		
		/*

This function returns the path to the directory 
where the COUNT files are stored.


Returned path INCLUDES the trailing slash!

*/
	
	function GetCountsDir(){
		return dirname(__FILE__) . "/counts/"; 
		}

		
/*

This function returns the path to the directory 
where the Global logs are stored. 

Returned path INCLUDES the trailing slash!

*/

	function GetGlobalsDir(){
		return dirname(__FILE__) . "/globals/"; 
		}
		
/*
This function returns the Epoch preceeding the current one.
*/

function GetPreviousEpoch($sn){
	/*Cycle through all entries that contain the md5(script_name) and find the last Epoch			
	The last Epoch is the one with the highest timestamp as a number.
	
	$sn is the script name.
	*/
	$PreviousEpoch = 0;
		$handle = @opendir(GetCountsDir()) or die("Directory " . GetCountsDir() . " not found.");
		$h = md5($sn);
		//echo "<p>h is " . $h . "</p>";
		while($entry = readdir($handle)){
			if(strpos($entry, $h) != 0){
				$a = explode("--", $entry);
				if($a[0] > $PreviousEpoch){
					$PreviousEpoch = $a[0];
					}
				}			
			}
	return $PreviousEpoch;
	}
?>
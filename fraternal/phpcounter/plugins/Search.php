<h2>Search Data</h2>
	<p>The Search Plugin allows you to search and filter your log file data using text searches. You can 
	search using any number of criteria to find the records you want using the form below.</p>
	<p>The search is case insensitive, and will match an entry if ALL filters are matched (i.e., think of the filters as connected with an 'AND').</p>
	<p>Please see <a href="http://ekstreme.com/phpcounter/plugins-filter.php">the help file</a> for more information and some tips!</p>
	<form action="index.php" method="get">
	<div><input type="hidden" name="EpochPrefix" value="<?php echo $_GET['EpochPrefix']; ?>" />
	<div><input type="hidden" name="EonList" value="<?php echo $_GET['EonList']; ?>" /></div>
	<input type="hidden" name="Plugin" value="Search" /></div>
	<p>Actual URL Filter: <input type="text" name="FilterActualURL" value="<?php echo $_GET['FilterActualURL']; ?>" /></p>
	<p>Requested URL Filter: <input type="text" name="FilterRequestedURL" value="<?php echo $_GET['FilterRequestedURL']; ?>" /></p>
	<p>Referer Filter: <input type="text" name="FilterReferer" value="<?php echo $_GET['FilterReferer']; ?>" /></p>
	<p>User-agent Filter: <input type="text" name="FilterUA" value="<?php echo $_GET['FilterUA']; ?>" /></p>
	<p>Remote IP/Host Filter: <input type="text" name="FilterRemote" value="<?php echo $_GET['FilterRemote']; ?>" /></p>
	<p>Date Filter: <input type="text" name="FilterHitTime" value="<?php echo $_GET['FilterHitTime']; ?>" /> (The date format is dd-MMM-YYYY; for example: 02-Jun-2003)</p>
	<p>Request Method: <input type="text" name="RequestMethod" value="<?php echo $_GET['RequestMethod']; ?>" /></p>
	<p>Language: <input type="text" name="Language" value="<?php echo $_GET['Language']; ?>" /></p>
	<p>Cookies: <input type="text" name="CookieString" value="<?php echo $_GET['CookieString']; ?>" /></p>
	<p><input type="submit" value="Search" name="FilterSubmit" /> * <input type="reset" value="Reset" /></p>
	</form><?php
	//$TimePrefix = GetTimePrefix();
	
	//$GLFN = GetGlobalsDir() . "GlobalLog-" . $TimePrefix . ".txt";
if($_GET["FilterSubmit"] == "Search"){
		if(GetNumberOfHits()){
			EchoDataStart();
			$FA = GetDataAsArray();
			/*How the search works: 
			
			The system is based on a point scoring system. If a filter is matched, we add +1. If not, we add nothing.
			
			Next we calculate the score that a match should obtain: it is the number of filters applied. For example, 
			if we are searching using 3 filters, each scoring 1 point, a log entry should obtain a score of 3 to match. 
			
			The Match Score is calculated at the begining.
			
			*/
			$MatchScore = 0; //initialise
			
			if($_GET['FilterActualURL']){
				$MatchScore++;
				}
			if($_GET['FilterRequestedURL']){
				$MatchScore++;
				}
			if($_GET['FilterReferer']){
				$MatchScore++;
				}
			if($_GET['FilterUA']){
				$MatchScore++;
				}
			if($_GET['FilterRemote']){
				$MatchScore++;
				}
			if($_GET['FilterHitTime']){
				$MatchScore++;
				}
			if($_GET['RequestMethod']){
				$MatchScore++;
				}
			if($_GET['Language']){
				$MatchScore++;
				}
			if($_GET['CookieString']){
				$MatchScore++;
				}
			
			echo "<p>Number of applied filters: $MatchScore</p>";
				
			?>
			<table cellpadding="0" cellspacing="0" border="0" class="DataTable">
			<tr>
				<td class="CountsTableHeader" colspan="2">No.</td>
				<td class="CountsTableHeader" colspan="2">Requested URL</td>
				<td class="CountsTableHeader" colspan="2">Actual URL</td>
				<td class="CountsTableHeader">Hit Time</td>
			</tr>
				<td class="CountsTableHeader" colspan="3">Referer</td>
				<td class="CountsTableHeader" colspan="3">User Agent</td>
				<td class="CountsTableHeader">Remote IP/Host</td>
			</tr>
			</tr>
				<td class="CountsTableHeader" colspan="2">Request Method</td>
				<td class="CountsTableHeader">Language</td>
				<td class="CountsTableHeader" colspan="4">Cookie String</td>
			</tr>
			<?php
			
			//"$script_name\t$request_uri\t$referer\t$user_agent\t$remote\t$HitTime\t$RemoteIdent\t$RemoteUser\t$request_method\t$CookieString\t$Lang\n";
			
			$i=0;
			$MatchedLogs = "";
			$NumberMatched = 0;
			for($i=count($FA)-1; $i>=0; $i--){ //we start at count-1 because the very first one - the last line in the log - is empty
				
	
				$EntryScore = 0; //Reset
				
				list($ActualURL, $RequestedURL, $Referer, $UA, $Remote, $HitTime, $RemoteIdent, $RemoteUSer, $RequestMethod, $CookieString, $Language) = explode("\t", trim($FA[$i]));
				if($_GET['FilterActualURL']){
					if(stristr($ActualURL, $_GET['FilterActualURL'])){
						$EntryScore++;
						}
					}
				if($_GET['FilterRequestedURL']){
					if(stristr($Requested, $_GET['FilterRequestedURL'])){
						$EntryScore++;
						}
					}
				if($_GET['FilterReferer']){
					if(stristr($Referer, $_GET['FilterReferer'])){
						$EntryScore++;
						}
					}
				if($_GET['FilterUA']){
					if(stristr($UA, $_GET['FilterUA'])){
						$EntryScore++;
						}
					}
				if($_GET['FilterRemote']){
					if(stristr($Remote, $_GET['FilterRemote'])){
						$EntryScore++;
						}
					}
				if($_GET['FilterHitTime']){
					if(stristr(date("d-M-Y", $HitTime), $_GET['FilterHitTime'])){
						$EntryScore++;
						}
					}
				if($_GET['RequestMethod']){
					if(stristr($RequestMethod, $_GET['RequestMethod'])){
						$EntryScore++;
						}
					}
					
				if($_GET['Language']){
					if(stristr($Language, $_GET['Language'])){
						$EntryScore++;
						}
					}
				if($_GET['CookieString']){
					if(stristr($CookieString, $_GET['CookieString'])){
						$EntryScore++;
						}
					}
				//echo "<p>Entry scored: $EntryScore</p>";
				if($EntryScore++ == $MatchScore){
					//Yippie!
					$NumberMatched++;
				if($NumberMatched%2!=0){
					echo "<tr class=\"OddRow\"><td class=\"DataTD\" colspan=\"2\">$NumberMatched</td>";
					}
				else{
					echo "<tr><td class=\"DataTD\" colspan=\"2\">$NumberMatched</td>";
					}
					
					echo "<td class=\"DataTD\" colspan=\"2\"><a href=\"$RequestedURL\">". chunk_split($RequestedURL, 25, "<br />") . "</a></td>";
					echo "<td class=\"CountsTableRecordHeader\" colspan=\"2\">". chunk_split($ActualURL, 25, "<br />") . "</td>";
					echo "<td class=\"DataTD\">". date("d F Y <b\\r/> h:i:s A", $HitTime) . "</td>";
					echo "</tr>";
					if($NumberMatched%2!=0){
						echo "<tr class=\"OddRow\">";
						}
					else{
						echo "<tr>";
						}
					if(strlen(trim($Referer))>0){
						echo "<td class=\"DataTD\" colspan=\"3\"><a href=\"$Referer\">". chunk_split($Referer, 25, "<br />"). "</a></td>";
						}
					else{
						echo "<td class=\"DataTD\" colspan=\"2\">&nbsp;</td>";
						}
					
					echo "<td class=\"DataTD\" colspan=\"3\">$UA</td>";
	 				echo "<td class=\"DataTD\">" . str_replace(".", ". ", $Remote) . "</td>";
					
					echo "</tr>";
					if($NumberMatched%2!=0){
						echo "<tr class=\"OddRow\">";
						}
					else{
						echo "<tr>";
						}
						
					echo "<td class=\"DataTD\" colspan=\"2\">$RequestMethod</td>";
					echo "<td class=\"DataTD\">" . str_replace("," , ", ", $Language) . "</td>";
					echo "<td class=\"DataTD\" colspan=\"4\">" . str_replace(";", "; ", $CookieString) . "</td>";
					echo "</tr>";
					}
				
				
				}//eob for
			echo "</table>";
			}
		else{
			echo "<p>There are no hits in the current Epoch.</p>";
			}
		$EntryCount = count($FA);
		echo "<p>Number of entries matched: $NumberMatched of $EntryCount total entries.</p>";
	}
else{
	echo "<p>Please choose the filters above. If you filter with all of the filters empty, then you will list all of the hits.</p>";
	}
?>
<hr />
<div class="PluginInfo">PHPCounter 7 Core Plugin Filter Plugin 2 - 02Apr04 Release</div>
<div 
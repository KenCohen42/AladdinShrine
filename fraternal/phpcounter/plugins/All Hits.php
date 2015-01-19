<?php
	echo "<h2>All Hits</h2>";
		if(GetNumberOfHits()){
		EchoDataStart();
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
		<?php
		$FA = GetDataAsArray();
		
		$i = 0;
		for($i=count($FA)-1; $i>=0; $i--){
			//echo "<div>$i:$FA[$i]<br></div>";
			//Clean up the data and display it!
			//	$s = "$script_name\t$request_uri\t$referer\t$user_agent\t$remote\t". time() . "\n";

			list($ActualURL, $RequestedURL, $Referer, $UA, $Remote, $HitTime) = explode("\t", trim($FA[$i]));
			$RealCount = $i +1;
			if($i%2!=0){
				echo "<tr class=\"OddRow\"><td class=\"CountsTableRecordHeader\" colspan=\"2\">$RealCount</td>";
				}
			else{
				echo "<tr><td class=\"CountsTableRecordHeader\" colspan=\"2\">$RealCount</td>";
				}
				echo "<td class=\"DataTD\" colspan=\"2\"><a href=\"$RequestedURL\">". chunk_split($RequestedURL, 25, "<br />") . "</a></td>";
				echo "<td class=\"CountsTableRecordHeader\" colspan=\"2\">". chunk_split($ActualURL, 25, "<br />") . "</td>";
				echo "<td class=\"DataTD\">". date("d F Y <b\\r/> h:i:s A", $HitTime) . "</td>";
				echo "</tr>";
				if($i%2!=0){
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
			}
		echo "</table>";
		}
	else{
		echo "<p>There are no hits in the current Epoch.</p>";
		}
?>
<hr />
<div class="PluginInfo">PHPCounter 7 Core Plugin All Hits 2 - 16Feb05 Release</div>
<div class="PluginInfo">Copyright &copy; 2003 Pierre Far. Free for non-commercial use.</div>					
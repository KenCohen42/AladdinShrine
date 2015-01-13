<h2>Languages</h2>
<p>This plugin lists which languages were specified by the visitors' browsers.</p>

<p>If a browser specifies more than one language, all of them will be included, without regard to the q value of each language.</p>

<p>If the browser did not specify any language, it will be listed as 'Not Detected'.</p>
<?php	
	if(GetNumberOfHits()){
		EchoDataStart();
		$FA = GetDataAsArray();
		$i=0;
			
		$LangA = array();
		$TotalHits = 0;
		
		$LangHitCount = 0;
		
		
		//Read the Bots List File (bots.list.txt)
		$File_LList = file(dirname(__FILE__) . "/language.codes.txt");
		$LList = array();
		foreach($File_LList as $Line){
			list($LangSig, $FullName) = explode("\t", trim($Line));
			$LList[$LangSig] = $FullName;
			}
					
		$C = count($LList);
		echo "<p>Looking for $C languages.</p>";
		
		$Undetected = 0;
								
	for($i=count($FA)-1; $i>=0; $i--){ //we start at count-1 because the very first one - the last line in the log - is empty
		
			$Lang = GetHitInfo($FA[$i], "Lang");
			//echo "<div>Language is: $Lang, String is " . $FA[$i] . "</div>";
			if($Lang != "N/D"){
					while ((list($LangCode, $LangName) = each($LList))) {
						if(stristr($Lang, $LangCode) && !stristr($Lang, "-$LangCode")){
							$LangA[$LangCode]++;
							//echo "<div>$LangCode found...</div>";
							}
						}
					reset($LList);
					}
				else{
					$LangA["Not Detected"]++;
					}
				}
			
		$LangCount = count($LangA);
		echo "<p>Found $LangCount langauge(s).";
		?>
		<table cellpadding="0" cellspacing="0" border="0" class="DataTable">
		<tr>
			<td class="CountsTableHeader">Language</td>
			<td class="CountsTableHeader">Number of Hits</td>
		</tr>
		<?php
		
		//Display here
		
		$RowCount = 0;
		arsort($LangA);
		while (list($key, $val) = each($LangA)) {
			if($RowCount%2!=0){
				echo "<tr class=\"OddRow\">";
				}
			else{
				echo "<tr>";
				}
			echo "<td class=\"LeftDataTD\">$key (" . $LList[$key]  . ")</td><td class=\"DataTD\">$val</td></tr>";
			$RowCount++;
			}
		echo "</table>";
		//echo "<div>$StrOthers</div>";
		}
	else{
		echo "<p>There are no hits in the current Epoch.</p>";
		}
?>
<p>The list of language codes is taken from <a href="http://www.w3.org/WAI/ER/IG/ert/iso639.htm">the ISO639 standard</a>.</p>
<hr />
<div class="PluginInfo">PHPCounter 7 Core Plugin Languages List - 12Apr05 Release</div>
<div class="PluginInfo">Copyright &copy; 2005 Pierre Far. Free for non-commercial use.</div>
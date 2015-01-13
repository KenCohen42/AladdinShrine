
<h2>Epochs and Eons</h2>

<p>This plugin allows you to work with Epochs or Eons. To select an Epoch, simply click on the link that is associated with it. To define an Eon, select all Epochs using the checkboxes and click on the 'Define Eon' button below.</p>

<?php

$RootPath = GetGlobalsDir();

//echo $RootPath;

$handle = @opendir($RootPath) or die("Directory $RootPath not found.");
?><form method="get" action="defineeons.php"><?php
while($entry = readdir($handle)){
		if($entry != ".." && $entry != "."){
			if(strpos($entry, "GlobalLog-") === 0){
				$TSF = substr(trim($entry), strlen("GlobalLog-"), strlen($entry) - strlen("GlobalLog-")-4); //Timestamp prefix
				echo "<p><input type=\"checkbox\" name=\"eon$TSF\" value=\"$TSF\" /><a href=\"index.php?EpochPrefix=$TSF\">" . date("dMY H:i:s", $TSF) . "</a>. ($TSF) Filesize: " . filesize($RootPath . $entry). ".</p>";
				
				}
			}
		}
	?>
<input type="submit" value="Define Eon" /> * <input type="reset" value="Reset" />
</form>
<hr />
<div class="PluginInfo">PHPCounter 7 Core Plugin Previous Epochs - 21Dec03 Release</div>
<div class="PluginInfo">Copyright &copy; 2003 Pierre Far. Free for non-commercial use.</div>
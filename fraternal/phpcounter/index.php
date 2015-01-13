<?php
error_reporting(E_ALL ^ E_NOTICE);
ob_start();

define("InPHPC", TRUE);

require (realpath(dirname(__FILE__) . "/functions.php"));
require (realpath(dirname(__FILE__) . "/api.php"));

$DownloadModeSuccessful = FALSE;

$PluginFile = dirname(__FILE__) . "/plugins/" . basename($_GET["Plugin"]) . ".php";

if($_GET["indexDownloadMode"] && file_exists($PluginFile)){
	require $PluginFile;
	$DownloadModeSuccessful = TRUE; //should not be needed.
	exit;
	}

?>
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head><title>PHPCounter 7.3</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link href="phpcounter.css" rel="stylesheet" /></head>
<body>
<!--START Heading Table-->
	<table width="100%" cellpadding="0" cellspacing="0" border="0" class="HeadingTable">
		<tr>
			<td class="HeadLeftTD">
				<!--eKstreme.com logo here?-->&nbsp;
			</td>

			<td class="HeadRightTD" colspan="2">
				<span class="BeforeCOM">PHPCounter</span>&nbsp;<span class="COM">VII</span> 
			</td>
		</tr>
	</table>
	<!--END Heading Table-->
	<?php
	if(!$DownloadModeSuccessful && $_GET["indexDownloadMode"]){
		?><h2>Download Error</h2>
		<p>You have requested a download from a plugin, but the plugin could not be found. Please try again from below.</p>
		<?php
		}
	?>
	
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td class="NavigationTD">
			<h2>Data</h2><div class="Navigation">
			<div class="DropEM"><a href="index.php">Home</a></div>
			<div class="DropEM"><a href="index.php">Current Epoch</a></div>
			<?php
			echo "<div class=\"DropEM\"><a href=\"index.php?Plugin=Search&amp;FilterSubmit=Search&amp;FilterHitTime=" . date("d-M-Y", time()) . "\">Today's Hits</a></div>";
			
			$handle = @opendir(dirname(__FILE__) . "/plugins") or die("Plugins directory not found.");
			$PluginsArr = array();
			while($entry = readdir($handle)){
				if($entry != ".." && $entry != "." && $entry != "index.php"){
					$PathParts = pathinfo($entry);
					if($PathParts["extension"] == "php"){
						$Len = strpos($PathParts["basename"],".php");
						$CleanPluginName = substr($PathParts["basename"], 0, $Len);
						$PluginsArr[] = $CleanPluginName;
						}
					}
				}
			asort($PluginsArr);
			
			//Security fixes!!!
			$tempEpoch = getvar("EpochPrefix", "");
			$Epoch = "";
			if(IsTimePrefixValid($tempEpoch)){
				$Epoch = $tempEpoch;
				}
			$tempEonList = getvar("EonList", "");
			$tempEonArray = explode(",",$tempEonList);
			$EonArray = array();
			foreach($tempEonArray as $e){
				if(IsTimePrefixValid($e)){
					$EonArray[] = $e;
					}
				}
			$EonList = implode(",", $EonArray);
			
			foreach($PluginsArr as $p){
				echo "<div class=\"NavListDiv\"><a href=\"index.php?Plugin=$p&amp;EpochPrefix=$Epoch&amp;EonList=$EonList\">$p</a></div>";
				}
			?>
			</div>
		</td><td class="MainTD">
				<?php
					if($_GET["Plugin"]){
						?>
						<div class="Content">
						<?php
						$PluginFile = dirname(__FILE__) . "/plugins/" . basename($_GET["Plugin"]) . ".php";
						if(file_exists($PluginFile)){
							$start = GetMicroTime();
							require $PluginFile;
							list($end,$t) = explode(" ", microtime()); 
							$end = GetMicroTime();
							$diff = $end - $start;
							echo "<div class=\"PluginInfo\">Plugin took $diff second(s) to complete.</div>";
							}
						else{
							echo "<p>Plugin could not be found.</p>";
							}
						?>
						</div>
						<?php
						}
					else{						
						?>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td class="InformationTD"><h2>Information Page</h2>
									<p><a href="information.php">View the information page</a></p>
									<p>This page displays your settings and also <span class="DropEM">gives you the code needed</span> to start tracking web pages.</p>
								</td>
								<td class="TestingTD"><h2>Testing Page</h2>
									<p><a href="testing.php">View the testing page</a></p>
									<p>This pages tests whether you have correctly set up PHPCounter.</p>
								</td>
								<td class="PITD"><h2>phpinfo() Page</h2>
									<p><a href="phpinfo.php">View PHP Info</a></p>
									<p>This page gives your PHP server's configuration using a function built into PHP.</p>
								</td>
							</tr>
							<tr>
								<td class="HelpTD"><h2>General Help</h2>
									<p><a href="http://ekstreme.com/phpcounter/">General help</a><br />
									   <a href="http://ekstreme.com/contact.php">Contact Me</a>
									   </p>
									<p>The help file contains installation instructions, tips, contact details, and more!</p>
								</td>
								<td class="HelpTD"><h2>Plugins Help</h2>
									<p><a href="http://ekstreme.com/phpcounter/plugins-help.php">Plugins help</a></p>
									<p>Documentation for the standard data analysis and viewing plugins that come with PHPCounter.</p>
								</td>
								<td class="PayTD"><h2>Licence</h2>
									<p><a href="licence.php">Read the PHPCounter Licence</a></p>
									<p><a href="https://secure.shareit.com/shareit/checkout.html?PRODUCT[300005509]=1&DELIVERY[300005509]=EML&oplayout=EU&pc=ddmmm&currencies=GBP">Pay for PHPCounter</a></p>
									<p>PHPCounter is free for non-commercial use. If you are using PHPCounter on a commercial website, please pay. Thank you!</p>
									<p>If you prefer to pay via PayPal, please <a href="http://ekstreme.com/paypal.php">see this page</a>.</p>
								</td>
							</tr>
							<tr>
								<td class="UpdateTD" colspan="3">
								<h2>PHPCounter Update</h2>
								<p>Please visit the <a href="http://ekstreme.com/phpcounter/phpcounter-update.php">PHPCounter Update Page</a> for latest updates for PHPCounter.</p>
								<h2>Plugins</h2>
								<p>Customise you PHPCounter with more plugins! <a href="http://ekstreme.com/phpcounter/plugins/index.php">Browse the plugins directory</a>.
								</td>
							</tr>
						</table>
						<p>Do you see something missing in PHPCounter? Got a comment or some feedback? <a href="http://ekstreme.com/contact.php">Please tell me</a>!</p>
						<?php
						}
				?>
		</td></tr></table>
<p>PHPCounter 7.3 &copy;2005 Pierre Far.</p>
</body></html>
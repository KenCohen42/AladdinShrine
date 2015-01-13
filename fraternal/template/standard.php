<?php
function printHeader($title)
{
    echo '
<html>
  <head>
    <title>Ohio DeMolay, Tomorrow&#39s Leaders Today - '.$title.'</title>
  </head>  
  <body bgcolor="#9900CC">
  
    <table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#9900CC">
	  <tr>
	    <td width="95%" align="center" valign="middle" colspan="4">';
    echo
          $title;
    include("head.php"); 
    echo'
		</td>
	  </tr>
	  <tr>
	    <td bgcolor="#9900CC" height="10"><spacer type="block" height="10"></td>
		<td bgcolor="#9900CC" height="10"><spacer type="block" height="10"></td>

	  </tr>	  
	  <tr>
	    <td rowspan="3" valign="top">';
    include ("left.inc");
    echo'
		</td>	    
		<td><img src="../images/cornerUL.png"></td>
	    <td bgcolor="#CCCCCC" width="100%" height="10"><spacer type="block" height="10"></td>
	    <td><img src="../images/cornerUR.png"></td>
      </tr>';
}

function printContent($contentFile)
{
    echo'
      <tr>
	    <td bgcolor="#CCCCCC" width="10" height="10"><spacer type="block" height="10"></td>
		<td valign="top" bgcolor="#CCCCCC" height="1300">
		  <!-- CONTENT PANE -->';
    $includedFile= "..\content\".$contentFile;
    include($includedFile);
	echo'
		  <!-- END CONTENT PANE -->
		</td>
	    <td bgcolor="#CCCCCC" width="10" height="10"><spacer type="block" height="10"></td>';
	echo'
	  </tr>
	  <tr>	    
	    <td><img src="../images/cornerLL.png"></td>
	    <td bgcolor="#CCCCCC" width="100%" height="10"><spacer type="block" height="10"></td>
	    <td><img src="../images/cornerLR.png"></td>
      </tr>';
}

function printFooter()
{
    echo'
  <tr>
    <td colspan="4" bgcolor="#9900CC" height="3"><spacer type="block" height="3"></td>
  </tr>
	  <tr>
	    <td bgcolor="#9900CC" valign="middle" align="center" colspan="4">';
		  include("C:\Inetpub\Odemolay\ohiodemolay\template\footer.inc");
    echo'
		</td>
	  </tr>
	</table>
</body>
</html>';
}
?>
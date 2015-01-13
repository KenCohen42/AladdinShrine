<html>
  <head>
    <!-- CHANGE THE TITLE -->
    <title>Aladdin Shrine Center - TEMPLATE PAGE</title>
  </head> 
  <body background="images/beigeswirl.jpg">
  
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
	  <tr>
	    <td width="90%" align="center" valign="middle" colspan="3">
		  <?php require("template/head.php"); ?>
		</td>
	  </tr>	  
	  <tr>
	    <td valign="top">
		  <?php require("template/left.php"); ?>
		</td>
		<td width="80" rowspan="2">&nbsp;</td>	    
		<td valign="top" height="1300">
		  <!-- CONTENT PANE -->
		    <!-- CHANGE THE NAME OF THE FILE -->
            <?php require("content/fraternal.php"); ?>		  
		  <!-- END CONTENT PANE -->
		</td>
      </tr>
	  <tr>
	    <td valign="middle" align="center" colspan="3">
		  <?php require("template/footer.php"); ?>
		</td>
	  </tr>
	</table>

</body>
</html>

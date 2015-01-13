<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <!--phpalbum <?=$phpalbum_version?> -->
 <head>
   <title><? print $site_name;?></title>
   <LINK REL="stylesheet" HREF="<?print ($stylesheet_link);?>" TYPE="text/css">
 </head>
 <body>
 <table width="100%"><tr><td align="center">
 <table class="BODY" cellpadding="5" width="90%"><tr><td>

   <!--logo-->
   <table width="100%" cellpadding="0" cellspacing="0">
     <tr>
       <td colspan="4" align="left">
	   <?print $logo;?>
       </td>
     </tr>
   </table>
   <table width="100%"><tr>
   	<td width="100%" nowrap align="right">
	  	<?if($login_enabled && !$logged_in){?>
	  		<a class="me" href="<?print $login_logout_link;?>"><?print $login_logout_text?></a>&nbsp;
	  	<?}?>	
	  	<?if($logged_in){?>
	  		<a class="me" href="main.php?cmd=setup"><?p("ID_SETUP");?>&nbsp;</a>
	  	<?}?>
	</td>
    </tr>
        <?if($login_clicked){ print "<tr><td colspan=\"2\" width=\"100%\" align=\"right\">".$login_dialog."</td></tr>"; }?>
   </table>

   <!--menu-->
   <table width="100%" class="menu">
     <tr>
       <td width="100%">
         <font class="te">
	      <? if ( $return_home_url != "") { ?>
	      	      <a class="me" href="http://<? print $return_home_url;?>"><?p("ID_HOME");?></a>&nbsp;|&nbsp;
	      <? } ?>
	      <? p('ID_ALBUM_NAME');?></font>
	</td>
      </tr>
   </table>
<!--main content-->
<table width="100%" height="300"><tr><td width="100%" align="center"><h1><?p("ID_ERROR_PAGE_MESSAGE");?></h1></td></tr></table>
<? if( $footer_message ) { ?>
	<table width="100%"><tr height="30"><td valign="bottom" align="center" width="100%">
		<? print $footer_message; ?>
		<!-- <font size="2">Powered by <a class="me"href="http://www.phpalbum.net">PHP Photo Album</font></a> -->
	</td></tr></table>
<? } ?>

</td></tr></table>
</td></tr></table>
<!--end of page -->
</body></html>

<html>
 <!--phpalbum <?=$phpalbum_version?> -->
 <head>
   <title><? print $site_name;?></title>
   <LINK REL="stylesheet" HREF="<?print ($stylesheet_link);?>" TYPE="text/css">
 </head>
 <body>
   <!--logo-->
   <table width="100%" cellpadding="0" cellspacing="0">
     <tr>
       <td colspan="4" align="center">
	   <?print $logo;?>
       </td>
     </tr>
   </table>
   <!--menu-->
   	<? if($show_search_box) { ?>
		<div style="float: right;">
			<form method="GET" action="" style="margin:0px;">
				<table cellspacing="0" cellpadding="0" border="0"><tr>
				<td nowrap><input class="login" type="text" size="20" name="keyword" value="<?=$search_text?>"/></td>
				<td nowrap>&nbsp;&nbsp;&nbsp;</td>
				<td nowrap><input class="login_btn" type="submit" value="<?p("ID_SEARCH");?>"/></td>
				</tr></table>
				<input type="hidden" name="cmd" value="albumnew"/>
			</form>
		</div><br style="margin: 3px;"/>
	<? } ?>
   <table width="100%">
     <tr>
       <td width="100%">
         <font class="te">
	      <? if ( $return_home_url != "") { ?>
	      	      <a class="me" href="http://<? print $return_home_url;?>"><?p("ID_HOME");?></a>&nbsp;|&nbsp;
	      <? } ?>
	      <? p('ID_ALBUM_NAME');?></font>
	      <? foreach( $dir_path as $num => $dir ) {?>
	 		<a  class="me" href="<? print $dir['link']; ?>"><? print $dir['name']; ?></a><font class="te">/</font></b>
	      <? } ?>
	</td>
	<td nowrap>
	  <? foreach( $quality_links as $link){ ?>
  		<? if ( $link['actual']) {?>
			<font class="te"><b><? print $link['name']; ?></b></font>&nbsp;&nbsp;		
		<? } else { ?>
			<a class="me" href="<? print $link['link']; ?>"><? print $link['name']; ?></a>&nbsp;&nbsp;		
		<? } ?>
	  <? } ?>
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
   <? if($dir_long_desc){ ?>
         <table border="1" cellpadding="15" width="100%">
	   <tr>
	     <td class="boxbody" width="100%">
	       <font class="dirdesc"><? print $dir_long_desc; ?>
	       </font>
	     </td>
	   </tr>
	 </table>
   <? } ?>
<!--main content-->
<table width="100%"><tr><td width="100%" align="left">
<? print $directories; ?>
</td></tr></table>
<!-- next/prev page-->
<table width="100%"><tr><td width="100%" align="center">
  <table width="100%">
<? if ( $previous_page_link || $next_page_link ) { ?>
    <tr>
    	<td align="right" nowrap>
	    <? if($previous_page_link){?>
	        <a class="me" href="<? print $previous_page_link; ?>"><? p("ID_PREV_PAGE");?></a>
	    <? }else{?>
	        <font class="te"><b><? print p("ID_PREV_PAGE");?></b></font>
	    <?}?>
	    &nbsp;&nbsp;&nbsp;
	    <? if($next_page_link){?>
	        <a class="me" href="<? print $next_page_link; ?>"><? p("ID_NEXT_PAGE");?></a>
	    <? }else{?>
	        <font class="te"><b><?p("ID_NEXT_PAGE");?></b></font>
	    <?}?>
	</td>
    </tr>
<? } ?>
    <tr><td width="100%" align="center">
    <? print $thumbnails; ?>
    </td></tr>
  </table>
<? if($disable_bottom_nextprev=="false"){?>
<? if ( $previous_page_link || $next_page_link ) { ?>
		<table width="100%"><tr>
    	<td align="right" nowrap>
	    <? if($previous_page_link){?>
	        <a class="me" href="<? print $previous_page_link; ?>"><? p("ID_PREV_PAGE");?></a>
	    <? }else{?>
	        <font class="te"><b><? print p("ID_PREV_PAGE");?></b></font>
	    <?}?>
	    &nbsp;&nbsp;&nbsp;
	    <? if($next_page_link){?>
	        <a class="me" href="<? print $next_page_link; ?>"><? p("ID_NEXT_PAGE");?></a>
	    <? }else{?>
	        <font class="te"><b><?p("ID_NEXT_PAGE");?></b></font>
	    <?}?>
	</td>
    </tr>
	</table>
<? } ?>
<?}?>

</td></tr></table>
<? if( $footer_message ) { ?>
	<table width="100%"><tr height="100"><td valign="bottom" align="center" width="100%">
		<? print $footer_message; ?>
		<!-- <font size="2">Powered by <a class="me"href="http://www.phpalbum.net">PHP Photo Album</font></a> -->
	</td></tr></table>
<? } ?>
<? if($tracking_code) { print $tracking_code; } ?>
<!--end of page -->
</body></html>

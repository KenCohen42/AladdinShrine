<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <!--phpalbum <?=$phpalbum_version?> -->
 <head>
   <title><? print $site_name;?></title>
   <LINK REL="stylesheet" HREF="<?print ($stylesheet_link);?>" TYPE="text/css">
 </head>
 <body class="fixed">
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
   <table width="100%" class="menu">
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
	<tr>
	<td colspan="2" width="100%" align="right" nowrap>
	    <? if($prev_link){?>
	        <a class="me" href="<? print $prev_link; ?>"><?p("ID_PREV");?></a>
	    <? }else{?>
	        <font class="te"><b><?p("ID_PREV");?></b></font>
	    <?}?>
	    &nbsp;&nbsp;&nbsp;
	    <? if($next_link){?>
	        <a class="me" href="<? print $next_link; ?>"><? p("ID_NEXT");?></a>
	    <? }else{?>
	        <font class="te"><b><?p("ID_NEXT");?></b></font>
	    <?}?>
	    &nbsp;&nbsp;
	</td>
      </tr>
   </table>
<!--main content-->
<div>
 <table width="100%" cellspacing="10">
  <tr>
   <td align="center">
   <table cellspacing="0" cellpadding="0" border="0">
    <tr>
	<td class="photo">
	 <div style="margin: <?=$photo_border_size?>px;">
         <?if($next_link){?><a class="me" href="<? print $next_link; ?>"><?}?>
         	<img alt="<? print $short_desc;?>" width="<? print $width;?>" height="<? print $height;?>" src="<? print $image;?>" border="1" style="border-color: #888888;"/><br/>
         <?if($next_link){?></a><?}?>
	 </div>
   </td>

   <? if($display_shadows=="true"){ ?>
    <td valign="top" background="main.php?cmd=themeimage&var1=shdw_r.png&var2=<?=$pa_color_map["bg_color"]?>"><img src="main.php?cmd=themeimage&var1=shdw_ru.png&var2=<?=$pa_color_map["bg_color"]?>"/></td>
    </tr>
    <tr>
   	<td align="left" background="main.php?cmd=themeimage&var1=shdw_d.png&var2=<?=$pa_color_map["bg_color"]?>"><img src="main.php?cmd=themeimage&var1=shdw_ld.png&var2=<?=$pa_color_map["bg_color"]?>"/></td>
   	<td><img src="main.php?cmd=themeimage&var1=shdw_rd.png&var2=<?=$pa_color_map["bg_color"]?>"></td>
   <?}?>
   
   </tr>
   </table>
    </td>
  </tr>
  <tr>
  	<td align="center">
  		<div>
	     <table cellspacing="0" cellpadding="0" width="<? print $total_width;?>">
	       <!--<tr height="5"><td></td></tr>-->
	       <? if($short_desc){?>
	       <tr><td witdh="100%" align="center"><b><font class="photodesc" size="5" ><? print $short_desc;?></font></b></td></tr>
	       <? } ?>
	       <? if($long_desc){?>
	       <tr><td witdh="100%" align="center"><font class="photodesc"><? print $long_desc?></font></td></tr>
	       <? } ?>
	     </table>
	   </div>
    </td>
  <tr>
 </table>
 <table width="100%"><tr><td align="center"><? print $parameters; ?></td></tr></table>
</div>
<? if($disable_bottom_nextprev=="false"){?>
<div>
  <table width="100%" class="menu">
    <tr>
    	<td width="100%" align="right">
	    <? if($prev_link){?>
	        <a class="me" href="<? print $prev_link; ?>"><?p("ID_PREV");?></a>
	    <? }else{?>
	        <font class="te"><b><?p("ID_PREV");?></b></font>
	    <?}?>
	    &nbsp;&nbsp;&nbsp;
	    <? if($next_link){?>
	        <a class="me" href="<? print $next_link; ?>"><?p("ID_NEXT");?></a>
	    <? }else{?>
	        <font class="te"><b><?p("ID_NEXT");?></b></font>
	    <?}?>
	    &nbsp;&nbsp; 
	</td>
    </tr>
  </table>
</div>  
<? } ?>

<? if( $post_ecard_link ){ ?>
<a class="me" href="<?=$post_ecard_link?>"><?p("ID_WRITE_ECARD");?></a>&nbsp;&nbsp;&nbsp;&nbsp;
<? } ?>
<? if( $post_comment_link ){ ?>
	<a class="me" href="<?=$post_comment_link?>"><?p("ID_ADD_COMMENT");?></a>
<? } ?>
<? print $comments; ?>
<? print $ecards; ?>
<? if( $footer_message ) { ?>
	<table width="100%"><tr height="30"><td valign="bottom" align="center" width="100%">
		<? print $footer_message; ?>
		<!-- <font size="2">Powered by <a class="me"href="http://www.phpalbum.net">PHP Photo Album</font></a> -->
	</td></tr></table>
<? } ?>

</td></tr></table>
</td></tr></table>
<? if($tracking_code) { print $tracking_code; } ?>
<!--end of page -->
</body></html>

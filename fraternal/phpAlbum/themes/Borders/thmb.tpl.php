<table style="float: left;" cellspacing="0" cellpadding="0">
  <tr nowrap valign="center" height="<? print $height+2*$border; ?>">
    <td width="<? print $width+$border*2;?>" align="center" nowrap>
      <table cellpadding="0" cellspacing="0">
         <tr>
      		<td><a class="me" href="<? print $image_view_link; ?>"><img alt="<? print $dir_name; ?>" class="thmb" src="<? print $thmb_link; ?>"/></a></td>
    <? if($display_shadows=="true"){ ?>
            <td valign="top" background="main.php?cmd=themeimage&var1=shdw_r.png&var2=<?=$pa_color_map["bg_color"]?>&var3=75"><img border="0" src="main.php?cmd=themeimage&var1=shdw_ru.png&var2=<?=$pa_color_map["bg_color"]?>&var3=75"></td>
        </tr>
        <tr>
   	        <td align="left" background="main.php?cmd=themeimage&var1=shdw_d.png&var2=<?=$pa_color_map["bg_color"]?>&var3=75"><img border="0" src="main.php?cmd=themeimage&var1=shdw_ld.png&var2=<?=$pa_color_map["bg_color"]?>&var3=75"></td>
   	       <td><img border="0" src="main.php?cmd=themeimage&var1=shdw_rd.png&var2=<?=$pa_color_map["bg_color"]?>&var3=75"></td>
   <?}?>
       </tr>
    </table>
    <a class="me" href="<? print $image_view_link; ?>">
    <? if($image_short_desc){ ?>
    	<?print $image_short_desc; ?>
    	<br>
    <?}?>
    </a>
    <table cellpadding="0" cellspacing="0">
    <?if(isset($view_count)){ ?>
    	<tr><td><font class="desc" ><?p("ID_MSG_VIEW_COUNT",$view_count);?></font></td></tr>
    <?}?>
    <?if(isset($comment_count)){ ?>
    	<tr><td><font class="desc"><?p("ID_MSG_COMMENT_COUNT",$comment_count);?></font></td></tr>
    <?}?>
    </table>
   </td>
  </tr>
</table>

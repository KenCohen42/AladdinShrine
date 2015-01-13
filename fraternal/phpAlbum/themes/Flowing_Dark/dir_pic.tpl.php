<table style="float: left;" cellspacing="0" cellpadding="0">
  <tr nowrap valign="center" height="<? print $height+2*$border; ?>">
    <td width="<? print $width+$border*2;?>" align="center" nowrap>
      <table cellpadding="0" cellspacing="0">
         <tr>
      		<td><a class="me3" href="<? print $dir_link; ?>"><img alt="<? print $dir_name; ?>" class="thmb" src="<? print $dir_logo_path; ?>"/></a></td>
    <? if($display_shadows=="true"){ ?>
            <td valign="top" background="main.php?cmd=themeimage&var1=shdw_r.png&var2=<?=$pa_color_map["bg_color"]?>&var3=75"><img border="0" src="main.php?cmd=themeimage&var1=shdw_ru.png&var2=<?=$pa_color_map["bg_color"]?>&var3=75"></td>
        </tr>
        <tr>
   	        <td align="left" background="main.php?cmd=themeimage&var1=shdw_d.png&var2=<?=$pa_color_map["bg_color"]?>&var3=75"><img border="0" src="main.php?cmd=themeimage&var1=shdw_ld.png&var2=<?=$pa_color_map["bg_color"]?>&var3=75"></td>
   	       <td><img border="0" src="main.php?cmd=themeimage&var1=shdw_rd.png&var2=<?=$pa_color_map["bg_color"]?>&var3=75"></td>
   <?}?>
       </tr>
    </table>
     
    <a class="me" href="<? print $dir_link; ?>">
    	 ::&nbsp;<?print $dir_name."&nbsp;::<br/>";?>
    </a>
    <font class="desc"><?print $dir_short_desc;?></font>
    	 
    
   </td>
  </tr>
</table>

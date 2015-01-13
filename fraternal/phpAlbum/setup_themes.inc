<table><tr><td><h6><?p("ID_SETUP_MENU_THEMES");?></h6>
</td></tr>
<tr><td>
<form name="main_setup" action="main.php" method="post">
<div class="description"><?p("ID_SETUP_DESC_THEMES")?></div>
<!-- choose theme -->
<div class="form-item">
<label><?p("ID_SETUP_THEME")?></label></br>
   <SELECT name="p_theme" onchange="submit();">
   	<?
	$themes=get_themes();
	asort($themes);
   	foreach($themes as $num => $dir){
		if($dir==$pa_setup["site_theme"]){
		  echo "<OPTION selected value=\"$dir\">$dir</OPTION>";
		}else{
		  echo "<OPTION value=\"$dir\">$dir</OPTION>";
		}
	}
	?>
   </SELECT>
<div class="description"><?p("ID_SETUP_THEME_DESC")?></div>
</div>
<fieldset><legend><?p("ID_SETUP_THEME_SETTINGS")?> - <b><?=$pa_setup["site_theme"]?></b></legend><div class="form-item">
<!-- checking the form -->
<? if($pa_theme["logo_path"]){
	if(!file_exists($pa_theme["logo_path"])){
		print_error(t("ID_MSG_FILE_NOT_EXISTS"),$pa_theme["logo_path"]);
		$logo_path_error=" error";
	 }
}
?>


<!-- logo_style -->
<div class="form-item">
<label><?p("ID_SETUP_LOGO_STYLE")?></label></br>
		<SELECT name="p_logo_style">
			<?
			$styles=theme_get_logo_styles();
			asort($styles);
		   	foreach($styles as $num => $style){
				if($style==$pa_theme["logo_style"]){
				  echo "<OPTION selected value=\"$style\">$style</OPTION>";
				}else{
				  echo "<OPTION value=\"$style\">$style</OPTION>";
				}
			}
			?>
		</SELECT>
<div class="description"><?p("ID_SETUP_LOGO_STYLE_DESC")?></div>
</div>

		
<!-- logo_path -->
<div class="form-item">
<label><?p("ID_SETUP_LOGO_PATH")?></label></br>
<input name="p_logo_path" size="30" class="form-text<?=$logo_path_error?>" value="<?=$pa_theme["logo_path"]?>">
<div class="description"><?p("ID_SETUP_LOGO_PATH_DESC")?></div>
</div>

<!-- logo_text -->
<div class="form-item">
<label><?p("ID_SETUP_LOGO_TEXT")?></label></br>
<input name="p_logo_text" size="30" class="form-text" value="<?=prepit($pa_theme["logo_text"])?>">
<div class="description"><?p("ID_SETUP_LOGO_TEXT_DESC")?></div>
</div>

<!-- show_filenames -->
<div class="form-item">
<input type="checkbox" name="p_show_filenames" <? if($pa_theme["show_filenames"]=="true"){echo "checked";}?>><label><?p("ID_SETUP_SHOW_FILENAMES")?></label></input></br>
<div class="description"><?p("ID_SETUP_SHOW_FILENAMES_DESC")?></div>
<div>

<!-- show_filenames -->
<div class="form-item">
<input type="checkbox" name="p_disable_bottom_nextprev" <? if($pa_theme["disable_bottom_nextprev"]=="true"){echo "checked";}?>><label><?p("ID_SETUP_DISABLE_BOTTOM_NEXTPREV")?></label></input></br>
<div class="description"><?p("ID_SETUP_DISABLE_BOTTOM_NEXTPREV_DESC")?></div>
<div>

<!-- show_search_box -->
<div class="form-item">
<input type="checkbox" name="p_show_search_box" <? if($pa_theme["show_search_box"]=="true"){echo "checked";}?>><label><?p("ID_SETUP_SHOW_SEARCH_BOX")?></label></input></br>
<div class="description"><?p("ID_SETUP_SHOW_SEARCH_BOX_DESC")?></div>
<div>

<!-- logo_style -->
<div class="form-item">
<label><?p("ID_SETUP_DIR_LOGO_STYLE")?></label></br>
		<SELECT name="p_dir_logo_style" onchange="submit();">
	            <OPTION value="logo" <?if($pa_theme["dir_logo_style"]=="logo") echo "selected";?>><?p("ID_SETUP_DIR_LOGO_STYLE_LOGO");?></OPTION>;
	            <OPTION value="pic_thmb_size" <?if($pa_theme["dir_logo_style"]=="pic_thmb_size") echo "selected";?>><?p("ID_SETUP_DIR_LOGO_STYLE_PIC1");?></OPTION>;
	            <OPTION value="pic_other_size" <?if($pa_theme["dir_logo_style"]=="pic_other_size") echo "selected";?>><?p("ID_SETUP_DIR_LOGO_STYLE_PIC2");?></OPTION>;
		</SELECT>
<div class="description"><?p("ID_SETUP_DIR_LOGO_STYLE_DESC")?></div>
</div>
<? if($pa_theme["dir_logo_style"]=="pic_other_size"){?>
	<div class="form-item">
	  	<label><?p("ID_SETUP_QUALITY_THMB")?></label><br/>
	  	<input class="form-text" size="6" name="p_dir_logo_size" value="<?=$pa_theme["dir_logo_size"]?>"></input>&nbsp;/&nbsp;
		<input class="form-text" size="6" name="p_dir_logo_quality" value="<?=$pa_theme["dir_logo_quality"]?>"></input>&nbsp;&nbsp;<input type="checkbox" name="p_dir_logo_square_thumbnail" <? if($pa_theme["dir_logo_square_thumbnail"]=="true"){echo "checked";}?>><?p("ID_SETUP_SQUARE_THMB")?></input></br>
		<div class="description"><?p("ID_SETUP_QUALITY_THMB_DESC")?></div>
	</div>
		
<?}?>

<table width="100%"><tr><td width="100%">
<fieldset><legend><?p("ID_SETUP_THEME_BORDERS")?></legend><div class="form-item">
	<div class="form-item">
		<label><?p("ID_SETUP_THEME_PIC_BORDER_SIZE")?></label></br>
		<input name="p_picture_border_size" size="10" class="form-text" value="<?=$pa_theme["picture_border_size"]?>">
		<div class="description"><?p("ID_SETUP_THEME_PIC_BORDER_SIZE_DESC")?></div>
	</div>
	<div class="form-item">
		<label><?p("ID_SETUP_THEME_THMB_BORDER_SIZE")?></label></br>
		<input name="p_thumbnail_border_size" size="10" class="form-text" value="<?=$pa_theme["thumbnail_border_size"]?>">
		<div class="description"><?p("ID_SETUP_THEME_THMB_BORDER_SIZE_DESC")?></div>
	</div>
	<!-- display shadows -->
	<div class="form-item">
	<input type="checkbox" name="p_display_shadows" <? if($pa_theme["display_shadows"]=="true"){echo "checked";}?>><label><?p("ID_SETUP_THEME_DISPLAY_SHADOWS")?></label></input></br>
	<div class="description"><?p("ID_SETUP_THEME_DISPLAY_SHADOWS_DESC")?></div>
	<div>
</fieldset>
</td></tr></table>

<div class="form-item">
	<label><?p("ID_SETUP_THEME_THUMBNAILS_STYLE")?></label>
	<table><tr><td valign="top" width="50%">
	
	<fieldset><legend><?p("ID_SETUP_THEME_FLOWING_STYLE")?></legend><div class="form-item">
		<table><tr><td><img src="res/flowing.png" /></td><td width="100%">
			<div class="form-item">
				<input type="radio" value="flowing" name="p_directory_style" <?if($pa_theme["directory_style"]=="flowing"){echo "checked";}?> /><?p("ID_SETUP_THEME_FLOWING_STYLE")?>
			</div>
			<!-- logo_text -->
			<div class="form-item"></td></tr>
			<tr><td colspan="2">
				<label><?p("ID_SETUP_MAX_PHOTO_PER_PAGE")?></label></br>
				<input name="p_maximum_photos_per_page" size="10" class="form-text" value="<?=$pa_theme["maximum_photos_per_page"]?>">
				<div class="description"><?p("ID_SETUP_MAX_PHOTO_PER_PAGE_DESC")?></div>
				</div>
		</td></tr>
			<tr><td colspan="2">
				<label><?p("ID_SETUP_ADD_THMB_HEIGHT")?></label></br>
				<input name="p_additional_thmb_height" size="10" class="form-text" value="<?=$pa_theme["additional_thmb_height"]?>">
				</div>
		</td></tr>
		<tr><td colspan="2">
				<label><?p("ID_SETUP_ADD_THMB_WIDTH")?></label></br>
				<input name="p_additional_thmb_width" size="10" class="form-text" value="<?=$pa_theme["additional_thmb_width"]?>">
				<div class="description"><?p("ID_SETUP_ADD_THMB_HEIGHT_WIDTH_DESC")?></div>
				</div>
		</td></tr></table>
	</fieldset>
	</td><td valign="top" width="50%">
	<fieldset><legend><?p("ID_SETUP_THEME_RASTER_STYLE")?></legend><div class="form-item">
		<table><tr><td><img src="res/raster.png" /></td><td width="100%">
			<div class="form-item">
				<input type="radio" value="raster" name="p_directory_style" <?if($pa_theme["directory_style"]=="raster"){echo "checked";}?> /><?p("ID_SETUP_THEME_RASTER_STYLE")?>
			</div></td></tr>
			<tr><td colspan="2">
				<label><?p("ID_SETUP_RASTER_SIZE")?></label></br>
				<input name="p_raster_dir_x" size="10" class="form-text" value="<?=$pa_theme["raster_dir_x"]?>">&nbsp;/&nbsp;
				<input name="p_raster_dir_y" size="10" class="form-text" value="<?=$pa_theme["raster_dir_y"]?>">
				<div class="description"><?p("ID_SETUP_RASTER_SIZE_DESC")?></div>
				</div>
			
		</td></tr></table>
	</fieldset>
	</td></tr></table>
</div>
	<a href="main.php?cmd=setup&var1=themes&var2=add_color"><img border="0" src="res/new.png" /><?p("ID_SETUP_ADD_COLOR_MAP")?></a>
	<div class="form-item">
	<fieldset><legend><?p("ID_SETUP_COLOR_SETTINGS")?>
	   <SELECT name="p_color_map" onchange="submit();">
	   	<?
		$maps=db_select_all("color_map");
	   	foreach($maps as $num => $color){
			if($pa_color_map["id"]==$color["id"]){
			  echo "<OPTION selected value=\"".$color["id"]."\">".$color["name"]."</OPTION>";
			}else{
			  echo "<OPTION value=\"".$color["id"]."\">".$color["name"]."</OPTION>";
			}
		}
		?>
	   </SELECT>
	   
	</legend><div class="form-item">
	<!-- name -->
	<div class="form-item">
	<label><?p("ID_SETUP_COLOR_NAME")?></label></br>
	<input name="p_color_name" size="30" class="form-text" value="<?=prepit($pa_color_map["name"])?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? if (count($maps)>1){ ?><a href="main.php?cmd=setup&var1=themes&var2=del_color&var3=<?=$pa_color_map["id"]?>" class="red"><img border="0" src="res/red_x.png" /><?p("ID_SETUP_COLOR_DELETE")?></a> <?}?>
	<div class="description"><?p("ID_SETUP_COLOR_NAME_DESC")?></div>
	</div>


	<!-- name -->
	<div class="form-item">
	<table>
	  <tr>
	    <td>
			<label><?p("ID_SETUP_COLOR_BG")?></label></br>
			<input name="p_bg_color" size="12" class="form-text" value="<?=$pa_color_map["bg_color"]?>">
		</td>
	    <td>
			<label><?p("ID_SETUP_COLOR_LINK")?></label></br>
			<input name="p_link_color" size="12" class="form-text" value="<?=$pa_color_map["link_color"]?>">
		</td>
	    <td>
			<label><?p("ID_SETUP_COLOR_DIR_DESC")?></label></br>
			<input name="p_dir_desc_color" size="12" class="form-text" value="<?=$pa_color_map["dir_desc_color"]?>">
		</td>
	    <td>
			<label><?p("ID_SETUP_COLOR_BORDER")?></label></br>
			<input name="p_border_color" size="12" class="form-text" value="<?=$pa_color_map["border_color"]?>">
		</td>
	    <td>
			<label><?p("ID_SETUP_COLOR_PHOTO_DESC")?></label></br>
			<input name="p_photo_desc_color" size="12" class="form-text" value="<?=$pa_color_map["photo_desc_color"]?>">
		</td>
	    <td>
			<label><?p("ID_SETUP_COLOR_LOGO")?></label></br>
			<input name="p_logo_color" size="12" class="form-text" value="<?=$pa_color_map["logo_color"]?>">
		</td>
	  </tr>
	  <tr height="50">
	    <td style="border: 1px solid #888; background-color: #<?=$pa_color_map["bg_color"]?>;">
	    	&nbsp;
	    </td>
	    <td style="border: 1px solid #888; background-color: #<?=$pa_color_map["link_color"]?>">
	    	&nbsp;
	    </td>
	    <td style="border: 1px solid #888; background-color: #<?=$pa_color_map["dir_desc_color"]?>">
	    	&nbsp;
	    </td>
	    <td style="border: 1px solid #888; background-color: #<?=$pa_color_map["border_color"]?>">
	    	&nbsp;
	    </td>
	    <td style="border: 1px solid #888; background-color: #<?=$pa_color_map["photo_desc_color"]?>">
	    	&nbsp;
	    </td>
	    <td style="border: 1px solid #888; background-color: #<?=$pa_color_map["logo_color"]?>">
	    	&nbsp;
	    </td>
	  </tr>
	</table>
	</div>
		
	</div></fieldset>
</div>


</div>
</fieldset>


<input type="hidden" name="cmd" value="setup"/>
<input type="hidden" name="var1" value="themes"/>
<input type="hidden" name="var2" value="save"/>
<input type="submit" class="form-submit" value="<?p("ID_SETUP_SAVE_CONFIG")?>"  />
<input type="reset" class="form-submit" value="<?p("ID_SETUP_RESET_CONFIG")?>"  />
</form>
</td></tr>
</table>       

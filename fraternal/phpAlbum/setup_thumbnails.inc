<table><tr><td><h6><?p("ID_SETUP_MENU_THUMBNAILS");?></h6>
</td></tr>
<tr><td>
<form name="main_setup" action="main.php" method="post">
<div class="description"><?p("ID_SETUP_DESC_THUMBNAILS")?></div>
</br>
<a href="main.php?cmd=setup&var1=thumbnails&var2=add"><img border="0" src="res/new.png" /><?p("ID_SETUP_ADD_QUALITY")?></a>
</br>
<? 
	$q=db_select_all("quality");
	foreach($q as $rec){ ?>
		
		<fieldset><legend><?p("ID_SETUP_THUMBNAILS")?>&nbsp;-&nbsp;<b><?=$rec["name"]?></b></legend><div class="form-item">
			<!-- checking the form -->
			<div class="form-item">
					<label><?p("ID_SETUP_QUALITY_NAME")?></label><br />
					<input class="form-text" name="p_q_desc<?=$rec["id"]?>" value="<?=prepit($rec["name"])?>"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? if (count($q)>1){ ?><a href="main.php?cmd=setup&var1=thumbnails&var2=del&var3=<?=$rec["id"]?>" class="red"><img border="0" src="res/red_x.png" /><?p("ID_SETUP_DELETE_QUALITY")?></a> <?}?>
					<div class="description"><?p("ID_SETUP_QUALITY_NAME_DESC")?></div>
			</div>
			
	  	<div class="form-item">
	  	<label><?p("ID_SETUP_QUALITY_THMB")?></label><br/>
	  	<input class="form-text" size="6" name="p_q_thmbs<?=$rec["id"]?>" value="<?=$rec["thmb_size"]?>"></input>&nbsp;/&nbsp;
		<input class="form-text" size="6" name="p_q_thmbq<?=$rec["id"]?>" value="<?=$rec["thmb_qual"]?>"></input>&nbsp;&nbsp;<input type="checkbox" name="p_q_square_thumbnails<?=$rec["id"]?>" <? if($rec["square_thumbnails"]=="true"){echo "checked";}?>><?p("ID_SETUP_SQUARE_THMB")?></input></br>
		<div class="description"><?p("ID_SETUP_QUALITY_THMB_DESC")?></div>
		</div>
			
	  	<div class="form-item">
	  	<label><?p("ID_SETUP_SHARPEN_THMB")?></label><br/>
	  	<input type="checkbox" name="p_thmb_sharp_use<?=$rec["id"]?>" <? if($rec["thmb_sharp_use"]=="true"){echo "checked";}?>><?p("ID_SETUP_SHARPEN_WITH_PARAM")?></input>&nbsp;&nbsp;&nbsp;
	  	<?p("ID_SETUP_AMOUNT");?>:<input class="form-text" size="6" name="p_thmb_sharp_amount<?=$rec["id"]?>" value="<?=$rec["thmb_sharp_amount"]?>"></input>&nbsp;&nbsp;
	  	<?p("ID_SETUP_RADIUS");?>:<input class="form-text" size="6" name="p_thmb_sharp_radius<?=$rec["id"]?>" value="<?=$rec["thmb_sharp_radius"]?>"></input>&nbsp;&nbsp;
		<div class="description"><?p("ID_SETUP_SHARPEN_DESC")?></div>
		</div>

	  	<div class="form-item">
	  	<label><?p("ID_SETUP_INFO_THMB")?></label><br/>
	  	<input type="checkbox" name="p_thmb_show_views<?=$rec["id"]?>" <? if($rec["thmb_show_views"]=="true"){echo "checked";}?>><?p("ID_SETUP_INFO_THMB_VIEWS")?></input>&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="p_thmb_show_comments<?=$rec["id"]?>" <? if($rec["thmb_show_comments"]=="true"){echo "checked";}?>><?p("ID_SETUP_INFO_THMB_COMMENTS")?></input>&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="p_thmb_show_votes<?=$rec["id"]?>" <? if($rec["thmb_show_votes"]=="true"){echo "checked";}?>><?p("ID_SETUP_INFO_THMB_VOTES")?></input>&nbsp;&nbsp;&nbsp;
		<div class="description"><?p("ID_SETUP_INFO_THMB_DESC")?></div>
		</div>

		<div class="form-item">
			  	<label><?p("ID_SETUP_QUALITY_PHOTO")?></label><br/>
				<input class="form-text" size="6" name="p_q_pics<?=$rec["id"]?>" value="<?=$rec["photo_size"]?>"/>&nbsp;/&nbsp;
				<input class="form-text" size="6" name="p_q_picq<?=$rec["id"]?>" value="<?=$rec["photo_qual"]?>"/>&nbsp;&nbsp;<input type="checkbox" name="p_q_resizeifbigger<?=$rec["id"]?>" <? if($rec["resize_if_bigger"]=="true"){echo "checked";}?>><?p("ID_SETUP_RESIZE_IF_BIGGER")?></input></br>
				<div class="description"><?p("ID_SETUP_QUALITY_PHOTO_DESC")?></div>
			</div>
			<div class="form-item">
				<label><?p("ID_SETUP_RESIZE_TO_FIT")?></label><br />
				<select name="p_resize_photo_to_fit<?=$rec["id"]?>">
					<option value="both" <?if($rec["resize_photo_to_fit"]=="both") echo "selected";?>><?p("ID_BOTH_WIDTH_AND_HEIGHT")?></option>
					<option value="width" <?if($rec["resize_photo_to_fit"]=="width") echo "selected";?>><?p("ID_WIDTH")?></option>
					<option value="height" <?if($rec["resize_photo_to_fit"]=="height") echo "selected";?>><?p("ID_HEIGHT")?></option>
				</select>
				<div class="description"><?p("ID_SETUP_RESIZE_TO_FIT_DESC")?></div>
			</div>
			<div class="form-item">
				<input type="checkbox" name="p_q_enabled<?=$rec["id"]?>" <? if($rec["enabled"]=="true"){echo "checked";}?>>Enabled</input></br>
				<input type="radio" value="<?=$rec["id"]?>" name="p_q_default" <?if($rec["default"]=="true"){echo "checked";}?>/>Default</br>
			</div>
			<div class="form-item">
				<label><?p("ID_SETUP_WATERMARK_FILE")?></label><br />
				<select name="p_watermark_file<?=$rec["id"]?>">
					<option value="" <?if($rec["watermark_file"]=="") echo "selected";?>><?p("ID_NO_WATERMARK")?></option>			
					<?
				      $dh=opendir("./");
				      while (($file = readdir($dh)) !== false) {
           					if( filetype($dir . $file)=="file" ) {
           						if(strtoupper(substr($file,-3,3))=="PNG"){?>
           							<option value="<?=$file?>" <?if($rec["watermark_file"]==$file) echo "selected";?>><?=$file?></option>			
	       			<?			}
           					}
				      }
					?>					
				</select>
			<div class="description"><?p("ID_SETUP_WATERMARK_FILE_DESC")?></div>
			</div>

			<div class="form-item">
				<label><?p("ID_SETUP_WATERMARK_POSITION")?></label><br />
				<table cellpadding="5" bgcolor="#eeeeee" style="border-style: solid; border-width=2; border-color: #888888;">
					<tr>
						<td> 
							<input type="radio" name="p_watermark_position<?=$rec["id"]?>" value="LU" <?if($rec["watermark_position"]=="LU") echo "checked";?>/>
						</td>
						<td> 
							<input type="radio" name="p_watermark_position<?=$rec["id"]?>" value="U" <?if($rec["watermark_position"]=="U") echo "checked";?>/>
						</td>
						<td> 
							<input type="radio" name="p_watermark_position<?=$rec["id"]?>" value="RU" <?if($rec["watermark_position"]=="RU") echo "checked";?>/>
						</td>
					</tr>
					<tr>
						<td> 
							<input type="radio" name="p_watermark_position<?=$rec["id"]?>" value="L" <?if($rec["watermark_position"]=="L") echo "checked";?>/>
						</td>
						<td> 
							<input type="radio" name="p_watermark_position<?=$rec["id"]?>" value="C" <?if($rec["watermark_position"]=="C") echo "checked";?>/>
						</td>
						<td> 
							<input type="radio" name="p_watermark_position<?=$rec["id"]?>" value="R" <?if($rec["watermark_position"]=="R") echo "checked";?>/>
						</td>
					</tr>
					<tr>
						<td> 
							<input type="radio" name="p_watermark_position<?=$rec["id"]?>" value="LD" <?if($rec["watermark_position"]=="LD") echo "checked";?>/>
						</td>
						<td> 
							<input type="radio" name="p_watermark_position<?=$rec["id"]?>" value="D" <?if($rec["watermark_position"]=="D") echo "checked";?>/>
						</td>
						<td> 
							<input type="radio" name="p_watermark_position<?=$rec["id"]?>" value="RD" <?if($rec["watermark_position"]=="RD") echo "checked";?>/>
						</td>
					</tr>
				</table>
				
				<div class="description"><?p("ID_SETUP_WATERMARK_POSITION_DESC")?></div>
			</div>

			
		 </div>
	 </fieldset>
<?}?>

<input type="hidden" name="cmd" value="setup"/>
<input type="hidden" name="var1" value="thumbnails"/>
<input type="hidden" name="var2" value="save"/>
<input type="submit" class="form-submit" value="<?p("ID_SETUP_SAVE_CONFIG")?>"  />
<input type="reset" class="form-submit" value="<?p("ID_SETUP_RESET_CONFIG")?>"  />
</form>
</td></tr>
</table>       

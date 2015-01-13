<table><tr><td><h6><?p("ID_SETUP_MENU_CACHE");?></h6>
</td></tr>
<tr><td>
<form name="main_setup" action="main.php" method="post">
<div class="description"><?p("ID_SETUP_DESC_CACHE")?></div>
</br>

<fieldset><legend><?p("ID_SETUP_MENU_CACHE")?></legend><div class="form-item">
	
	<div class="form-item">
		<input type="checkbox" name="p_cache_thumbnails" <? if($pa_setup["cache_thumbnails"]=="true"){echo "checked";}?>></input><label><?p("ID_SETUP_CACHE_THUMBNAILS")?></label></br>
		<div class="description"><?p("ID_SETUP_CACHE_THUMBNAILS_DESC")?></div>
	</div>

	<div class="form-item">
		<input type="checkbox" name="p_cache_resized_photos" <? if($pa_setup["cache_resized_photos"]=="true"){echo "checked";}?>></input><label><?p("ID_SETUP_CACHE_RESIZED_PHOTOS")?></label></br>
		<div class="description"><?p("ID_SETUP_CACHE_RESIZED_PHOTOS_DESC")?></div>
	</div>
	
</div>
</fieldset>




<input type="hidden" name="cmd" value="setup"/>
<input type="hidden" name="var1" value="cache"/>
<input type="hidden" name="var2" value="save"/>
<input type="submit" class="form-submit" value="<?p("ID_SETUP_SAVE_CONFIG")?>"  />
<input type="reset" class="form-submit" value="<?p("ID_SETUP_RESET_CONFIG")?>"  />
</form>
</td></tr>
<tr><td><a class="me" href="main.php?cmd=setup&var1=cache&var2=delete">Delete the Cache (Used space:&nbsp;<?=round(get_dir_size($pa_setup["cache_dir"])/1024/1024,0)?>&nbsp;MB)</a></td></tr>
</table>       

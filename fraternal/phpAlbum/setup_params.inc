<table><tr><td><h6><?p("ID_SETUP_MENU_PARAMS");?></h6>
</td></tr>
<tr><td>
<div class="description"><?p("ID_SETUP_DESC_PARAMS")?></div>
<?
   if(is_array($errors)){
   	echo "<br/>";
   	foreach($errors as $err){
   		print_error($err);	
	}
   }
?>
	<div class="form-item">
	<form action="main.php?cmd=setup&var1=params&var2=add" method="post">
		<table cellpadding="5">
	  	  <tr><td><label><?p("ID_NAME")?></label></td><td><input size=30 value=""  class="form-text<?=$err_name?>" name="p_name"/></td></tr>
	  	  <tr><td><label><?p("ID_TYPE")?></label></td><td>
	  	  	<SELECT name="p_type"/>
	  	  	<?
				$rec=db_select_all("photo_param_type");
				foreach($rec as $type){
					$pdesc[$type["name"]]=$type["desc"]; // for the list of params below
			?>

	  	  		<OPTION value="<?=$type["name"]?>"><?=$type["desc"]?></OPTION>
	  	  	<? } ?>
	  	  	</SELECT></td></tr>
	  	  <tr><td colspan="2"><input type="submit" value="<?p("ID_SETUP_ADD_NEW_PARAM")?>"/></td></tr>
	  	  </table>
	  	  <div class="description"><?p("ID_SETUP_ADD_PARAM_DESC")?></div>
	</form>
	</div>

<form action="main.php?cmd=setup&var1=params&var2=save" method="post">
<?
	$rec=db_select_all("photo_param");
	$cnt=0;
	foreach($rec as $param){
	$cnt++;
	$syslov=Array("dim"=>"Picture dimensions",
				  "siz"=>"File size in KB",
				  "cdt"=>"Creation date of picture",
				  "fnm"=>"Filename",
				  "fnl"=>"Filename with fullsize download link",
				  "dwl"=>"Fullsize download link",
				  "exif_iso"=>"EXIF - ISO Setting",
				  "exif_exp_time"=>"EXIF - Exposure time",
				  "exif_f"=>"EXIF - Aperture setting",
				  "exif_fl"=>"EXIF - Focal Length",
				  "exif_model"=>"EXIF - Camera model",
				  "exif_datetime"=>"EXIF - Date/Time",
				  "iptc_caption"=>"IPTC Caption",
				  "iptc_caption_writer"=>"IPTC Caption Writer",
				  "iptc_headline"=>"IPTC Headline",
				  "iptc_spec_ins"=>"IPTC Special Instructions",
				  "iptc_byline"=>"IPTC Byline",
				  "iptc_byline_title"=>"IPTC Byline Title",
				  "iptc_credits"=>"IPTC Credits",
				  "iptc_source"=>"IPTC Source",
				  "iptc_object_name"=>"IPTC Object Name",
				  "iptc_date"=>"IPTC Date",
				  "iptc_city"=>"IPTC City",
				  "iptc_subloc"=>"IPTC Sublocation",
				  "iptc_state"=>"IPTC Province/State",
				  "iptc_country"=>"IPTC Country",
				  "iptc_otr"=>"IPTC Original Transmission Reference",
				  "iptc_category"=>"IPTC Category",
				  "iptc_subcategory"=>"IPTC Subcategory",
				  "iptc_priority"=>"IPTC Priority/Urgency (1-9)",
				  "iptc_keyword"=>"IPTC Keywords",
				  "iptc_copyright"=>"IPTC Copyright",
				  
			);
?>
<fieldset><legend><b><?=($param["name"]."</b> - ".$pdesc[$param["type"]])?></legend><div class="form-item">
	<!-- name -->
	<div class="form-item">
					<label><?p("ID_SETUP_PARAM_NAME")?></label><br />
					<input class="form-text" name="p_name<?=$cnt?>" value="<?=$param["name"]?>"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="main.php?cmd=setup&var1=params&var2=del&var3=<?=$param["id"]?>" class="red"><img border="0" src="res/red_x.png" /><?p("ID_SETUP_DELETE_PARAM")?></a>
					<div class="description"><?p("ID_SETUP_PARAM_NAME_DESC")?></div>
	</div>
	<!-- default -->
	<?if($param["type"]=="user"){?>
		<div class="form-item">
				<label><?p("ID_SETUP_PARAM_DEFAULT")?></label><br />
				<input class="form-text" name="p_default<?=$cnt?>" value="<?=prepit($param["default"])?>"/>
				<input type="checkbox" name="p_allow_html<?=$cnt?>" <?if($param["allow_html"]=="true"){echo "checked";}?>><?=p("ID_ALLOW_HTML")?></input>
				<div class="description"><?p("ID_SETUP_PARAM_DEFAULT_DESC")?></div>
		</div>
	<?}?>
	<?if($param["type"]=="system"){?>
		<div class="form-item">
				<label><?p("ID_SETUP_PARAM_SYS_DEFAULT")?></label><br/>
				<SELECT name="p_default_lov<?=$cnt?>">
					<? foreach($syslov as $id=>$desc){ ?>
						<OPTION value="<?=$id?>" <?if($id==$param["default_lov"]){echo "selected";}?>><?=$desc?></OPTION>
					<?}?>
				</SELECT>
				<div class="description"><?p("ID_SETUP_PARAM_SYS_DEFAULT_DESC")?></div>
		</div>
	<?}?>
	<?if($param["type"]=="userlov"){?>
		<div class="form-item">
				<label><?p("ID_SETUP_PARAM_DEFAULT")?></label><br/>
					<SELECT name="p_default_lov<?=$cnt?>">
						<OPTION value="-1" <?if( $param["default_lov"]==-1){echo "selected";}?>><?p("ID_NOT_DEFINED")?></OPTION>
						<?if(is_array($param["lov"])){?>
							<? foreach($param["lov"] as $id=>$desc){ ?>
								<OPTION value="<?=$id?>" <?if($id==$param["default_lov"]){echo "selected";}?>><?=$desc?></OPTION>
							<?}?>
						<?}?>
					</SELECT>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="main.php?cmd=setup&var1=params&var2=edit&var3=<?=$param["id"]?>"><?p("ID_SETUP_EDIT_LOV")?></a>
				<div class="description"><?p("ID_SETUP_PARAM_SYS_DEFAULT_DESC")?></div>
		</div>
		<?if( ( $var2=="edit" && $var3==$param["id"]) || $_POST["p_lov_edit"]==$param["id"] || ($var2=="dellov" && $var3==$param["id"])){?>	
			<input type="hidden" name="p_lov_edit" value="<?=$param["id"]?>"/>
			<?if(is_array($param["lov"])){
				foreach($param["lov"] as $key=>$value){?>
					<input size="40" class="form-text" name="p_lov_value_<?=$key?>" value="<?=prepit($value)?>"/> &nbsp;&nbsp;<a href="main.php?cmd=setup&var1=params&var2=dellov&var3=<?=$param["id"]?>&var4=<?=$key?>" class="red"><?p("ID_SETUP_DELETE_LOV")?></a>					
					<br/>
			<?  } 
			  }?>
			<input class="form-text" size="40" name="p_lov_new" value=""/>&nbsp;&nbsp;<input type="submit" value="<?p("ID_ADD_NEW_VALUE")?>"  />					
		<?}?>
	<?}?>
	<div class="form-item">
		<input type="checkbox" name="p_default_displayed<?=$cnt?>" <?if($param["default_displayed"]=="true"){echo "checked";}?>><b><?=p("ID_DEFAULT_DISPLAYED")?></b></input>
		<div class="description"><?p("ID_SETUP_PARAM_DEFAULT_DISPLAYED_DESC")?></div>
	</div>
	<input type="hidden" name="p_id<?=$cnt?>" value="<?=$param["id"]?>"/>
</div>
</fieldset>
<?}?>
<input type="submit" class="form-submit" value="<?p("ID_SETUP_SAVE_CONFIG")?>"  />
<input type="reset" class="form-submit" value="<?p("ID_SETUP_RESET_CONFIG")?>"  />

</form>
</td></tr>
</table>       

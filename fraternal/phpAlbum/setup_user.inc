<?//var_dump($_POST);?>
<table><tr><td><h6><?p("ID_SETUP_MY_ACCOUNT");?></h6>
</td></tr>
<tr><td>
<form name="main_setup" action="main.php" method="post">
<div class="description"><?p("ID_SETUP_MY_ACCOUNT_DESC")?></div>
<fieldset><legend><?p("ID_SETUP_MY_ACCOUNT")?></legend><div class="form-item">
<!-- checking the form -->

<?
   if(is_array($errors)){
   	foreach($errors as $err){
   		print_error($err);	
	}
   }
?>
<?
	if(isset($var4) && isset($pa_user["groups"]["superuser"])){
		$rec=db_select_all("user","name=='".$var4."'");
		$pa_user=$rec[0];
	}
	if($var3=="register" && $pa_user["name"]="guest"){
		$pa_user["name"]="";
	}
?>
<?if($message){?>
<div class="form-item">
<font size="5" color="#008800"><?=$message?></font>
</div>
<?}?>

<!-- album_dir -->
<div class="form-item">
<label><?p("ID_USERNAME")?></label></br>
<input name="p_username_f" size="10" class="form-text<?=$err_name?>" value="<?=$pa_user["name"]?>">
<div class="description"><?p("ID_SETUP_USERNAME_DESC")?></div>
</div>

<div class="form-item">
<table cellspacing="0" cellpadding="0"><tr>
<td><label><?p("ID_PASSWORD")?></label></br>
<input type="password" name="p_password_f" size="15" class="form-text<?=$err_pass?>" value=""></td>
<td>&nbsp;&nbsp;&nbsp;</td><td><label><?p("ID_RETYPE_PASSWORD")?></label><br />
<input type="password" name="p_retype_password_f" size="15" class="form-text<?=$err_pass?>" value="">
</td>
</tr></table>
<div class="description"><?p("ID_SETUP_PASSWORD_DESC")?></div>
</div>


<div class="form-item">
<label><?p("ID_SETUP_EMAIL")?></label></br>
<input name="p_email_f" size="20" class="form-text<?=$err_email?>" value="<?=$pa_user["email"]?>">
<div class="description"><?p("ID_SETUP_EMAIL_DESC")?></div>
</div>

<div class="form-item">
<label><?p("ID_SETUP_HOMEPAGE")?></label></br>
<input name="p_homepage_f" size="20" class="form-text<?=$err_hp?>" value="<?=$pa_user["homepage"]?>">
<div class="description"><?p("ID_SETUP_HOMEPAGE_DESC")?></div>
</div>
<?if($superuser){?>
<div class="form-item">
<label><?p("ID_SETUP_MENU_GROUPS")?></label><br/>
<? $rec=db_select_all("group");
   $cnt=0;
   foreach($rec as $group){
   $cnt++;	
?>
	  <input type="checkbox" name="p_group<?=$cnt?>" value="<?=$group["name"]?>" <?if(isset($pa_user["groups"][$group["name"]])){echo "checked";}?>><?=$group["name"]?></input><br/>
<?   }?>
<div class="description"><?p("ID_SETUP_ACCOUNT_GROUP_DESC")?></div>
</div>
<?}?>

</div>
</fieldset>
<input type="hidden" name="p_userid_f" value="<?=$pa_user["id"]?>"/>
<input type="hidden" name="cmd" value="setup"/>
<input type="hidden" name="var1" value="user"/>
<? if ($var2=="register" || $var2=="insert") {?>
<input type="hidden" name="var2" value="insert"/>
<input type="submit" class="form-submit" value="<?p("ID_SETUP_REGISTER_NEW_USER")?>"  />
<input type="reset" class="form-submit" value="<?p("ID_SETUP_RESET_CONFIG")?>"  />
<?}else{?>
<?if($var3>0){?>
<input type="hidden" name="var3" value="<?=$var3?>"/>
<?}?>
<input type="hidden" name="var2" value="update"/>
<input type="submit" class="form-submit" value="<?p("ID_SETUP_SAVE_CONFIG")?>"  />
<input type="reset" class="form-submit" value="<?p("ID_SETUP_RESET_CONFIG")?>"  />
<?}?>
</form>
</td></tr>
</table>       

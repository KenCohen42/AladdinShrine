<table><tr><td><h6><?p("ID_SETUP_MENU_GROUPS");?></h6>
</td></tr>
<tr><td>
<div class="description"><?p("ID_SETUP_DESC_GROUPS")?></div>
<fieldset><legend><?p("ID_SETUP_MENU_GROUPS")?></legend><div class="form-item">
<?
   if(is_array($errors)){
   	foreach($errors as $err){
   		print_error($err);	
	}
   }
?>
<form name="main_setup" action="main.php" method="post">
<input type="hidden" name="cmd" value="setup"/>
<input type="hidden" name="var1" value="groups"/>
<input type="hidden" name="var2" value="add"/>
<label><?p("ID_SETUP_NEW_GROUP_NAME")?></label><br/>
<table><tr>
<td valign="top"><input class="from-text<?=$err_group?>" name="p_new_group_name" value="<?=$new_group?>" /></td>
<td valign="top"><input type="submit"  value="<?p("ID_SETUP_ADD_GROUP")?>"  /></td>
</tr></table>
<div class="description"><?p("ID_SETUP_ADD_GROUP_DESC")?></div>
</form>
<br/>
<form method="POST">
<input type="hidden" name="cmd" value="setup"/>
<input type="hidden" name="var1" value="groups"/>
<input type="hidden" name="var2" value="save"/>
<table width="100%" cellpadding="2" cellspacing="0" style="border: 1px solid #aaa;">
<tr bgcolor="#dddddd">
	<td><?p("ID_GROUP")?></td>
	<td style="border-left: 1px solid #aaa;" align="left"><?p("ID_SETUP_PRIVILEGES")?></td>
	<td style="border-left: 1px solid #aaa;" align="left"><?p("ID_DEFAULT")?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_SETUP_SHOW_DIRS")?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_SETUP_SHOW_USERS")?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_DELETE")?></td>
</tr>

<?
	$rec=db_select_all("group");
	$row=1;
	$cnt=1;
	foreach($rec as $group){
		if($row==1){
			echo "<tr bgcolor=\"#FFFFFF\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\">";
			$row=2;
		}else{
			echo "<tr bgcolor=\"#EEEEEE\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\">";
			$row=1;
		}
?>
	
	
	<td><?=$group["name"]?></td>
	<td style="border-left: 1px solid #aaa;" align="left">
		<?if($group["name"]=="superuser"){$disabled="disabled";}else{$disabled="";}?>
		<?$menus=Array("main"=>t("ID_SETUP_MENU_MAIN"),
		   "themes"=>t("ID_SETUP_MENU_THEMES"),
		   "thumbnails"=>t("ID_SETUP_MENU_THUMBNAILS"),
			 "dirs"=>t("ID_SETUP_MENU_DIRS"),
			 "pics"=>t("ID_SETUP_MENU_PICS"),
			 "params"=>t("ID_SETUP_MENU_PARAMS"),
			 "users"=>t("ID_SETUP_MENU_USERS"),
			 "groups"=>t("ID_SETUP_MENU_GROUPS"),
			 "admin"=>t("ID_SETUP_MENU_ADMIN"),
			 "comments"=>t("ID_SETUP_MENU_COMMENTS"),
			 "ecard"=>t("ID_SETUP_MENU_ECARD"),
			 "texts"=>t("ID_SETUP_MENU_TEXTS"),
			 "cache"=>t("ID_SETUP_MENU_CACHE"),
			 "logs"=>t("ID_SETUP_MENU_LOGS"),
			 "errorlog"=>t("ID_SETUP_MENU_ERRORLOG"),
			 "syscheck"=>t("ID_SETUP_MENU_SYSCHECK"),
			 "imageorig"=>t("ID_IMAGEORIG"),
			 "imageview"=>t("ID_IMAGEVIEW")
			 )?>
		 <? foreach($menus as $key => $value){?>
		 	<? if (isset($group["grants"][$key])){?>
		 		<table width="150" style="float: left"><tr><td nowrap><a class="green" href="main.php?cmd=setup&var1=groups&var2=revoke&var3=<?=$group["name"]?>&var4=<?=$key?>"><?=$value?>&nbsp;&nbsp;</td></tr></table>
		 	<?}else{?>
		 		<table width="150" style="float: left"><tr><td nowrap><a class="red" href="main.php?cmd=setup&var1=groups&var2=grant&var3=<?=$group["name"]?>&var4=<?=$key?>"><?=$value?>&nbsp;&nbsp;</td></tr></table>
		 	<?}?>
		 <?}?>
			 
	</td>
	<td style="border-left: 1px solid #aaa;" align="center"><input name="p_default<?=$cnt?>" value="<?=$group["name"]?>" type="checkbox" <?if($group["default"]=="true"){echo "checked";}?>/>&nbsp;</td>
	<td style="border-left: 1px solid #aaa;" align="center"><a href="main.php?cmd=setup&var1=groups&var2=show_dirs&var3=<?=$group["name"]?>"><?p("ID_SETUP_SHOW_DIRS")?></a></td>
	<td style="border-left: 1px solid #aaa;" align="center"><a href="main.php?cmd=setup&var1=groups&var2=show_users&var3=<?=$group["name"]?>"><?p("ID_SETUP_SHOW_USERS")?></a></td>
	<?if($group["name"]=="superuser" || $group["name"]=="guest"){?>
	 	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_NOT_POSSIBLE")?></td>
	<?}else{?>
		<td style="border-left: 1px solid #aaa;" align="center"><a class="red" href="main.php?cmd=setup&var1=groups&var2=delete&var3=<?=urlencode($group["name"])?>"><?p("ID_DELETE")?></a></td>
	<?}?>
	</tr>
<?		
	$cnt++;
	}
?>
</table>
<div class="description"><?p("ID_SETUP_PRIVILEGES_DESC")?></div>
<input type="submit" class="form-submit" value="<?p("ID_SETUP_SAVE_CONFIG")?>"  />
<input type="reset" class="form-submit" value="<?p("ID_SETUP_RESET_CONFIG")?>"  />
</form>
</br>
<? if ($var2=='show_users'){?>
<table width="100%" cellpadding="2" cellspacing="0" style="border: 1px solid #aaa;">
<tr bgcolor="#dddddd">
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_NAME")?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_EMAIL")?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_SETUP_HOMEPAGE")?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_EDIT")?></td>
</tr>
<?
	$rec=db_select_all("user","isset(groups['".prepdb($var3)."'])");
	$row=1;
	foreach($rec as $record){
		if($row==1){
			echo "<tr bgcolor=\"#FFFFFF\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\">";
			$row=2;
		}else{
			echo "<tr bgcolor=\"#EEEEEE\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\">";
			$row=1;
		}
?>
	
	
	<td><?=$record["name"]?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?=$record["email"]?>&nbsp;</td>
	<td style="border-left: 1px solid #aaa;" align="center"><?=$record["homepage"]?>&nbsp;</td>
	<td style="border-left: 1px solid #aaa;" align="center"><a class="green" href="main.php?cmd=setup&var1=user&var2=edit&var3=<?=urlencode($record["name"])?>"><?p("ID_EDIT")?></a></td>
	</tr>
<?		
	}
?>
</table>
<?} //end show usesrs?>

<? if ($var2=='show_dirs'){?>
<table width="100%" cellpadding="2" cellspacing="0" style="border: 1px solid #aaa;">
<tr bgcolor="#dddddd">
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_PATH")?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_ALIAS")?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_EDIT")?></td>
</tr>
<?
	$rec=db_select_all("directory","isset(groups['".prepdb($var3)."'])");
	$row=1;
	foreach($rec as $record){
		if($row==1){
			echo "<tr bgcolor=\"#FFFFFF\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\">";
			$row=2;
		}else{
			echo "<tr bgcolor=\"#EEEEEE\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\">";
			$row=1;
		}
?>
	
	
	<td>&nbsp;&nbsp;<?=$record["path"]?>&nbsp;&nbsp;</td>
	<td style="border-left: 1px solid #aaa;" align="center"><?=$record["alias"]?>&nbsp;</td>
	<td style="border-left: 1px solid #aaa;" align="center">
		&nbsp;&nbsp;<a class="green" href="main.php?cmd=setup&var1=dirs&var2=chdir&var3=<?=urlencode($record["seq_files"])?>"><?p("ID_SETUP_MENU_DIRS")?></a>&nbsp;&nbsp;
		<a class="green" href="main.php?cmd=setup&var1=pics&var2=chdir&var3=<?=urlencode($record["seq_files"])?>"><?p("ID_SETUP_MENU_PICS")?></a>&nbsp;&nbsp;
	</td>
	</tr>
<?		
	}
?>
</table>
<?} //end show galleries?>
</div>
</fieldset>
</td></tr>
</table>       

<table><tr><td><h6><?p("ID_SETUP_MENU_USERS");?></h6>
</td></tr>
<tr><td>
<div class="description"><?p("ID_SETUP_DESC_USERS")?></div>
<fieldset><legend><?p("ID_SETUP_MENU_USERS")?></legend><div class="form-item">
<table width="100%" cellpadding="2" cellspacing="0" style="border: 1px solid #aaa;">
<tr bgcolor="#dddddd">
	<td><?p("ID_ID")?></td>
	<td style="border-left: 1px solid #aaa;"><?p("ID_USERNAME")?></td>
	<td style="border-left: 1px solid #aaa;"><?p("ID_EMAIL")?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_EDIT")?></td>
	<td style="border-left: 1px solid #aaa;" align="center"><?p("ID_DELETE")?></td>
</tr>
<?
	$rec=db_select_all("user");
	$row=1;
	foreach($rec as $user){
		if($row==1){
			echo "<tr bgcolor=\"#FFFFFF\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\">";
			$row=2;
		}else{
			echo "<tr bgcolor=\"#EEEEEE\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\">";
			$row=1;
		}
?>
	
	
	<td><?=$user["id"]?></td>
	<td style="border-left: 1px solid #aaa;"><?=$user["name"]?></td>
	<td style="border-left: 1px solid #aaa;"><?=$user["email"]?>&nbsp;</td>
	<td style="border-left: 1px solid #aaa;" align="center"><a href="main.php?cmd=setup&var1=user&var3=<?=$user["id"]?>"><?p("ID_EDIT")?></a></td>
	<?if(isset($user["groups"]["superuser"])){?>
	    <td style="border-left: 1px solid #aaa;" align="center"><?p("ID_NOT_POSSIBLE")?></td>
	<?}else{?>
	    <td style="border-left: 1px solid #aaa;" align="center"><a class="red" href="main.php?cmd=setup&var1=users&var2=delete&var3=<?=$user["id"]?>"><?p("ID_DELETE")?></a></td>
	<?}?>
	</tr>
<?		
	}
?>
</table>
</div>
</fieldset>
</td></tr>
</table>       

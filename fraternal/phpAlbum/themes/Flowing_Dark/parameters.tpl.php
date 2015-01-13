<table class="menu" style="border:1px solid" cellpadding="2" cellspacing="0">
	<tr><td style="border:1px solid" colspan="2"><b><?p("ID_PHOTO_DETAILS");?></b></td></tr>
	<? foreach($params as $name => $value){?>
		<tr><td style="border:1px solid" width="25%" align="left">&nbsp;<?=$name?>&nbsp;</td>
		<td style="border:1px solid">&nbsp;&nbsp;&nbsp;<b><?=$value?></b></td></tr>
	<?}?>
</table>
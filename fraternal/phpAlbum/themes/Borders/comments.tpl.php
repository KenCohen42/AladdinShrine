<table width="100%" cellspacing="0">
<?   if($adding_comment){ ?>
			<!-- dialog for adding comment-->
			<a name="COMMENT"/>
			<tr><td  colspan="2" align="left">
				 <form method="post" action="<?=$post_comment_link?>">
				 <table >
				  <tr><td colspan="2"><?p("ID_NAME_EMAIL");?></td></tr>
				  <tr><td colspan="2"><?p("ID_NAME");?><input name="p_name" size="25" value="<?=$comment_name?>"/>&nbsp;&nbsp;<?p("ID_EMAIL");?>
				  	<input name="p_email" size="30" value="<?=$comment_email?>"/><td></tr>
				  <? if($antispam_enabled){?> 
				  	<tr><td nowrap><?p("ID_ENTER_ANTISPAM_CODE")?>&nbsp;&nbsp;<input name="p_code_enter" size="10"/><input type="hidden" name="p_code_seq" value="<?=$code_seq?>"/></td><td align="left" width="100%"><IMG border="1" src="<?print $code_image?>"/></td></tr>
				  <?}?>
				 	<tr><td colspan="2"><?p("ID_COMMENT_INSTR");?></td></tr>
				  <tr><td colspan="2"><textarea name="p_text" cols="70" rows="6"></textarea>
				  <tr><td colspan="2"><input type="submit" value="<?p("ID_ADD_COMMENT");?>"/></td>
				 </table>
			</td></tr>
<?   } ?>
<?   if(is_array($messages)){?>
		<br/><br/>
				<?foreach($messages as $comment){ ?>
	  			<tr><td><a href="mailto:<?=$comment['email']?>" class="me"><?=$comment['name']?></a></td><td nowrap width="100%" align="right">
	  				<? if ($delete_comment_link){?>
	  					<a class="me" href="<?=$delete_comment_link.$comment['id']?>"><?p("ID_DELETE_COMMENT");?></a>&nbsp;&nbsp;&nbsp;
	  			  <?}?>
	  			  <font class="desc"><?=date($pa_setup["date_format"],$comment['time'])?></font></td></tr>
	  		  <tr><td class="boxbody" colspan="2"><?=$comment['text']?></td></tr>
		      <tr height="10"><td colspan="2"></td></tr>
<?      } ?>
<?   } ?>
</table>


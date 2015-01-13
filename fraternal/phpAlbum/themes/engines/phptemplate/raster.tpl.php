<table>
	<? foreach($thumbnails as $thmb_row) { ?>
	  <tr>
	    <? foreach($thmb_row as $th) { ?>
	       <td><? print $th; ?></td>
	    <? } ?>
	  </tr>
       <? } ?>
</table>

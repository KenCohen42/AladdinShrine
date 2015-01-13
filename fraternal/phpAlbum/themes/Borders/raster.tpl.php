  <table>
	<? foreach($thumbnails as $thmb_row) { ?>
	  <tr>
	    <? foreach($thmb_row as $th) { ?>
	       <td align="center" valign="center"><? print $th; ?></td>
	    <? } ?>
	  </tr>
       <? } ?>
  </table>

	<script type="text/javascript">
//	  alert("running script");
	  var galleryarray = new Array();
	  galleryarray[0] = "image00.jpg";
	  galleryarray[1] = "image01.jpg";
	  galleryarray[2] = "image02.jpg";
	  galleryarray[3] = "image03.jpg";
	  galleryarray[4] = "image04.jpg";
	  galleryarray[5] = "image05.jpg";
	  galleryarray[6] = "image06.jpg";
	  galleryarray[7] = "image07.jpg";
	  galleryarray[8] = "image08.jpg";
	  galleryarray[9] = "image09.jpg";
	  galleryarray[10] = "image10.jpg";
	  galleryarray[11] = "image11.jpg";
	  galleryarray[12] = "image12.jpg";
	  galleryarray[13] = "image13.jpg";
	  galleryarray[14] = "image14.jpg";
	  galleryarray[15] = "image15.jpg";
	  galleryarray[16] = "image16.jpg";
	  galleryarray[17] = "image17.jpg";
	  galleryarray[18] = "image18.jpg";
	  galleryarray[19] = "image19.jpg";
	  galleryarray[20] = "image20.jpg";
	  galleryarray[21] = "image21.jpg";
	  galleryarray[22] = "image22.jpg";
	  galleryarray[23] = "image23.jpg";
	  galleryarray[24] = "image24.jpg";
	  galleryarray[25] = "image25.jpg";
	  galleryarray[26] = "image26.jpg";
	  galleryarray[27] = "image27.jpg";
	  galleryarray[28] = "image28.jpg";
	  galleryarray[29] = "image29.jpg";
	  galleryarray[30] = "image30.jpg";
	  galleryarray[31] = "image31.jpg";
	  galleryarray[32] = "image32.jpg";
	  galleryarray[33] = "image33.jpg";
	  galleryarray[34] = "image34.jpg";
	  galleryarray[35] = "image35.jpg";
	  galleryarray[36] = "image36.jpg";
	  galleryarray[37] = "image37.jpg";
	  galleryarray[38] = "image38.jpg";
	  galleryarray[39] = "image39.jpg";
	  galleryarray[40] = "image40.jpg";
	  galleryarray[41] = "image41.jpg";
	  galleryarray[42] = "image42.jpg";
	  galleryarray[43] = "image43.jpg";
	  var curimg=0;
	  function rotateImages(){
	     document.getElementById("slideshow").setAttribute("src", "images/ActiveSlideShow/grovecity/"+galleryarray[curimg]);
		 curimg = (curimg<galleryarray.length-1)?curimg+1:0;
	  }
	  window.onload=
	    function(){
		  setInterval("rotateImages()", 3500);
		}
	</script>
<table width="100%">
  <tr>
    <td align="center" colspan="2">
	  <h1>Our Grove City Location (under construction)</h1>
	  <img id="slideshow" src="images/ActiveSlideShow/grovecity/image00.jpg" width="600">
	</td>
  </tr>
  <tr>
    <td></td>
	<td><img src="images/PhotoClub.jpg" alt="Photo Club" width="200"><br>
	    Images courtesy of the Aladdin Photo Club
	</td>
  </tr>
  <tr>
    <td>
       <a href="http://aladdinshrine.org/phpAlbum/main.php?cmd=album&var1=GroveCity/">View the pictures in an album</a>
	</td>
  </tr>
  

</table>
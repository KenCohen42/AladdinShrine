	<script type="text/javascript">
//	  alert("running script");
	  var galleryarray = new Array();
	  galleryarray[0] = "image0.jpg";
	  galleryarray[1] = "image1.jpg";
	  galleryarray[2] = "image2.jpg";
	  galleryarray[3] = "image3.jpg";
	  galleryarray[4] = "image4.jpg";
	  galleryarray[5] = "image5.jpg";
	  galleryarray[6] = "image6.jpg";
	  var curimg=0;
	  function rotateImages(){
	     document.getElementById("slideshow").setAttribute("src", "images/ActiveSlideShow/grovecity/"+galleryarray[curimg]);
		 curimg = (curimg<galleryarray.length-1)?curimg+1:0;
	  }
	  window.onload=
	    function(){
		  setInterval("rotateImages()", 2500);
		}
	</script>
<table width="100%">
  <tr>
    <td align="center" colspan="2">
	  <h1>Our Grove City Location (under construction)</h1>
	  <img id="slideshow" src="images/ActiveSlideShow/grovecity/image0.jpg" width="600">
	</td>
  </tr>
  <tr>
    <td></td>
	<td><img src="images/PhotoClub.jpg" alt="Photo Club" width="200"><br>
	    Images courtesy of the Aladdin Photo Club
	</td>
  </tr>
  

</table>
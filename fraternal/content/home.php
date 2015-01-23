	<script type="text/javascript">
//	  alert("running script");
	  var galleryarray = new Array();
	  galleryarray[0] = "slide0.jpg";
	  galleryarray[1] = "slide1.jpg";
	  galleryarray[2] = "slide2.jpg";
	  galleryarray[3] = "slide3.jpg";
	  var curimg=0;
	  function rotateImages(){
	     document.getElementById("slideshow").setAttribute("src", "images/ActiveSlideShow/home/"+galleryarray[curimg]);
		 curimg = (curimg<galleryarray.length-1)?curimg+1:0;
	  }
	  window.onload=
	    function(){
		  setInterval("rotateImages()", 2500);
		}
	</script>
<table width="100%">
  <tr>
    <td align="center">
	  <img id="slideshow" src="images/ActiveSlideShow/home/slide0.jpg" width="600">
	</td>
  </tr>

  <tr>
    <td align="center">
	  <hr>
	  <img src="images/BuildingPicture.jpg" width="200"><br/>
	  <a href="directions.php">Directions to Aladdin Shrine</a>     
    </td>
  </tr>
  <tr>
    <td><a href="http://smile.amazon.com/ch/31-6027695"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSeEfb6WgESNqwijfaNcXoZfchXDvjlxf204iNbfAWTt8OxIScspR607Yo" alt="Amazon Smile"><br/>
	Now: use Amazon Smiles to support ASHAC</a></td>
  </tr>
  <tr>
    <td>
	<br/><br/><hr/><br/>
	<a href="images/GMEdict20141204.pdf" target="new">Grand Master's Edict Regarding Gambling</a>
	<br/><br/><hr><br/><br/>
	<h2>Coming Events</h2>
 
      <p>
	  <hr/>
	    <!-- Facebook Badge START -->
		<br/>
		<a href="http://www.facebook.com/aladdinshrine" 
		   target="_TOP" >
		Find us on <img src="http://i48.photobucket.com/albums/f212/thahacksaw/facebook-logo.jpg" alt="facebook">
		</a>
		<br/>
<!-- Facebook Badge END -->
	  </p>
      <hr/>
      <img src="images/lamp.png"> <a href="lamps/201501.pdf"><br/>
      January Lamp Now Posted</a> </td>
  </tr>
</table>
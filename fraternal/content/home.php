	<script type="text/javascript">
//	  alert("running script");
	  var galleryarray = new Array();
	  galleryarray[0] = "slide0.jpg";
	  galleryarray[1] = "slide1.jpg";
	  galleryarray[2] = "slide2.jpg";
	  galleryarray[3] = "slide3.jpg";
	  galleryarray[4] = "slide4.jpg";
	  galleryarray[5] = "slide5.jpg";
	  galleryarray[6] = "slide6.jpg";
	  galleryarray[7] = "slide7.jpg";
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
  <br/><br/><br/>
	  <hr>
  <br/><br/><br/>
	  <img src="images/buildingSign.jpg" width="500"><br/>
	  <!--a href="directions.php">Directions to Aladdin Shrine</a-->     
    </td>
  </tr>
  <tr>
    <td><a href="http://smile.amazon.com/ch/31-6027695"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSeEfb6WgESNqwijfaNcXoZfchXDvjlxf204iNbfAWTt8OxIScspR607Yo" alt="Amazon Smile" width="100">
	&nbsp;&nbsp;Now: use Amazon Smiles to support ASHAC</a>
	<br/><br/><hr/><br/><br/>
    </td>
  </tr>
  <tr>
    <td>
	<h2>Coming Events</h2>
       &nbsp;&nbsp;<a href="parade.php">2016 Parade Schedule</a><br/><br/>
      <p>
	  <hr/>
	  <table align="center">
		<tr>
     	  <td align="center" valign="top">
         	  <a href="events/2016/20160930OglebayFull.png" target="new"><img src="events/2016/20160930OglebayThumb.png"><br/>Oglebay Resort<br/>September 30 - October 2, 2016</a> 
		  </td>
     	  <td align="center" valign="top">
         	  <a href="events/2016/20161010TrainFull.png" target="new"><img src="events/2016/20161010TrainThumb.png"><br/>Trains &amp; Parks of Colorado<br/>October 10-18, 2016</a> 
		  </td>
    	  <td align="center" valign="top">
         	  <a href="events/2016/20161014FallDanceFull.png" target="new"><img src="events/2016/20161014FallDanceThumb.png"><br/>Fall Dance<br/>October 14, 2016</a> 
		  </td>
		</tr>
		<tr>
    	  <td align="center" valign="top">
         	  <a href="events/2016/20161029HalloweenTailgateFull.png" target="new"><img src="events/2016/20161029HalloweenTailgateThumb.png"><br/>Halloween &amp; Tailgate Party<br/>October 29, 2016</a> 
		  </td>
    	  <td align="center" valign="top">
         	  <a href="events/2016/20161211KidsXmasFull.png" target="new"><img src="events/2016/20161211KidsXmasThumb.png"><br/>Children's Christmas Party<br/>December 11, 2016</a> 
		  </td>
		  <td align="center" valign="top">
         	  <a href="events/2017/20170225CostaRicaFull.png" target="new"><img src="events/2017/20170225CostaRicaThumb.png"><br/>Costa Rica Trip<br/>February 25, 2017</a> 
		  </td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td align="center" valign="top">
         	  <a href="events/2017/20170630cookbook_adFull.png" target="new"><img src="events/2017/20170630cookbook-adThumb.png"><br/>Cookbook Project<br/>Deadline June 30, 2017</a><br/><a href="cookbook.php">More details</a> 
		  </td>
		  <td>&nbsp;</td>
		</tr>
		</table>
	  <hr/>
	    <!-- Facebook Badge START -->
		<br/>
		<a href="http://www.facebook.com/aladdinshrine" 
		&nbsp;&nbsp;   target="_TOP" >
		Find us on <img src="http://i48.photobucket.com/albums/f212/thahacksaw/facebook-logo.jpg" alt="facebook">
		</a>
		<br/>
<!-- Facebook Badge END -->
	  </p>
      <hr/>
      <img src="images/lamp.png"> <a href="lamps/201609.pdf"><br/>
      September Lamp Now Posted</a> </td>
  </tr>
</table>
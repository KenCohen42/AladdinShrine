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
	  <hr>
	  <img src="images/BuildingPicture.jpg" width="200"><br/>
	  <a href="directions.php">Directions to Aladdin Shrine</a>     
    </td>
  </tr>
  <tr>
    <td align="center">
	  <br/><br/>
	  <!--a href="events.php">
	    <img src="images/events.gif"><br/>
	    Upcoming Events <br/><br/>
	  </a-->
	</td>
  </tr>
  <tr>
    &nbsp;&nbsp;<td><a href="http://smile.amazon.com/ch/31-6027695"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSeEfb6WgESNqwijfaNcXoZfchXDvjlxf204iNbfAWTt8OxIScspR607Yo" alt="Amazon Smile" width="100">
	&nbsp;&nbsp;Now: use Amazon Smiles to support ASHAC</a></td>
  </tr>
  <tr>
    <td>
	<br/><br/>
      <hr/>
	  <br><br/>
	  <h3>How is our Grove City site progressing?</h3>
	  <a href="grovecity.php"><img src="images/ActiveSlideShow/grovecity/image0.jpg" alt="Front view" width="600"><br/>
	  Click here to see more pictures</a>
	  <br/><br/>
	  <hr/>
	  <br/><br/>
	&nbsp;&nbsp;<a href="images/GMEdict20141204.pdf" target="new">Grand Master's Edict Regarding Gambling</a>
	<br/><br/><hr><br/><br/>
	<h2>Coming Events</h2>
       &nbsp;&nbsp;<a href="parade.php">2015 Parade Schedule</a><br/><br/>
      <p>
	  <hr/>
	  <table align="center">
		  <td align="center">
         	  <a href="events/2015/20151003CeremonialFull.png" target="new"><img src="events/2015/20151003CeremonialThumb.png"><br/>Fall Ceremonial<br/>October 3, 2015</a> 
		  </td>
		  <td align="center">
         	  <a href="events/2015/20151017AuctionFull.png" target="new"><img src="events/2015/20151017AuctionThumb.png"><br/>Auction<br/>October 17, 2015</a> 
		  </td>
		  <td align="center">
         	  <a href="events/2015/20151124NYCFull.png" target="new"><img src="events/2015/20151124NYCThumb.png"><br/>NYC Macy Parade<br/>November 24-28, 2015</a> 
		  </td>
		</tr>
		<tr>
		  <td align="center">
         	  <a href="events/2015/20151231MonteCarloFull.png" target="new"><img src="events/2015/20151231MonteCarloThumb.png"><br/>New Years Eve/Monte Carlo Night<br/>December 31, 2015</a> 
		  </td>
		  <td align="center">
         	  <a href="events/2016/20160317CircusFull.png" target="new"><img src="events/2016/20160317CircusThumb.png"><br/>Aladdin Shrine Circus<br/>March 17-20, 2016</a> 
		  </td>
		  <td align="center">
         	  <a href="events/2016/20160613CruiseFull.png" target="new"><img src="events/2016/20160613CruiseThumb.png"><br/>European River Cruise<br/>June 13-24, 2016</a> 
		  </td>
		  <td>&nbsp;</td>
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
      <img src="images/lamp.png"> <a href="lamps/201509.pdf"><br/>
      September Lamp Now Posted</a> </td>
  </tr>
</table>
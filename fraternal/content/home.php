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
       &nbsp;&nbsp;<!--a href="parade.php">2015 Parade Schedule</a><br/><br/-->
      <p>
	  <hr/>
	  <table align="center">
		<tr>
		  <td align="center">
         	  <a href="events/2016/20160109InstallationFull.png" target="new"><img src="events/2016/20160109InstallationThumb.png"><br/>Leadership Seminar &amp; Installation<br/>January 9, 2016</a> 
		  </td>
		  <td align="center">
         	  <a href="events/2016/20160123FootballFull.png" target="new"><img src="events/2016/20160123FootballThumb.png"><br/>East West Shrine Game<br/>January 23, 2016</a> 
		  </td>
		  <td align="center">
         	  <a href="events/2016/20160213ValentineFull.png" target="new"><img src="events/2016/20160213ValentineThumb.png"><br/>Valentines Dance<br/>February 12, 2016</a> 
		  </td>
		</tr>
		<tr>
		  <td align="center">
         	  <a href="events/2016/20160305MovieFull.png" target="new"><img src="events/2016/20160305MovieThumb.png"><br/>Family Movie Night<br/>March 5, 2016</a> 
		  </td>
		  <td align="center">
         	  <a href="events/2016/20160317CircusFull.png" target="new"><img src="events/2016/20160317CircusThumb.png"><br/>Aladdin Shrine Circus<br/>March 17-20, 2016</a> 
		  </td>
		  <td align="center">
         	  <a href="events/2016/20160410GolfFull.png" target="new"><img src="events/2016/20160410GolfThumb.png"><br/>Santee Golf <br/>April 20-14, 2016</a> 
		  </td>
		</tr>
		<tr>
		  <td align="center">
         	  <a href="events/2016/20160613CruiseFull.png" target="new"><img src="events/2016/20160613CruiseThumb.png"><br/>European River Cruise<br/>June 13-24, 2016</a> 
		  </td>
		  <td align="center">
         	  <a href="events/2016/20160703ImperialFull.png" target="new"><img src="events/2016/20160703ImperialThumb.png"><br/>Imperial Session<br/>July 3-7, 2016</a> 
		  </td>
		  <td align="center">
         	  <a href="events/2016/20161010TrainFull.png" target="new"><img src="events/2016/20161010TrainThumb.png"><br/>Trains &amp; Parks of Colorado<br/>September 10-18, 2016</a> 
		  </td>
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
      <img src="images/lamp.png"> <a href="lamps/201601.pdf"><br/>
      January Lamp Now Posted</a> </td>
  </tr>
</table>
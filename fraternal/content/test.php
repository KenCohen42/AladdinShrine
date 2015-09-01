	<script type="text/javascript">
	  //alert("running script");
// EVENT SLIDE SHOW
	  var eventarray = new Array();
	  eventarray[0] = "20150912Cornerstone.png";
	  eventarray[1] = "20150913CarShowThumb.png";
	  eventarray[2] = "20151003CeremonialThumb.png";
	  eventarray[3] = "20151017AuctionThumb.png";
	  eventarray[4] = "20151124NYCThumb.png";
	  eventarray[5] = "20151231MonteCarloThumb.png";
	  eventarray[6] = "20160613CruiseThumb.png";
	  
	  var eventlink = new Array();
	  eventlink[0] = "2015/20150912CornerstoneFull.png";
	  eventlink[1] = "2015/20150913CarShowFull.png";
	  eventlink[2] = "2015/20151003CeremonialFull.png";
	  eventlink[3] = "2015/20151017AuctionFull.png";
	  eventlink[4] = "2015/20151124NYCFull.png";
	  eventlink[5] = "2015/20151231MonteCarloFull.png";
	  eventlink[6] = "2016/20160613CruiseFull.png";
	  
	  
	  var curimg=0;
	  function rotateEventImages(){
	     document.getElementById("slideshow").setAttribute("src", "events/slides/"+eventarray[curimg]);
		 document.getElementById('eventlinks").setAttribute('href", 'events/'+eventlink[curimg]);
		 //alert ("Image = " + curimg);
		 curimg = (curimg<eventarray.length-1)?curimg+1:0;
	  }
	  window.onload=
	    function(){
		  setInterval("rotateEventImages()", 2500);
		}
	</script>

<table width="100%">
	<h2>Coming Events</h2>
	   <a id="eventlinks"  href="events/2015/20150912CornerstoneFull.png" target="new">
	  	  <img id="slideshow" src="events/slides/20150912Cornerstone.png" >
	   </a>

	  <hr/>
</table>
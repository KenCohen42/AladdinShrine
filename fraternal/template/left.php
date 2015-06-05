<style type="text/css">

.sidebarmenu ul{
margin: 0;
padding: 0;
list-style-type: none;
font: 16px;
font-family: "Arial Narrow",Arial, Verdana, Sans-Serif;
width: 210px; /* Main Menu Item widths */
border-bottom: 1px solid #ccc;
text-align: left;
text-indent: 20px;
}
 
.sidebarmenu ul li{
position: relative;
}

/* Top level menu links style */
.sidebarmenu ul li a{
display: block;
overflow: auto; /*force hasLayout in IE7 */
color: white;
text-decoration: none;
padding: 6px;
border-bottom: 1px solid #778;
border-right: 1px solid #778;
}

.sidebarmenu ul li a:link, .sidebarmenu ul li a:visited, .sidebarmenu ul li a:active{
background-color: #660000; /*background of tabs (default state)*/
}

.sidebarmenu ul li a:visited{
color: white;
}

.sidebarmenu ul li a:hover{
background-color: #990000;
}

/*Sub level menu items */
.sidebarmenu ul li ul{
position: absolute;
width: 170px; /*Sub Menu Items width */
top: 0;
visibility: hidden;
}

.sidebarmenu a.subfolderstyle{
background: url(template/right.gif) no-repeat 97% 50%;
}

 
/* Holly Hack for IE \*/
* html .sidebarmenu ul li { float: left; height: 1%; }
* html .sidebarmenu ul li a { height: 1%; }
/* End */

</style>

<script type="text/javascript">

//Nested Side Bar Menu (Mar 20th, 09)
//By Dynamic Drive: http://www.dynamicdrive.com/style/

var menuids=["sidebarmenu1"] //Enter id(s) of each Side Bar Menu's main UL, separated by commas

function initsidebarmenu(){
for (var i=0; i<menuids.length; i++){
  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
    for (var t=0; t<ultags.length; t++){
    ultags[t].parentNode.getElementsByTagName("a")[0].className+=" subfolderstyle"
  if (ultags[t].parentNode.parentNode.id==menuids[i]) //if this is a first level submenu
   ultags[t].style.left=ultags[t].parentNode.offsetWidth+"px" //dynamically position first level submenus to be width of main menu item
  else //else if this is a sub level submenu (ul)
    ultags[t].style.left=ultags[t-1].getElementsByTagName("a")[0].offsetWidth+"px" //position menu to the right of menu item that activated it
    ultags[t].parentNode.onmouseover=function(){
    this.getElementsByTagName("ul")[0].style.display="block"
    }
    ultags[t].parentNode.onmouseout=function(){
    this.getElementsByTagName("ul")[0].style.display="none"
    }
    }
  for (var t=ultags.length-1; t>-1; t--){ //loop through all sub menus again, and use "display:none" to hide menus (to prevent possible page scrollbars
  ultags[t].style.visibility="visible"
  ultags[t].style.display="none"
  }
  }
}

if (window.addEventListener)
window.addEventListener("load", initsidebarmenu, false)
else if (window.attachEvent)
window.attachEvent("onload", initsidebarmenu)

</script>

<table width="210">
  <tr>
<div class="sidebarmenu">
<ul id="sidebarmenu1">
<a href="events.php">UPCOMING FRATERNAL EVENTS</a><br/><br/>
	    <li><a href="home.php">Home</a></li>
		<li><a href="lamps.php">Aladdin's Lamp</a></li>
		<li><a href="ashac.php">ASHAC</a></li>
		<li><a href="bylaws.php">Bylaws</a></li>
		<li><a href="calendar.php">Calendar</a></li>
        <li><a href="circus.php">Circus</a></li>
		<li><a href="contact.php">Contact Us</a></li>
		<li><a href="divan.php">Divan</a></li>
		  <ul>
		    
          <li><a href="pote.php">Potentate</a></li>
			
          <li><a href="pastPotes.php">Past Potentates</a></li>
		  </ul>
		<li><a href="form.php">Forms</a></li>
        <li><a href="groups.php">Groups</a></li>
           <ul>
              
          <li><a href="clubs.php">Clubs</a></li>
		      
          <li><a href="units.php">Units</a></li>
		      
          <li><a href="ohio.php">Ohio Shrines</a></li>
		      
          <li><a href="glsa.php">Great Lakes Shrines</a></li>
		   </ul>
		<li><a href="history.php">History</a></li>
		<li><a href="http://www.shrinershospitalsforchildren.org/">Hospitals</a></li>
		<li><a href="membership.php">Membership</a></li>
        <li><a href="http://aladdinshrine.org/phpAlbum">Photos</a></li>
		<li><a href="http://aladdineventcenter.com">Rentals</a></li>
		<li><a href="http://www.shrinershq.org">Shriners International</a></li>
		<li><a href="sitemap.php">Site Map</a></li>
  </ul>
</ul>
</div>


        <br/>
		<a href="http://www.beashrinernow.com"><img src="images/button/beashrinernowcomlogo360.jpg" width="150" alt="Be A Shriner Now"></a>
        <br/>
		<br/>
		<a href="http://www.shrinersvillage.com"><img src="images/ShrinersVillage.jpg" width="150" alt="Shriners Village"></a>
		<br/>
        <br/>
	  <a href="http://aladdineventcenter.com/home.php"><img src="images/logo.png" alt="Conf Center" width="150"><br/>
	                                                   Building Rentals
	  </a>
	</td>
  </tr>
</table>

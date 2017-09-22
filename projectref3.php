<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<a href="index.html">
<img src="logo.png" alt="logo">
</a>
<div id="login" >
<a href="loginAdmin.php" style="color:black">Login As Staff</a>
</div>
<div class="nav">
<ul>
<li class="about"><a href="#">About</a>
<ul>
<li><a href="mv.html">Mission & Vision</a></li>
<li><a href="history.html">History</a></li>
</ul>
<li class="services"><a href="services.html">Services</a>
<ul>
 <li><a href="projectref2.php">Projects References</a></li>
</ul>
<li><a href="productDisplay.php">Products</a></li>
<li><a href="career.php">Career</a></li>
<li><a href="contact.php">Contact Us</a></li>
</ul>
<br>
</div>
<div id="container">
<h1>Project References</h1>
<br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
  $(document).ready(function() {
  $('#previous').on('click', function(){
    // Change to the previous image
    $('#im_' + currentImage).stop().fadeOut(1);
    decreaseImage();
    $('#im_' + currentImage).stop().fadeIn(1);
  }); 
  $('#next').on('click', function(){
    // Change to the next image
    $('#im_' + currentImage).stop().fadeOut(1);
    increaseImage();
    $('#im_' + currentImage).stop().fadeIn(1);
  }); 

  var currentImage = 1;
  var totalImages = 8;

  function increaseImage() {
    /* Increase currentImage by 1.
    * Resets to 1 if larger than totalImages
    */
    ++currentImage;
    if(currentImage > totalImages) {
      currentImage = 1;
    }
  }
  function decreaseImage() {
    /* Decrease currentImage by 1.
    * Resets to totalImages if smaller than 1
    */
    --currentImage;
    if(currentImage < 1) {
      currentImage = totalImages;
    }
  }
  window.setInterval(function() {
  $('#previous').click();
}, 3000);
});
    </script>
  </head>
  <body>
    <table width="49.3%" border="0">
	  <tr valign="left">
	  <td bgcolor="#8e1106" width="100%"s>
	<ul><br>
		<li><a href="" style="color:white" >Labratory / Clean Room</a></li>
		<li><a href="projectref2.php" style="color:white">Factories / Plants</a></li>
		<li><a href="projectref3.php" style="color:white"><b><big>Office/Shops / Showroom</big></b></a></li>
		<li><a href="projectref4.php"style="color:white" >Computer / Data Centre</a></li>
		<li><a href="projectref5.php"style="color:white" >X-ray Room / Clinical</a></li>
		
	</ul></td></tr>
	</table>
    <div id="showContainer">

      <div class="imageContainer" id="im_1">
        <img src="ProjectRef/img4.jpeg" height="300px" width="500px"/>
  
      </div>

      <div class="imageContainer" id="im_2">
         <img src="ProjectRef/img5.jpeg"  height="300px" width="500px" />
        
      </div>

      <div class="imageContainer" id="im_3">
          <img src="ProjectRef/img6.jpeg" height="300px" width="500px" />
	</div>
	<div class="imageContainer" id="im_4">
        <img src="ProjectRef/img7.jpeg" height="300px" width="500px"/>
		</div>
		
		<div class="imageContainer" id="im_5">
        <img src="ProjectRef/img8.jpeg" height="300px" width="500px"/>
		</div>
      <div class="imageContainer" id="im_6">
        <img src="ProjectRef/img9.jpeg" height="300px" width="500px"/>
		</div>
		
		<div class="imageContainer" id="im_7">
        <img src="ProjectRef/img10.jpeg" height="300px" width="500px"/>
		</div>
		
		<div class="imageContainer" id="im_8">
        <img src="ProjectRef/img11.jpeg" height="300px" width="500px"/>
      </div>
	  </div>
	<div class="navButton" id="previous">&#10094;</div>
      <div class="navButton" id="next">&#10095;</div>
  </body>
</html>


</div>
<div id= "main">
</div>
<footer id="footer">
<a href="https://www.facebook.com/Invento-Engineers-Pte-Ltd-160632617407656/" target="_blank">
<center><img src="facebook.png" alt="facebook"

</a>
<p style="font-size:10px">ACMV . Electrical . System Integration . Plumbing . Fire Protection Security & Monitoring . Solar & Green Energy . Critical Environment Aplication . EMA Licensing
<br>
<br>
Residential . Commercial . Industrial<br></p>

<h2>Copyright &copy; 2005 - 2011 by Invento Engineers Pte Ltd. All Right Reserved.</h2>
<h3>Associated with Invento Design Pte Ltd. Invento Engineering Sdn Bhd.</h3>
</center>
</footer>
</body>
</html>
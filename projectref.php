<html>
<head>
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<a href="index.html">
<img src="logo.png" alt="logo">
</a>
<div id="login" >
<a href="loginAdmin.php" style="color:black">Login As Staff</a> |
<a href="loginCust.php" style="color:black">Login As Customer</a> |
<a href="register.php" style="color:black"> Register</a>
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
<li><a href="quotation.html">Request Services</a></li>
 <li><a href="projectref.html">Projects References</a></li>
</ul>
<li><a href="productDisplay.php">Products</a></li>
<li><a href="career.php">Career</a></li>
<li><a href="contact.php">Contact Us</a></li>
</ul>
<br>
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", ""); 
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>
<div id="container">
<h1>Project References</h1>
<div class="slideshow-container">
  <div class="mySlides fade">
    <div class="numbertext">1 / 16</div>
    <img src="ProjectRef\img1.jpeg" style="width:100%">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 16</div>
    <img src="ProjectRef\img2.jpeg" style="width:100%">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 16</div>
    <img src="ProjectRef\img3.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">4 / 16</div>
    <img src="ProjectRef\img4.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">5 / 16</div>
    <img src="ProjectRef\img5.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">6 / 16</div>
    <img src="ProjectRef\img6.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">7 / 16</div>
    <img src="ProjectRef\img7.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">8 / 16</div>
    <img src="ProjectRef\img8.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
	
  </div><div class="mySlides fade">
    <div class="numbertext">9 / 16</div>
    <img src="ProjectRef\img9.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">10 / 16</div>
    <img src="ProjectRef\img10.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">11 / 16</div>
    <img src="ProjectRef\img11.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div><div class="mySlides fade">
    <div class="numbertext">12 / 16</div>
    <img src="ProjectRef\img12.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
<div class="mySlides fade">
    <div class="numbertext">13 / 16</div>
    <img src="ProjectRef\img13.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">14 / 16</div>
    <img src="ProjectRef\img14.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">15 / 16</div>
    <img src="ProjectRef\img15.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">16 / 16</div>
    <img src="ProjectRef\img16.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(0)"></span> 
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
  <span class="dot" onclick="currentSlide(6)"></span> 
  <span class="dot" onclick="currentSlide(7)"></span> 
  <span class="dot" onclick="currentSlide(8)"></span> 
  <span class="dot" onclick="currentSlide(9)"></span> 
  <span class="dot" onclick="currentSlide(10)"></span> 
  <span class="dot" onclick="currentSlide(11)"></span> 
  <span class="dot" onclick="currentSlide(12)"></span> 
  <span class="dot" onclick="currentSlide(13)"></span> 
  <span class="dot" onclick="currentSlide(14)"></span> 
  <span class="dot" onclick="currentSlide(15)"></span>  
</div>

<div id="main">
</div>

</div>
<footer id="footer">
<a href="https://www.facebook.com/Invento-Engineers-Pte-Ltd-160632617407656/" target="_blank">
<center><img src="facebook.png" alt="facebook"
stye="width:304px;height:228px;">
</a>
<p style="font-size:10px">ACMV . Electrical . System Integration . Plumbing . Fire Protection Security & Monitoring . Solar & Green Energy . Critical Environment Application . EMA Licensing
<br>
<br>
Residential . Commercial . Industrial<br></p>

<h2>Copyright &copy; 2005 - 2011 by Invento Engineers Pte Ltd. All Right Reserved.</h2>
<h3>Associated with Invento Design Pte Ltd. Invento Engineering Sdn Bhd.</h3>
</center>
</footer>
</body>
</html>
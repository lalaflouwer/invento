var images = ["img1.jpeg", "img2.jpeg", "img3.jpeg"];
var caption = ["superman", "batman", "flash dude"];
var imageNumber = 0;
var imageLength = images.length - 1;

function changeImage(x){
imageNumber += x;
if(imageNumber>imageLength){
imageNumber=0;
}
if(imageNumber<0){
imageNumber=imageLength;
}
document.getElementById("slideshow").src = images(imageNumber);
document.getElementById("caption").innerHTML = caption[imageNumber];

return false;
}
function autoRun(){
setInterval("changeImage()",5000);
}
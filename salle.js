 
var i = 0;
var images = ['image/happy.jpg', 'image/holidays.jpg', 'image/PLAY.jpg'] ;
var time = 2000;

function changeImg(){

document.slide.src = images[i];

if (i < images.length - 1) {
  i++;
} else {
  i = 0;
}
setTimeout("changeImg()", time);
}
window.onload = changeImg;



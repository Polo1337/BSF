/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav" || x.className === "topnav start" || x.className === "topnav finish") {
    x.className += " responsive";
  } else {
    // x.className = " responsive";
    $('nav').removeClass('responsive');
  }
}

/* Toggle between class start and finish following scroll position */
$(window).scroll(function () {
  if ($(document).scrollTop() > 50) {
    $('nav').removeClass('start');
    $('nav').addClass('finish');
  } else {
    $('nav').removeClass('finish');
    $('nav').addClass('start');
  }
});
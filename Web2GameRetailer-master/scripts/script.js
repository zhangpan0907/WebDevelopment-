var slideNo = 1;
showSlides(slideNo);

function plusSlides(n) {
  showSlides(slideNo += n);
}

function currentSlide(n) {
  showSlides(slideNo = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideNo = 1}    
  if (n < 1) {slideNo = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideNo-1].style.display = "block";  
  dots[slideNo-1].className += " active";
}

function runSlideshow(){
  plusSlides(1);
  showSlides(slideNo);
  //console.log("iterating slide");

  setTimeout(runSlideshow, 6000);
}

setTimeout(runSlideshow, 6000);

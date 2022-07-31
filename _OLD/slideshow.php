<?php ?> 

<div class="slideshow-body">
	<div class="slideshow fade">
	  	<img src="css/img/slideshow/img_1.jpg">
	  	<div class="text-box">
			<div class="text-box-title"><h2>FELVÉTELI</h2></div>
			<div class="text-box-text">
				Pa sinusape eat. Aximus vid quam dolut modis estrunt. Et odi volupta spicturio conse vernat eost, et odias apienis et qui doluptatenda nos alitem a ipsamet as mo volorrum. Pa sinusape eat. Aximus vid quam dolut modis estrunt.
			</div>  
		</div>
	</div>
	
	<div class="slideshow fade">
	  	<img src="css/img/slideshow/img_2.jpg">
	  	<div class="text-box">
			<div class="text-box-title"><h2>ÜGYELET</h2></div>
			<div class="text-box-text">
				Pa sinusape eat. Aximus vid quam dolut modis estrunt. Et odi volupta spicturio conse vernat eost, et odias apienis et qui doluptatenda nos alitem a ipsamet as mo volorrum. Pa sinusape eat. Aximus vid quam dolut modis estrunt.
			</div>  
		</div>
	</div>
	
	<div class="slideshow fade">
		<img src="css/img/slideshow/img_3.jpg">
		<div class="text-box">
			<div class="text-box-title"><h2>ÁTVÉTELI VIZSGA</h2></div>
			<div class="text-box-text">
					Pa sinusape eat. Aximus vid quam dolut modis estrunt. Et odi volupta spicturio conse vernat eost, et odias apienis et qui doluptatenda nos alitem a ipsamet as mo volorrum. Pa sinusape eat. Aximus vid quam dolut modis estrunt.
			</div>  
		</div>
	</div>
	<!--
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
	-->
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<!-- LAPOZÓS
<script type="text/javascript"> 
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
  var slides = document.getElementsByClassName("slideshow");
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
</script>

-->

<!-- AUTOMATA -->
<script type="text/javascript">
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("slideshow");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>



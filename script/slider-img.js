let dots = document.getElementsByClassName("tubs-item"),
  dotsArea = document.getElementById("block-tubs"),
  slides = document.getElementsByClassName("img-slide"),
  slidesText = document.getElementsByClassName("info-item"),
  slideIndex = 1;

showSlides(slideIndex);

function showSlides(n) {
  if (n < 1) {
    slideIndex = slides.length;
  } else if (n > slides.length) {
    slideIndex = 1;
  }
  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.remove("active-img-slide");
  }
  for (let i = 0; i < slidesText.length; i++) {
    slidesText[i].classList.remove("active-info-item");
  }
  for (let i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active-tubs-item");
  }
  slides[slideIndex - 1].classList.add("active-img-slide");
  slidesText[slideIndex - 1].classList.add("active-info-item");
  dots[slideIndex - 1].classList.add("active-tubs-item");
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

dotsArea.onclick = function (e) {
  for (let i = 0; i < dots.length + 1; i++) {
    if (e.target.classList.contains("tubs-item") && e.target == dots[i - 1]) {
      currentSlide(i);
    }
  }
};

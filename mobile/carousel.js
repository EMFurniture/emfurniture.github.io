document.addEventListener('DOMContentLoaded', () => {
  const carouselTrack = document.querySelector('.carousel-track');
  const carouselSlides = document.querySelectorAll('.carousel-slide');
  const prevButton = document.querySelector('.carousel-prev');
  const nextButton = document.querySelector('.carousel-next');

  let slideIndex = 0;
  let slideWidth = 0; // Initialize slideWidth

  // Check if there are any slides
  if (carouselSlides.length > 0) {
    slideWidth = carouselSlides[0].offsetWidth;
  }

  const updateCarousel = () => {
    const translateX = -slideIndex * slideWidth;
    carouselTrack.style.transform = `translateX(${translateX}px)`;
  };

  const goToSlide = (index) => {
    slideIndex = index;
    updateCarousel();
  };

  const nextSlide = () => {
    slideIndex = (slideIndex + 1) % carouselSlides.length;
    updateCarousel();
  };

  const prevSlide = () => {
    slideIndex = (slideIndex - 1 + carouselSlides.length) % carouselSlides.length;
    updateCarousel();
  };

  prevButton.addEventListener('click', prevSlide);
  nextButton.addEventListener('click', nextSlide);

  updateCarousel(); // Initialize the carousel on page load
});
document.addEventListener("DOMContentLoaded", function() {
    // Get all slides and the slides container
    const slides = document.querySelectorAll(".header-banner")
    const slidesContainer = document.querySelector(".header__slide")
    let slideIndex = 0
    let isTransitioning = false
    const intervalDuration = 3000 // Interval in milliseconds (3 seconds in this case)
  
    // Function to change slide by a given offset (previous or next)
    function changeSlide(offset) {
        if (isTransitioning) return
        isTransitioning = true
        
        slideIndex += offset
        if (slideIndex >= slides.length) {
            slideIndex = 0
        } else if (slideIndex < 0) {
            slideIndex = slides.length - 1
        }
        showSlide(slideIndex)
      
        // Add a delay to prevent continuous auto advancement during manual control
        setTimeout(() => {
            isTransitioning = false
        }, 100)
    }
  
    // Function to show the current slide and hide the others with smooth left-to-right transition
    function showSlide(index) {
        slidesContainer.style.transform = `translateX(-${index * 100}%)`
    }
  
    // Automatic slideshow interval
    setInterval(() => {
        changeSlide(1) // Advance to the next slide automatically
    }, intervalDuration)
  
    // Show the initial slide
    showSlide(slideIndex)
  })
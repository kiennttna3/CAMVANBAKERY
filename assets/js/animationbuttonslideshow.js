document.addEventListener("DOMContentLoaded", function() {
    // Get all slides and the slides container
    const slides = document.querySelectorAll(".header-banner")
    const slidesContainer = document.querySelector(".header__slide")
    let slideIndex = 0
        
    // Function to change slide by a given offset (previous or next)
    function changeSlide(offset) {
        slideIndex += offset
        if (slideIndex >= slides.length) {
            slideIndex = 0
        } else if (slideIndex < 0) {
            slideIndex = slides.length - 1
        }
        showSlide(slideIndex)
    }

    // Function to show the current slide and hide the others with smooth left-to-right transition
    function showSlide(index) {
        slidesContainer.style.transform = `translateX(-${index * 100}%)`
    }

    // Set previous and next buttons to change slides accordingly
    const prevButton = document.querySelector(".prev")
    const nextButton = document.querySelector(".next")

    prevButton.addEventListener("click", function() {
        changeSlide(-1)
    })

    nextButton.addEventListener("click", function() {
        changeSlide(1)
    })

    // Show the initial slide
    showSlide(slideIndex)
})  ;
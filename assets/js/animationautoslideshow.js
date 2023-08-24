// Lắng nghe sự kiện "DOMContentLoaded" để đảm bảo tất cả các phần tử trong DOM đã được tải
document.addEventListener("DOMContentLoaded", function() {
    // Lấy tất cả các slide và phần tử chứa các slide
    const slides = document.querySelectorAll(".header-banner") // Lấy tất cả các slide
    const slidesContainer = document.querySelector(".header__slide") // Lấy phần tử chứa các slide
    let slideIndex = 0 // Biến để theo dõi chỉ số slide hiện tại 
    let isTransitioning = false // Biến để kiểm tra xem đang trong quá trình chuyển slide bằng nút "Previous" và "Next" hay không
    const intervalDuration = 3000 // Khoảng thời gian chuyển slide trong milliseconds (3 giây trong trường hợp này)
    
    // Hàm thay đổi slide dựa trên offset được cung cấp (trước hoặc sau)
    function changeSlide(offset) {
        if (isTransitioning) return // Nếu đang trong quá trình chuyển slide bằng nút "Previous" và "Next" thì không thực hiện gì thêm
        isTransitioning = true
        slideIndex += offset
        if (slideIndex >= slides.length) {
            slideIndex = 0
        } else if (slideIndex < 0) {
            slideIndex = slides.length - 1
        }
        showSlide(slideIndex) // Hiển thị slide tương ứng
        // Thêm độ trễ để ngăn chặn sự tiến lên liên tục trong quá trình điều khiển thủ công
        setTimeout(() => {
            isTransitioning = false
        }, 100)
    }
    
    // Hàm hiển thị slide hiện tại và ẩn các slide khác với hiệu ứng trượt từ trái sang phải
    function showSlide(index) {
        slidesContainer.style.transform = `translateX(-${index * 100}%)`
    }
    
    // Gán sự kiện click cho nút "Previous" và "Next" để thay đổi slide tương ứng
    const prevButton = document.querySelector(".prev")
    const nextButton = document.querySelector(".next")

    prevButton.addEventListener("click", function() {
        changeSlide(-1) // Di chuyển đến slide trước đó
    })

    nextButton.addEventListener("click", function() {
        changeSlide(1) // Di chuyển đến slide tiếp theo
    })

    // Khoảng thời gian tự động chuyển slide
    setInterval(() => {
        changeSlide(1) // Tự động chuyển đến slide tiếp theo
    }, intervalDuration)

    // Hiển thị slide ban đầu
    showSlide(slideIndex)
})

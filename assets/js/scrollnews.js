// Lắng nghe sự kiện "DOMContentLoaded" để đảm bảo tất cả các phần tử trong DOM đã được tải
document.addEventListener("DOMContentLoaded", function () {
    // Lấy tất cả các phần tử header__navbar-item-news
    const navbarItems = document.querySelectorAll(".header__navbar-item-news")
    // Lặp qua mỗi phần tử trong danh sách các phần tử header__navbar-item-news
    navbarItems.forEach(function (item) {
        // Thêm sự kiện click cho mỗi phần tử
        item.addEventListener("click", function () {
            // Lấy phần tử contact__with-main cần cuộn đến
            const contactSection = document.querySelector(".contact")
            // Cuộn đến phần tử contact__with-main với hiệu ứng trượt mượt
            contactSection.scrollIntoView({ behavior: "smooth" })
        })
    })
})
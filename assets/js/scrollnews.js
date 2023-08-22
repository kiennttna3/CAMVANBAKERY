// Lắng nghe sự kiện click trên các mục của header__navbar-item
document.addEventListener("DOMContentLoaded", function () {
    const navbarItems = document.querySelectorAll(".header__navbar-item-news")
    navbarItems.forEach(function (item) {
        item.addEventListener("click", function () {
            // Lấy phần tử contact__with-main cần cuộn đến
            const contactSection = document.querySelector(".contact")
            // Cuộn đến phần tử contact__with-main
            contactSection.scrollIntoView({ behavior: "smooth" })
        })
    })
})
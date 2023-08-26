// Lắng nghe sự kiện "DOMContentLoaded" để đảm bảo tất cả các phần tử trong DOM đã được tải
document.addEventListener("DOMContentLoaded", function () {
    // Lấy phần tử header__navbar-item-news
    const newsNavItem = document.querySelector(".header__navbar-item-news");
    
    // Thêm sự kiện click cho nút "TIN TỨC"
    newsNavItem.addEventListener("click", function () {
        // Sử dụng cửa sổ cha của iframe để chuyển đổi trang
        window.parent.location.href = "index#contact";
    });
})
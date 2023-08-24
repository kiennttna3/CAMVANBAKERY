// Lấy phần tử nút mua hàng
const cartBtn = document.querySelector(".cart-btn")
// Lấy phần tử modal giỏ hàng, phần tử chứa nội dung giỏ hàng, nút đóng modal, và phần tử hình tròn cuối trang
const modalCart = document.querySelector(".modal__cart")
const modalbodycart = document.querySelector(".modal__body__cart")
const closemodalcart = document.querySelector(".modal__body__exit")
const footerScrollCircle = document.querySelector(".footer__scoll__circle")
// Hàm chuyển đổi trạng thái mở/đóng của modal giỏ hàng
const toggleCartModal = () => {
    modalCart.classList.toggle("open")
    // Kiểm tra trạng thái mở hoặc đóng của modal để hiển thị/ẩn nút scroll ở cuối trang
    if (modalCart.classList.contains("open")) {
        footerScrollCircle.style.display = "none" // Ẩn nút scroll khi mở modal
    } else {
        footerScrollCircle.style.display = "block" // Hiển thị nút scroll khi đóng modal
    }
}
// Hàm ẩn modal giỏ hàng và hiển thị nút scroll
const hideCartModal = () => {
    modalCart.classList.remove("open")
    footerScrollCircle.style.display = "block" // Hiển thị nút scroll khi đóng modal
};
// Lắng nghe sự kiện click vào nút mua hàng để mở/đóng modal
cartBtn.addEventListener("click", toggleCartModal)
// Lắng nghe sự kiện click vào nút đóng modal để đóng modal
closemodalcart.addEventListener("click", toggleCartModal)
// Lắng nghe sự kiện click vào phần tử modal giỏ hàng để đóng modal
modalCart.addEventListener("click", hideCartModal)
// Ngăn chặn sự kiện click trên phần tử chứa nội dung giỏ hàng để không đóng modal khi click vào nó
modalbodycart.addEventListener('click', function(event) {
    event.stopImmediatePropagation()            
})

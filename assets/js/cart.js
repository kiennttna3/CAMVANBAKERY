const cartBtn = document.querySelector(".cart-btn")
const modalCart = document.querySelector(".modal__cart")
const modalbodycart = document.querySelector(".modal__body__cart")
const closemodalcart = document.querySelector(".modal__body__exit")
const footerScrollCircle = document.querySelector(".footer__scoll__circle")

const toggleCartModal = () => {
    modalCart.classList.toggle("open")
    // Kiểm tra trạng thái mở hoặc đóng của modal để hiển thị/ẩn nút scroll
    if (modalCart.classList.contains("open")) {
        footerScrollCircle.style.display = "none"
    } else {
        footerScrollCircle.style.display = "block" // Hiển thị nút scroll khi đóng modal
    }
}

const hideCartModal = () => {
    modalCart.classList.remove("open")
    footerScrollCircle.style.display = "block"
};

cartBtn.addEventListener("click", toggleCartModal)
closemodalcart.addEventListener("click", toggleCartModal)
modalCart.addEventListener("click", hideCartModal)
// Ngăn chặn sự kiện click trên modal body để không đóng modal khi click vào nó
modalbodycart.addEventListener('click', function(event) {
    event.stopImmediatePropagation()            
})

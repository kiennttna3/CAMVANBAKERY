// Lấy tất cả các phần tử nút tài khoản
const accountBtns = document.querySelectorAll('.js-accounts')
// Lấy phần tử modal mua sản phẩm và phần tử chứa modal
const modalbuy = document.querySelector('.modal__buy')
const modalContainer = document.querySelector('.js-modal-containers')
// Lấy phần tử nút đóng moda
const modalClose = document.querySelector('.js-modal-closes')
// Hàm hiển thị modal mua sản phẩm
function showAccounts() {
    modalbuy.classList.add('open')
}
// Hàm ẩn modal mua sản phẩm
function hideAccounts() {
    modalbuy.classList.remove('open')
}
// Lặp qua từng nút tài khoản và lắng nghe sự kiện click để hiển thị modal mua sản phẩm
for (const accountBtn of accountBtns) {
    accountBtn.addEventListener('click', showAccounts)
}
// Lắng nghe sự kiện click vào nút đóng modal để ẩn modal
modalClose.addEventListener('click', hideAccounts)
// Lắng nghe sự kiện click vào phần tử modal mua sản phẩm để ẩn modal
modalbuy.addEventListener('click', hideAccounts)
// Lắng nghe sự kiện click vào phần tử chứa modal, nhưng ngăn chặn sự kiện lan rộng
modalContainer.addEventListener('click', function(event) {
    event.stopImmediatePropagation() // Ngăn chặn sự kiện lan rộng           
})
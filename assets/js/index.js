// Lấy tất cả các phần tử có class 'js-account' (các nút kích hoạt tài khoản)
const accountBtns = document.querySelectorAll('.js-account')
// Lấy phần tử modal (cửa sổ hiển thị tài khoản)
const modal = document.querySelector('.modal')
// Lấy phần tử chứa nội dung của modal
const modalContainer = document.querySelector('.js-modal-container')
// Lấy phần tử nút close trong modal
const modalClose = document.querySelector('.js-modal-close')
// Hàm hiển thị modal tài khoản
function showAccounts() {
    modal.classList.add('open')
}
// Hàm ẩn modal tài khoản
function hideAccounts() {
    modal.classList.remove('open')
}
// Lặp qua từng thẻ button và lắng nghe sự kiện click
for (const accountBtn of accountBtns) {
    accountBtn.addEventListener('click', showAccounts)
}
// Lắng nghe sự kiện click trên nút close của modal
modalClose.addEventListener('click', hideAccounts)
// Lắng nghe sự kiện click trên phần tử modal để ẩn modal
modal.addEventListener('click', hideAccounts)
// Lắng nghe sự kiện click trên phần tử chứa nội dung của modal để ngăn chặn sự kiện lan ra các phần tử cha khác
modalContainer.addEventListener('click', function(event) {
    event.stopImmediatePropagation()            
})
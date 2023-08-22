const accountBtns = document.querySelectorAll('.js-account')
const modal = document.querySelector('.modal')
const modalContainer = document.querySelector('.js-modal-container')
const modalClose = document.querySelector('.js-modal-close')
function showAccounts() {
    modal.classList.add('open')
}
function hideAccounts() {
    modal.classList.remove('open')
}
//Lặp qua từng thẻ button và nghe hành vi click
for (const accountBtn of accountBtns) {
    accountBtn.addEventListener('click', showAccounts)
}
//Nghe hành vi click vào button close
modalClose.addEventListener('click', hideAccounts)

modal.addEventListener('click', hideAccounts)

modalContainer.addEventListener('click', function(event) {
    event.stopImmediatePropagation()            
})
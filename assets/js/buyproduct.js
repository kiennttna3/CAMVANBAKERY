const accountBtns = document.querySelectorAll('.js-accounts')
const modalbuy = document.querySelector('.modal__buy')
const modalContainer = document.querySelector('.js-modal-containers')
const modalClose = document.querySelector('.js-modal-closes')
function showAccounts() {
    modalbuy.classList.add('open')
}
function hideAccounts() {
    modalbuy.classList.remove('open')
}
//Lặp qua từng thẻ button và nghe hành vi click
for (const accountBtn of accountBtns) {
    accountBtn.addEventListener('click', showAccounts)
}
//Nghe hành vi click vào button close
modalClose.addEventListener('click', hideAccounts)

modalbuy.addEventListener('click', hideAccounts)

modalContainer.addEventListener('click', function(event) {
    event.stopImmediatePropagation()            
})
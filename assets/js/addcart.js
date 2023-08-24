// Lấy các phần tử cần thao tác
const addToCartButton = document.querySelector('.modal__body-cart')
const productModal = document.querySelector('.modal__buy')
const cartModal = document.querySelector('.modal__cart')
const cartContent = document.querySelector('.modal__body__box__car')
// Lấy phần tử input số lượng
const quantityInput = document.querySelector('.modal__body-quantity')
// Lấy phần tử nút "Tăng số lượng"
const increaseQuantityButton = document.querySelector('.modal__body__add')
// Lấy phần tử nút "Giảm số lượng"
const decreaseQuantityButton = document.querySelector('.modal__body__remove')
// Lấy thông tin giỏ hàng từ Local Storage (nếu có)
const cartItems = JSON.parse(localStorage.getItem('cartItems')) || []
// Hiển thị thông tin giỏ hàng từ Local Storage (nếu có)
cartItems.forEach(item => {
    const productInCart = createCartItemElement(item)
    cartContent.appendChild(productInCart)
})
function hideAccounts() {
    productModal.classList.remove('open')
}
// Bắt sự kiện khi nhấn vào nút "Thêm vào giỏ hàng"
addToCartButton.addEventListener('click', () => {
    const image = document.querySelector('.modal__body-img').src
    const title = document.querySelector('.modal__body-text').textContent
    const price = document.querySelector('.modal__body-price').textContent
    const newQuantity = parseInt(quantityInput.value)
    // Tìm kiếm xem đã có sản phẩm trong giỏ hàng chưa
    const existingItem = cartItems.find(item => item.image === image && item.title === title && item.price === price)
    if (existingItem) {
        // Nếu có sản phẩm trong giỏ hàng rồi, chỉ cập nhật số lượng
        existingItem.quantity += newQuantity
        // Gọi hàm toggleCartModal() để hiển thị modal giỏ hàng ở javascript 2
        toggleCartModal()
        hideAccounts(productModal)
    } else {
        // Nếu chưa có sản phẩm, thêm sản phẩm mới vào giỏ hàng
        const newItem = {
            image: image,
            title: title,
            price: price,
            quantity: newQuantity
        }
        cartItems.push(newItem)
        // Gọi hàm toggleCartModal() để hiển thị modal giỏ hàng ở javascript
        toggleCartModal()
        hideAccounts(productModal)
    }
    // Lưu thông tin giỏ hàng vào Local Storage
    localStorage.setItem('cartItems', JSON.stringify(cartItems))
    // Gọi hàm cập nhật nội dung trong modal__cart
    updateCartContent()
    // Hiển thị sản phẩm trong giỏ hàng
    const productInCart = createCartItemElement(newItem)
    cartContent.appendChild(productInCart)
    // Gọi hàm toggleCartModal() để hiển thị modal giỏ hàng ở javascript 2
    toggleCartModal()
    hideAccounts(productModal)
    updateTotalPriceInCart()
    // Cập nhật lại nút xóa khi người dùng click vào modal__body__car__delete
    updateDeleteButtons()
})
// Hàm tạo phần tử giỏ hàng
function createCartItemElement(item) {
    const totalPrice = parseFloat(item.price) * item.quantity
    const productInCart = document.createElement('div')
    productInCart.classList.add('modal__body__box__car-item')
    productInCart.innerHTML = `
        <div class="modal__body__box__car-box">
            <img class="modal__body__box__car-img" src="${item.image}" alt="">
            <div class="modal__body__box__car-info">
                <div class="modal__body__box__car-title">${item.title}</div>
                <div class="modal__body__box__car-price">${totalPrice.toFixed(0)}đ</div>
                <div class="modal__body-control">
                    <button class="col col-third modal__body-remove modal__body__remove"><i class="fa-solid fa-minus"></i></button>
                    <input type="number" class="col col-third modal__body-quantity" value="${item.quantity}">
                    <button class="col col-third modal__body-add modal__body__add"><i class="fa-solid fa-plus"></i></button>
                </div>
                <div class="modal__body__box__car-delete">
                    <button class="modal__body__car__delete"><i class="fa-solid fa-xmark"></i></button>  
                </div>
            </div>
        </div>
    `
    // Thêm sự kiện "click" vào nút xóa
    const deleteButton = productInCart.querySelector('.modal__body__car__delete')
    deleteButton.addEventListener('click', () => {
        // Lấy phần tử cha của nút xóa (modal__body__box__car-item) và xóa cả hai cùng với nút xóa
        const parentItem = deleteButton.closest('.modal__body__box__car-item')
        parentItem.remove()
        // Xóa sản phẩm khỏi giỏ hàng và cập nhật lại bộ nhớ đệm của modal__body-cart
        const title = parentItem.querySelector('.modal__body__box__car-title').textContent
        const price = parentItem.querySelector('.modal__body__box__car-price').textContent
        removeItemFromCart(title, price)
        localStorage.setItem('cartItems', JSON.stringify(cartItems))
    })
    // Lấy phần tử input số lượng
    const quantityInput = productInCart.querySelector('.modal__body-quantity')
    // Lấy phần tử nút "Tăng số lượng"
    const increaseQuantityButton = productInCart.querySelector('.modal__body__add')
    // Lấy phần tử nút "Giảm số lượng"
    const decreaseQuantityButton = productInCart.querySelector('.modal__body__remove')
    // Thêm sự kiện click cho nút "Tăng số lượng"
    increaseQuantityButton.addEventListener('click', () => {
        let quantity = parseInt(quantityInput.value)
        quantity++
        quantityInput.value = quantity.toString() 
        // Cập nhật lại bộ nhớ đệm
        updateCartItemQuantity(item, quantity)
        updateTotalPrice(item, quantity)
    })
    // Thêm sự kiện click cho nút "Giảm số lượng"
    decreaseQuantityButton.addEventListener('click', () => {
        let quantity = parseInt(quantityInput.value)
        if (quantity > 1) {
            quantity--
            quantityInput.value = quantity.toString()
            // Cập nhật lại bộ nhớ đệm
            updateCartItemQuantity(item, quantity)
            updateTotalPrice(item, quantity)
        }
    })
    return productInCart;
}
// Hàm cập nhật lại sự kiện click cho nút xóa sau khi xóa sản phẩm
function updateDeleteButtons() {
    const deleteButtons = document.querySelectorAll('.modal__body__car__delete')
    deleteButtons.forEach(deleteButton => {
        deleteButton.removeEventListener('click', deleteButtonClickHandler)
        deleteButton.addEventListener('click', deleteButtonClickHandler)
    })
}
// Hàm cập nhật số lượng trong giỏ hàng khi thay đổi số lượng
function updateCartItemQuantity(item, quantity) {
    const cartItem = cartItems.find(cartItem => cartItem.title === item.title && cartItem.price === item.price)
    if (cartItem) {
        cartItem.quantity = quantity
        localStorage.setItem('cartItems', JSON.stringify(cartItems))
    }
    updateDeleteButtons()
}
// Hàm cập nhật nội dung trong modal__cart
function updateCartContent() {
    cartContent.innerHTML = '' // Xóa toàn bộ nội dung trong cartContent
    // Hiển thị lại các sản phẩm từ cartItems
    cartItems.forEach(item => {
        const productInCart = createCartItemElement(item)
        cartContent.appendChild(productInCart)
    })
    updateTotalPriceInCart()
    updateDeleteButtons()
}
// Hàm xóa sản phẩm khỏi giỏ hàng
function removeItemFromCart(title, price) {
    const index = cartItems.findIndex(item => item.title === title && item.price === price)
    if (index !== -1) {
        cartItems.splice(index, 1)
    }
}
// Xử lý sự kiện click cho nút xóa
function deleteButtonClickHandler(event) {
    const deleteButton = event.currentTarget
    const parentItem = deleteButton.closest('.modal__body__box__car-item')
    // Lấy thông tin cần xóa
    const title = parentItem.querySelector('.modal__body__box__car-title').textContent
    const price = parentItem.querySelector('.modal__body__box__car-price').textContent
    // Lấy giá tiền sản phẩm đã xóa
    const deletedPrice = parseFloat(price);
    // Xóa sản phẩm khỏi giỏ hàng
    removeItemFromCart(title, price)
    // Xóa phần tử khỏi giao diện
    parentItem.remove()
    // Cập nhật tổng giá tiền trong giỏ hàng và bộ nhớ đệm
    updateTotalPriceInCart()
    // Cập nhật lại sự kiện click cho nút xóa
    updateDeleteButtons()
    // Cập nhật lại tổng giá tiền trên trang web
    updateTotalPriceOnPage(deletedPrice);
    // Lưu thông tin giỏ hàng vào Local Storage sau khi xóa sản phẩm
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
    // Xóa toàn bộ nội dung trong giỏ hàng và cập nhật lại bộ nhớ đệm của modal__body-cart
    // cartContent.innerHTML = '';
    cartItems.length = 0; // Xóa tất cả phần tử trong mảng cartItems
    localStorage.removeItem('cartItems'); // Xóa khóa 'cartItems' khỏi localStorage
}
// Hàm cập nhật giá tiền trong giỏ hàng theo số lượng với giá gốc
function updateTotalPrice(item, quantity) {
    const totalPriceElement = cartContent.querySelector('.modal__body__box_price')
    const totalPrice = parseFloat(item.price) * quantity
    totalPriceElement.textContent = `${totalPrice.toFixed(0)}`
    updateDeleteButtons()
}
// Hàm cập nhật số lượng sản phẩm vào giỏ hàng
function updateCartItemQuantity(item, quantity) {
    const cartItem = cartItems.find(cartItem => cartItem.title === item.title && cartItem.price === item.price)
    if (cartItem) {
        cartItem.quantity = quantity
        localStorage.setItem('cartItems', JSON.stringify(cartItems))
        updateCartContent() // Cập nhật toàn bộ giỏ hàng
        updateDeleteButtons()
    }
}
// Hàm cập nhật tổng giá tiền trong giỏ hàng và bộ nhớ đệm
function updateTotalPriceInCart() {
    const totalPriceElement = cartModal.querySelector('.modal__body__box_price')
    const totalPrice = cartItems.reduce((total, item) => {
        return total + parseFloat(item.price) * item.quantity
    }, 0)
    totalPriceElement.textContent = `${totalPrice.toFixed(0)}`
    // Cập nhật vào bộ nhớ đệm
    localStorage.setItem('cartItems', JSON.stringify(cartItems))
    updateDeleteButtons()
}
// Hàm cập nhật tổng giá tiền trong giỏ hàng sau khi xóa sản phẩm
function updateTotalPriceOnPage(deletedPrice) {
    const totalPriceElementOnPage = document.querySelector('.modal__body__box_price');
    const currentTotalPrice = parseFloat(totalPriceElementOnPage.textContent);
    const updatedTotalPrice = currentTotalPrice - deletedPrice;
    totalPriceElementOnPage.textContent = updatedTotalPrice.toFixed(0);
}
// Ban đầu, cập nhật lại sự kiện click cho các nút tổng giá tiền đã có
updateTotalPriceInCart()
// Ban đầu, cập nhật lại sự kiện click cho các nút xóa đã có
updateDeleteButtons()

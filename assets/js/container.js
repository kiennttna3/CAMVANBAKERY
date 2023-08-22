// Lấy tất cả các phần tử container__box trong container__with-shop
const containerBoxes = document.querySelectorAll('.container__with-shop .container__box')
const modalBodyImage = document.querySelector('.modal__body-img')

// Lặp qua các container__box để thêm sự kiện khi click vào nút BUY
containerBoxes.forEach(containerBox => {
    const productImage = containerBox.querySelector('.container__shop-img')
    const buyButton = containerBox.querySelector('.container__shop-buy')
    const productName = containerBox.querySelector('.container__shop-text').textContent
    const productPrice = containerBox.querySelector('.container__price-buy').textContent
    const imgSrc = productImage.getAttribute('src') // Lấy đường dẫn hình ảnh từ thuộc tính src

    buyButton.addEventListener('click', () => {
        const modalTitle = document.querySelector('.modal__body-text')
        const modalPrice = document.querySelector('.modal__body-price')
        
        modalTitle.textContent = productName
        modalPrice.textContent = productPrice

        // Cập nhật đường dẫn hình ảnh trong modal
        modalBodyImage.src = imgSrc

    // Hiển thị modal ở đây nếu cần
    })
})
// Lấy tất cả các phần tử container__box trong phần chứa container__with-shop
const containerBoxes = document.querySelectorAll('.container__with-shop .container__box')
// Lấy phần tử hình ảnh trong phần thân modal
const modalBodyImage = document.querySelector('.modal__body-img')
// Lặp qua từng phần tử container__box để thêm sự kiện khi click vào nút "BUY"
containerBoxes.forEach(containerBox => {
    // Lấy phần tử hình ảnh trong container__box
    const imageUrl = containerBox.querySelector('.container__shop-img')
    // Lấy phần tử nút "BUY" trong container__box
    const buyButton = containerBox.querySelector('.container__shop-buy')
    // Lấy nội dung tên sản phẩm từ phần tử container__shop-text trong container__box
    const name = containerBox.querySelector('.container__shop-text').textContent
    // Lấy giá sản phẩm từ phần tử container__price-buy trong container__box
    const productPrice = containerBox.querySelector('.container__price-buy').textContent
    // Lấy đường dẫn hình ảnh từ thuộc tính src của phần tử hình ảnh
    const imgSrc = imageUrl.getAttribute('src')
    // Lắng nghe sự kiện click vào nút "BUY"
    buyButton.addEventListener('click', () => {
        // Lấy phần tử tiêu đề trong modal
        const modalTitle = document.querySelector('.modal__body-text')
        // Lấy phần tử giá trong modal
        const modalPrice = document.querySelector('.modal__body-price')
        // Cập nhật nội dung tiêu đề trong modal thành tên sản phẩm
        modalTitle.textContent = name
        // Cập nhật nội dung giá trong modal thành giá sản phẩm
        modalPrice.textContent = productPrice
        // Cập nhật đường dẫn hình ảnh trong phần thân modal
        modalBodyImage.src = imgSrc
    })
})
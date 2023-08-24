// Định nghĩa số lượng mục trên mỗi trang và tổng số mục
const itemsPerPage = 12 // Số lượng mục trên mỗi trang
const totalItems = document.querySelectorAll('.container__with-shop .container__box').length // Tổng số mục
const totalPages = Math.ceil(totalItems / itemsPerPage) // Tính tổng số trang

let currentPage = 1 // Trang hiện tại, mặc định là trang đầu tiên
const prevButton = document.querySelector('.pagination__prev')
const nextButton = document.querySelector('.pagination__next')
// Thẻ hiển thị số trang
const pageIndicator = document.querySelector('.pagination__page')
// Hàm cập nhật thẻ hiển thị số trang
function updatePageIndicator() {
    pageIndicator.textContent = `Page ${currentPage} of ${totalPages}`
}
// Hàm cập nhật mục hiển thị trên trang hiện tại
function updateVisibleItems() {
    const allItems = document.querySelectorAll('.container__with-shop .container__box')
    allItems.forEach((item, index) => {
        if (index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage) {
            item.style.display = 'block' // Hiển thị mục
        } else {
            item.style.display = 'none' // Ẩn mục
        }
    })
}
// Xử lý sự kiện nút "Previous"
prevButton.addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--
        updatePageIndicator() // Cập nhật số trang
        updateVisibleItems() // Cập nhật mục hiển thị trên trang
    }
})
// Xử lý sự kiện nút "Next"
nextButton.addEventListener('click', () => {
    if (currentPage < totalPages) {
        currentPage++
        updatePageIndicator() // Cập nhật số trang
        updateVisibleItems() // Cập nhật mục hiển thị trên trang
    }
})
// Cập nhật thẻ hiển thị số trang và mục hiển thị ban đầu
updatePageIndicator()
updateVisibleItems()

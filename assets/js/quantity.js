// Hàm để giảm số lượng
function decreaseQuantity() {
    var inputElement = document.getElementById("quantity") // Lấy phần tử input số lượng
    var currentQuantity = parseInt(inputElement.value) // Lấy giá trị số lượng hiện tại và chuyển thành số nguyên
    if (currentQuantity > 1) { // Kiểm tra nếu số lượng hiện tại lớn hơn 1
        inputElement.value = currentQuantity - 1 // Giảm số lượng đi 1 và cập nhật giá trị vào input
    }
}
// Hàm để tăng số lượng
function increaseQuantity() {
    var inputElement = document.getElementById("quantity") // Lấy phần tử input số lượng
    var currentQuantity = parseInt(inputElement.value) // Lấy giá trị số lượng hiện tại và chuyển thành số nguyên
    inputElement.value = currentQuantity + 1 // Tăng số lượng đi 1 và cập nhật giá trị vào input
}
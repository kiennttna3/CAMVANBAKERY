// Function to decrease the quantity
function decreaseQuantity() {
    var inputElement = document.getElementById("quantity")
    var currentQuantity = parseInt(inputElement.value)
    if (currentQuantity > 1) {
        inputElement.value = currentQuantity - 1
    }
}
  
// Function to increase the quantity
function increaseQuantity() {
    var inputElement = document.getElementById("quantity")
    var currentQuantity = parseInt(inputElement.value)
    inputElement.value = currentQuantity + 1
}
// const searchBtn = document.querySelector('.header__search-btn-icon');
// const searchText = document.querySelector('.header__search-input').value;
// const containerBoxer = document.querySelector(".container__boxer");
// const containerBoxDropouter = document.querySelector(".container__box__dropouter");

// searchBtn.addEventListener('click', () => {
//     // Lấy giá trị của ô nhập liệu tìm kiếm
//     // Gọi hàm thực hiện tìm kiếm với giá trị searchTerm
//     performSearch(searchText);
// });

// searchBtn.addEventListener("click", function() {
//     const filteredItems = filterItems(searchText); // Hàm này sẽ trả về danh sách sản phẩm phù hợp
//     updateContainerBoxer(filteredItems);
//     performSearch();
// });

// searchBtn.addEventListener("keypress", function(event) {
//     if (event.key === "Enter") {
//         performSearch();
//     }
// });

// function performSearch() {
//     const filteredItems = filterItems(searchText);
//     updateContainerBoxer(filteredItems);
// }

// function filterItems(searchText) {
//     // Giả sử danh sách sản phẩm là một mảng chứa các tên sản phẩm
//     const allItems = [];
    
//     const filteredItems = allItems.filter(item => item.toLowerCase().includes(searchText.toLowerCase()));
//     return filteredItems;
// }

// function updateContainerBoxer(filteredItems) {
//     // containerBoxer.innerHTML = ""; // Xóa nội dung cũ
//     filteredItems.sort(); // Sắp xếp theo bảng chữ cái

//     filteredItems.forEach(item => {
//         const itemElement = document.createElement("div");
//         itemElement.classList.add("container__shop-texter");
//         itemElement.textContent = item;
//         containerBoxer.appendChild(itemElement);
//     });

//     // Hiển thị container__boxer và container__box__dropouter
//     containerBoxer.style.display = "block";
//     containerBoxDropouter.style.display = "block";
// }

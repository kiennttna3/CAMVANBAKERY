// // Lấy danh sách tất cả các phần tử có lớp container__box
// const boxContainers = document.querySelectorAll('.container__box');

// // Lấy phần tử container__box__dropouter
// const dropouterContainer = document.querySelector('.container__box__dropouter');

// // Xóa toàn bộ nội dung của container__box__dropouter để làm sạch bộ nhớ đệm
// dropouterContainer.innerHTML = '';

// // Lặp qua từng phần tử container__box
// boxContainers.forEach(boxContainer => {
//     // Tạo một bản sao của container__boxer để cập nhật dữ liệu
//     const boxElement = document.createElement('div');
//     boxElement.classList.add('container__boxer');

//     // Lấy dữ liệu từ container__box
//     const shopImgSrc = boxContainer.querySelector('.container__shop-img').getAttribute('src');
//     const shopText = boxContainer.querySelector('.container__shop-text').textContent;
//     const priceBuy = boxContainer.querySelector('.container__price-buy').textContent;

//     // Tạo các phần tử trong container__boxer và cập nhật dữ liệu
//     const imger = document.createElement('div');
//     imger.classList.add('container__box-imger');
//     const img = document.createElement('img');
//     img.classList.add('container__shop-imger');
//     img.setAttribute('src', shopImgSrc);
//     imger.appendChild(img);

//     const texter = document.createElement('div');
//     texter.classList.add('container__box-texter');
//     const shopTexter = document.createElement('div');
//     shopTexter.classList.add('container__shop-texter');
//     shopTexter.textContent = shopText;
//     const priceBuyer = document.createElement('div');
//     priceBuyer.classList.add('container__price-buyer');
//     priceBuyer.textContent = priceBuy;
//     texter.appendChild(shopTexter);
//     texter.appendChild(priceBuyer);

//     // Thêm các phần tử vào container__boxer
//     boxElement.appendChild(imger);
//     boxElement.appendChild(texter);

//     // Thêm container__boxer vào container__box__dropouter
//     dropouterContainer.appendChild(boxElement);
// });

// // Cập nhật lại bộ nhớ đệm của toàn bộ trang web
// document.body.innerHTML = document.body.innerHTML;
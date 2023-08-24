<?php
if (isset($_POST['logout'])) {
	session_unset();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản trị</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <link rel="stylesheet" href="./assets/css/base.css">
        <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- web -->
    <div class="app">
        <!-- header -->
        <header class="header">
            <div class="grid">
                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="index"><img class="header__logo-img" src="./assets/img/camvanlogo.jpg" alt=""></a> 
                    </div>
                    <div class="header__search">
                        <input type="text" class="header__search-input" placeholder="Tìm kiếm...">
                        <button class="header__search-btn">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="header__telephone">
                        <div class="header__background__size">
                            <i class="header__icon fa-solid fa-phone"></i>     
                        </div>   
                        <div class="header__text">
                            0988962688
                        </div>    
                    </div>
                    <div class="header__email">
                        <div class="header__background__size">
                            <i class="header__icon fa-solid fa-envelope"></i>                    
                        </div>     
                        <div class="header__text">
                            kiennttna3@gmail.com
                        </div>   
                    </div>
                    <?php
					if (isset($_SESSION['phonenumber'])) {
						if ($_SESSION['id']==1) {
							?>
							<div class="header__account">
                                <a href="product">
                                    <button class="header__background__size">
                                        <i class="header__icon header__icon-fix fa-solid fa-user"></i>
                                    </button> 
                                </a> 
                                <div class="header__text" style="font-size: 11px;">
                                    <?php echo $_SESSION['phonenumber']; ?>
                                    <form method="post"><input type="submit" name="logout" value="Đăng xuất" style="width: 70px;font-size: 12px;"></form>
                                </div>  
                            </div>
							
							<?php
						}
						else{
							?>
							<div class="header__account">
                                <a href="">
                                    <button class="header__background__size">
                                        <i class="header__icon header__icon-fix fa-solid fa-user"></i>
                                    </button> 
                                </a> 
                                <div class="header__text" style="font-size: 11px;">
                                    <?php echo $_SESSION['phonenumber']; ?>
                                    <form method="post"><input type="submit" name="logout" value="Đăng xuất" style="width: 70px;font-size: 12px;"></form>
                                </div>  
                            </div>
							<?php
						}
					}else {
						?>
							<div class="header__account">
                                <a href="login">
                                    <button class="header__background__size">
                                        <i class="header__icon header__icon-fix fa-solid fa-user"></i>
                                    </button> 
                                </a> 
                                <div class="header__text">
                                    Tài Khoản
                                </div>  
                            </div>
						<?php
					} ?>
                    <div class="header__cart">
                        <button class="cart-btn header__background__size">
                            <i class="header__icon fa-solid header__icon-fix fa-cart-shopping"></i>
                        </button>                          
                    </div>
                </div>
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <a href="index"><li class="header__navbar-item">TRANG CHỦ</li></a>
                        <li class="header__navbar-item">
                            <a href="#">
                                BÁNH SINH NHẬT
                                <i class="header__navbar-icon fa-solid fa-chevron-down"></i>
                            </a>         
                            <ul class="header__dropout-item">
                                <li><a href="#">BỘ SƯU TẬP BÁNH TRUNG THU</a></li>
                                <li><a href="#">Gateaux Kem Tươi</a></li>
                                <li><a href="#">Gateaux Kem Bơ</a></li>
                                <li><a href="#">Bánh Mousse</a></li>
                                <li><a href="#">Gateaux Mousse</a></li>
                                <li><a href="#">Bộ Sưu Tập Bánh Phụ Kiện</a></li>
                                <li><a href="#">Bánh Valentine - Trái Tim</a></li>
                                <li><a href="#">Bánh Sinh Nhật Bé Trai</a></li>
                                <li><a href="#">Bánh Sinh Nhật Bé Gái</a></li>
                                <li><a href="#">Bánh In Ảnh</a></li>
                                <li><a href="#">Bánh Vẽ</a></li>
                                <li><a href="#">Bánh Sự Kiện</a></li>
                                <li><a href="#">BÁNH SỰ KIỆN THEO YÊU CẦU</a></li>
                                <li><a href="#">BÁNH SỐ</a></li>
                            </ul>
                        </li>
                        <li class="header__navbar-item">
                            <a href="#">
                                BÁNH MỲ & BÁNH MẶN
                                <i class="header__navbar-icon fa-solid fa-chevron-down"></i>
                            </a>
                            <ul class="header__dropout-item">
                                <li><a href="#">Bánh Mỳ</a></li>
                                <li><a href="#">Bánh Mặn</a></li>
                            </ul>           
                        </li>
                        <li class="header__navbar-item">
                            <a href="#">
                                COOKIES & MINICAKE
                                <i class="header__navbar-icon fa-solid fa-chevron-down"></i>
                            </a>
                            <ul class="header__dropout-item">
                                <li><a href="#">Cookies</a></li>
                                <li><a href="#">Mini Cake</a></li>
                                <li><a href="#">Teabreak</a></li>
                                <li><a href="#">Petit</a></li>
                            </ul>                      
                        </li>
                        <li class="header__navbar-item header__navbar-item-news">TIN TỨC</li>
                        <li class="header__navbar-item">KHUYẾN MẠI</li>
                        <li class="header__navbar-timer">
                            <li class="header__navbar-item-timer" id="dateTime"></li>
                            <li class="header__navbar-item-timer" id="realTime"></li>
                        </li> 
                    </ul>
                </nav>   
            </div>
            <div class="header__slideshow">
                <div class="header__slide">
                    <div class="header-banner">
                        <img class="header-banner__img" src="./assets/img/camvanbanner.jpg" alt="">
                    </div>
                    <div class="header-banner">
                        <img class="header-banner__img" src="./assets/img/headslideshow1.jpg" alt="">
                    </div>
                    <div class="header-banner">
                        <img class="header-banner__img" src="./assets/img/headslideshow2.jpg" alt="">
                    </div>
                </div>    
                <div class="header__box--slide">
                    <div class="header_prev">
                        <button class="prev" onclick="changeSlide(-1)"><i class="fa-solid fa-circle-chevron-left"></i></button>
                    </div>
                    <div class="header_next">
                        <button class="next" onclick="changeSlide(1)"><i class="fa-solid fa-circle-chevron-right"></i></button>               
                    </div>
                </div>                    
            </div>               
        </header>    
        <!-- product --> 
        <div class="modal__buy modal__buyer">
            <div class="modal__bodyer">
            <h1>Sửa thông tin sản phẩm</h1>
            <form action="save-update-product" method="POST" enctype="multipart/form-data" style="font-size: 30px; line-height: 40px;">
                <input type="hidden" name="id" value="<?php echo $product->id ?>">
                <label>Tên sản phẩm:</label> <br>
                <input type="text" name="name" placeholder="Please enter" value="<?php echo $product->name ?>"> <br>

                <label>Hình ảnh sản phẩm:</label> <br>
                <input type="file" name="imageUrl" placeholder="Please enter" value="<?php echo $product->imageUrl ?>"> <br>

                <label>Giá cả sản phẩm:</label> <br>
                <input type="text" name="price" placeholder="Please enter" value="<?php echo $product->price ?>"> <br>

                <div class="button">
                    <button class="btncontrol">Sửa</button>
                </div>
            </form>
            <form action="btn-reload-product">
                <button action="btncontrol" style="font-size: 20px;margin-top: 10px;">Quay lại</button>
            </form>     
            </div>
        </div>
        <!-- footer -->
        <footer class="footer">
            <div class="footer__fix-size">
                <div class="footer__with-all">
                    <div class="col col-full footer__one">
                        <div class="footer__logo">
                            <img class="footer__logo-img" src="./assets/img/camvanlogo2.jpg" alt="" >
                        </div>
                        <div class="foot__text__one">
                            <i class="footer__icon fa-solid fa-house"></i>
                            <div class="footer__text">286 Đường Bắc Sơn - 62B Lương Ngọc Quyến TP.Thái Nguyên</div>  
                        </div>   
                        <div class="foot__text__one">
                            <i class="footer__icon fa-solid fa-mobile-screen-button"></i>
                            <div class="footer__text">0988962688 - 0369507915</div>
                        </div>
                        <div class="foot__text__one foot__text__one-fix">
                            <i class="footer__icon fa-solid fa-envelope"></i>
                            <div class="footer__text">kiennttna3@gmail.com</div>
                        </div> 
                    </div>
                    <div class="col col-full footer__two">
                        <div class="footer__text footer__text__h">CHÍNH SÁCH</div>
                        <div class="footer__text">Chính sách và quy định chung</div>
                        <div class="footer__text">Chính sách giao dịch, thanh toán</div>
                        <div class="footer__text">Chính sách đổi trả</div>
                        <div class="footer__text">Chính sách bảo mật</div>
                        <div class="footer__text">Chính sách vận chuyển</div>
                    </div>
                    <div class="col col-full footer__three">
                        <div class="footer__text footer__text__h">CẨM VÂN BAKERY</div>
                        <div class="footer__text">Tên đơn vị: Công ty Cổ phần Bánh ngọt Cẩm Vẫn Số giấy chứng nhận đăng ký kinh doanh: 0104802706 Ngày cấp: 21/07/2010 Nơi cấp: Sở Kế hoạch và Đầu tư Tp. Hà Nội</div>
                    </div>
                    <div class="col col-full footer__four">
                        <div class="footer__text">MỖI THÁNG CHÚNG TÔI ĐỀU CÓ NHỮNG ĐỢT GIẢM GIÁ DỊCH VỤ VÀ SẢN PHẨM NHẰM TRI ÂN KHÁCH HÀNG. ĐỂ CÓ THỂ CẬP NHẬT KỊP THỜI NHỮNG ĐỢT GIẢM GIÁ NÀY, VUI LÒNG NHẬP ĐỊA CHỈ EMAIL CỦA BẠN VÀO Ô DƯỚI ĐÂY</div>
                    </div>
                </div>
            </div>      
        </footer>
        <!-- footer-web -->
        <div class="footer__bottom">
            <div class="footer__blocker">
                <div class="footer__copyright">Copyright © 2023 Cẩm Vân Bakery</div>
            </div>          
        </div>
        <!-- scoll -->
        <div class="footer_scoll">
            <div title="Về đầu trang" id="top-up"> 
            <i class="footer__scoll__circle fa-solid fa-circle-chevron-up"></i></div>
        </div>
    </div>
    <!-- cart -->
    <div class="modal__cart">
        <div class="modal__overlay">

        </div>
        <div class="modal__body__box-cart">
            <div class="modal__overlayer">

            </div>
            <div class="modal__body__cart">
                <div class="modal__body__box__car-scroll">
                    <div class="modal__body__box__car__box-scroll">
                        <div class="modal__body__header__cart">
                            <div class="modal__body__header__cart__text">
                                Giỏ hàng
                            </div>
                            <div class="modal__body__box__exit">
                                <button class="modal__body__exit"><i class="fa-solid fa-xmark"></i></button>  
                            </div>
                        </div>
                        <div class="modal__body__box__car"></div>
                        <div class="modal__body__footer__cart">
                            <div class="modal__body__footer__text">
                                Quý khách xin vui lòng nhập thông tin: Họ tên, Ngày tháng năm sinh, Địa chỉ nhận, Thời gian nhận bánh và Số điện thoại liên hệ.
                            </div>
                            <input type="text" class="modal__body__footer__inputtext">
                            <div class="modal__body__box__box">
                                <div class="modal__body__box__text">
                                    Tổng tiền
                                </div>
                                <div class="modal__body__box_price">0.000</div>
                            </div>
                            <a href=""><button class="modal__body__pay">Thanh toán</button></a> 
                        </div>
                    </div>
                </div> 
            </div>
        </div>     
    </div>
</body>

</html>
    <!-- Import thư viện JQuery --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // kéo xuống khoảng cách 500px thì xuất hiện nút Top-up 
        var offset = 500
        // thời gian di trượt 0.75s ( 1000 = 1s ) 
        var duration = 750
        $(function(){ 
            $(window).scroll(function () { 
                if ($(this).scrollTop() > offset) 
                    $('#top-up').fadeIn(duration)
                else $('#top-up').fadeOut(duration)
            })
            $('#top-up').click(function () { 
                $('body,html').animate({scrollTop: 0}, duration)
            })
        })
    </script>
    <script src="./assets/js/buyproduct.js"></script>
    <script src="./assets/js/scrollnews.js"></script>
    <script src="./assets/js/pagination.js"></script>
    <script src="./assets/js/addcart.js"></script>
    <script src="./assets/js/container.js"></script>
    <script src="./assets/js/timer.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/quantity.js"></script>
    <script src="./assets/js/index.js"></script>
    <script src="./assets/js/register.js"></script>
    <script src="./assets/js/animationbuttonslideshow.js"></script>
    <script src="./assets/js/animationautoslideshow.js"></script>
</html>
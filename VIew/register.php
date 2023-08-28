<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="modal">
        <div class="modal__overlay">

        </div>
        <div class="modal__body js-modal-container">
            <div class="auth-form">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng Ký</h3>
                        <a href="login"><span class="auth-form__switch-btn"><button>Đăng Nhập</button></span></a>
                        <a href="index"><span class="auth-form__switch-btn"><button>TRỞ LẠI</button></span></a>
                    </div>
                    <form action="save-register" method="POST" enctype="multipart/form-data">
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="tel" name="phonenumber" class="auth-form__input" id="auth-form__inputphone" placeholder="Số điện thoại của bạn" oninput="validatePhoneInput(this)">
                            </div>
                            <div class="auth-form__group">
                                <input type="password" name="password" class="auth-form__input" id="auth-form__inputpassword" placeholder="Mật khẩu của bạn">
                            </div>
                            <div class="auth-form__group">
                                <input type="password" name="confirm_password" class="auth-form__input" id="auth-form__inputconfirm" placeholder="Nhập lại Mật khẩu của bạn">
                            </div>
                        </div>
                        <div class="auth-form__controls auth-form__controls__fix">
                            <button type="submit" class="btn btn--primary" onclick="run()">ĐĂNG KÝ</button>
                        </div>
                    </form> 
                    <button class="auth-form__group_button" onclick="togglePasswordVisibility()">Hiển thị mật khẩu</button>
                </div>              
        </div>
    </div>
</body>
    <script src="./assets/js/index.js"></script>
    <script src="./assets/js/user.js"></script>
</html>
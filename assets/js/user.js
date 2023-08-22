function validatePhoneInput(input) {
	input.value = input.value.replace(/[^0-9]/g, ''); // Chỉ giữ lại các ký tự số
}
function run() {
	var phone = document.getElementById('auth-form__inputphone').value;
	var password = document.getElementById('auth-form__inputpassword').value;
	var confirm_password = document.getElementById('auth-form__inputconfirm').value;
	
	if(phone == "")
	{
		alert("số điện thoại không được để trống");
	}
	else if(password == ""){
		alert("mật khẩu không được để trống!");
	}
	else if(confirm_password == ""){
		alert("Xác nhận mật khẩu không được để trống !");
	}
	else if(confirm_password != password){
		alert("không trùng với mật khẩu")
	}
	else {
		alert("Đăng ký thành công!");
		return true;
	}
	return false;
}
function togglePasswordVisibility() {
    var passwordInput = document.getElementById('auth-form__inputpassword');
    var ComfirmpasswordInput = document.getElementById('auth-form__inputconfirm');
    var passwordButton = document.querySelector('.auth-form__group_button');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordButton.textContent = 'Ẩn mật khẩu';
    } else {
        passwordInput.type = 'password';
        passwordButton.textContent = 'Hiển thị mật khẩu';
    }

	if (ComfirmpasswordInput.type === 'password') {
        ComfirmpasswordInput.type = 'text';
    } else {
        ComfirmpasswordInput.type = 'password';
    }
}
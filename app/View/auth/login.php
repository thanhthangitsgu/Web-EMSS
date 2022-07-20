<?php

use App\Core\Session;
use App\Core\View;
use App\Core\Redirect;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/pages/auth.css') ?>">
    <link rel="shortcut icon" href="<?= View::assets('images/logo/logo_.png') ?>" type="image/x-icon')" />
    <link rel="stylesheet" href="<?= View::assets('vendors/toastify/toastify.css') ?>">

</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="<?= View::assets('images/logo/logo_.png') ?>" alt="Logo"></a>
                    </div>
                    <h3 class="auth-title">ĐĂNG NHẬP </h3>
                    <p class="auth-subtitle mb-5">Nhập thông tin của bạn để đăng nhập</p>
                    <form name="login-form" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="user_name" type="text" name="user_name" class="form-control form-control-xl" placeholder="Tên đăng nhập">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" type="password" name="password" class="form-control form-control-xl" placeholder="Mật khẩu">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-login btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Đăng nhập</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Bạn chưa có tài khoản?
                            <a href="<?= View::url('auth/register') ?>" class="font-bold">Đăng ký</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7  auth-right">
                <img src="<?= View::assets('images/bg/bg-1.jpg') ?>" class="img-bg">
            </div>
        </div>
    </div>
    <script src="<?= View::assets('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.validate.js') ?>"></script>
    <script src="<?= View::assets('vendors/toastify/toastify.js') ?>"></script>

    <script>
        $(document).ready(function() {
            // Select form có name = login-form (giống như select bằng js thuần)
            $("form[name='login-form']").validate({
                // Định nghĩa rule validate
                rules: {
                    user_name: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    // Báo lỗi chung cho required và email
                    user_name: "Vui lòng nhập tên đăng nhập",
                    // Message báo lỗi cụ thể cho từng trường hợp
                    password: {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: "Mật khẩu của bạn không được ngắn hơn 8 ký tự"
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    checkLogin();

                }
            });

            function checkLogin() {
                $.post('http://localhost/emss/auth/loginPost', {
                    user_name: $('#user_name').val(),
                    password: $('#password').val(),
                }).done(function(data) {
                    if (data['thanhcong']) {
                        window.location.href = "http://localhost/emss/";
                    }else{
                        Toastify({
                            text: data['summary'],
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                })
            }
        });
    </script>
</body>

</html>
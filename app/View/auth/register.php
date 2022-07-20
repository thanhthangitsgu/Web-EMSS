<?php

use App\Core\View;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/pages/auth.css') ?>">
    <link rel="shortcut icon" href="<?= View::assets('images/logo/logo_.png') ?>" type="image/x-icon')" />
    <style>
    .content {
        width: 90% !important;
        border-radius: 2em;
        border-width: 0px;
        box-sizing: border-box;
        border-style: solid;
        box-shadow: 0 0 10px 4px #CCFFCC;
        padding: 1em;
    }

    .page {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    html,
    body {
        height: 100%;
    }

    .form-label {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .row {
        padding-left: 1;
        padding-right: 1;
    }
    </style>
</head>

<body class="body">
    <div class="page" id="page">
        <div class="row content " id="card">
            <div class="col-8">
                <h3 class="auth-title">ĐĂNG KÝ </h3>
                <p class="auth-subtitle mb-5">Nhập thông tin của bạn để đăng ký</p>
                <form name="register-form" id="register" method="post">
                    <div class="row">
                        <div class="form-group row col-6">
                            <label for="lastname" class="col-sm-4 col-form-label">Họ lót:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    placeholder="Họ lót">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="firstname" class="col-sm-4 col-form-label">Tên:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    placeholder="Tên">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-6">
                            <label for="cmnd" class="col-sm-4 col-form-label">CMND:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="CMND">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="firstname" class="col-sm-4 col-form-label">Ngày sinh:</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Tên">
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="sex" class="col-sm-4 col-form-label">Giới tính:</label>
                            <div class="col-sm-8 row">
                                <div class="col-6">
                                    <input type="radio" name="sex" id="male" value="Nam" checked=checked>
                                    <label class="form-check-label col-form-label" for="male"> Nam </label>
                                </div>
                                <div class="col-6">
                                    <input class="" type="radio" name="sex" valune="Nữ" id="female">
                                    <label class="form-check-label col-form-label" for="female"> Nữ </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="phone_number" class="col-sm-4 col-form-label">SĐT:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="Số điện thoại">
                            </div>
                        </div>
                    </div>
                    <div class=" from-group row" style="padding-right: 1.5em; padding-left:0em" ;>
                        <label for="address" class="col-2 col-form-label ">Địa chỉ:</label>
                        <div class="col-10 row form-group">
                            <div class="col-4">
                                <select class="form-control" name="province" id="tinh">
                                    <option value='-1'>Chọn TP/Tỉnh</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control" name="district" id="huyen">
                                    <option value='-1'>Chọn Quận/Huyện</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control" name="ward" id="xa">
                                    <option value='-1'>Chọn Phường/Xã</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group" ;>
                        <label for="" class="col-2 col-form-label"> </label>
                        <div class="col-10 row">
                            <div class="col-6 row">
                                <input type="text" class="form-control" id="village" name="village"
                                    placeholder="Thôn/ấp">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" id="home" name="home" placeholder="Số nhà">
                            </div>
                        </div>

                    </div>
                    <div class="row form-group">
                        <label for="email" class="col-2 col-form-label"> Email</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="password" class="col-2 col-form-label"> Mật khẩu</label>
                        <div class="col-9">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="confirm" class="col-2 col-form-label"> Xác nhận</label>
                        <div class="col-9">
                            <input type="password" class="form-control" id="confirm" name="confirm"
                                placeholder="Xác nhận mật khẩu">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"><button
                                class="btn btn-login btn-primary btn-block btn-lg shadow-lg mt-5">Đăng ký</button></div>
                        <div class="col-6">
                            <div class="text-center mt-5 text-lg fs-4">
                                <p class="text-gray-600">Bạn đã có tài khoản?
                                    <a href="<?= View::url('auth/login') ?>" class="font-bold">Đăng nhập</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4 form-label" style=" border-left: 1px solid #000080">
                <img src=<?= View::assets('images/logo/logo_.png') ?> width=100%>
            </div>
        </div>
    </div>
    <script src="<?= View::assets('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.validate.js') ?>"></script>
    <script src="<?= View::assets('js\address.js') ?>"></script>
    <script>
    $(document).ready(function() {
        //Valiate form trước khi submit
        $("form[name='register-form']").validate({
            // Định nghĩa rule validate
            rules: {
                lastname: {
                    required: true,
                },
                firstname: {
                    required: true,
                },
                cmnd: {
                    required: true,
                    minlength: 9,
                },
                birthday: {
                    required: true,
                },
                phone_number: {
                    required: true,
                    number: true,
                },
                province: {
                    min: 0
                },
                district: {
                    min: 0
                },
                ward: {
                    min: 0
                },
                email: {
                    email: true,
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirm: {
                    equalTo: '#password',
                    minlength: 8,
                    required: true,
                }
            },
            //Tạo massages:
            messages: {
                lastname: "Vui lòng nhập họ lót",
                firstname: "Vui lòng nhập tên",
                cmnd: {
                    required: "Vui lòng nhập số chứng minh nhân dân",
                    minlength: "Định dạng CMND không hợp lệ",
                },
                birthday: "Vui lòng chọn ngày sinh",
                phone_number: {
                    required: "Vui lòng nhập số điện thoại",
                    number: "Vui lòng nhập đúng định dạng"
                },
                province: "Vui lòng chọn tỉnh/thành phố",
                district: "Vui lòng chọn huyện/quận",
                ward: "Vui lòng chọn xã/phường",
                email: {
                    email: "Vui lòng nhập đúng định dạng",
                    required: "Vui lòng nhập email"
                },
                password: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Vui lòng nhập nhiều hơn 8 ký tự"
                },
                confirm: {
                    equalTo: "Mật khẩu không khớp",
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Vui lòng nhập nhiều hơn 8 ký tự"
                }
            },
            submitHandler: function(form) {
                doRegister();
            }
        });

        function doRegister() {
            $("form[name='register-form']").submit(function(event) {
                event.preventDefault();
                var ajax =
                    $.post(
                        'http://localhost/emss/auth/registerPost', {
                            lastname: $('#lastname').val(),
                            firstname: $('#firstname').val(),
                            cmnd: $('#cmnd').val(),
                            birthday: $('#birthday').val(),
                            sex: $('input[name="sex"]').val(),
                            phone_number: $('#phone_number').val(),
                            province: $('.tinh:selected').text(),
                            district: $('.huyen:selected').text(),
                            ward: $('.xa:selected').text(),
                            village: $('#village').val(),
                            home: $('#home').val(),
                            email: $('#email').val(),
                            password: $('#password').val()
                        })
                ajax.done(function(data) {
                    if (data['thanhcong']) window.location.href =
                        "http://localhost/emss/auth/login";
                    else alert(data['error']);
                })
                ajax.fail(function(data) {
                    alert("Đăng ký thất bại");
                })
            })
        }


        /**Lấy danh sách tỉnh huyện xã */
        var address = $.xResponse();
        address.forEach(function(element, index) {
            $('#tinh').append('<option class="tinh" value="' + index + '">' + element['name'] +
                '</option>');
        })
        $('#tinh').change(function() {
            $('#huyen').empty();
            $('#huyen').append('<option value="-1"> Chọn Quận/Huyện</option>')
            $('#xa').empty();
            $('#xa').append('<option value="-1"> Chọn Phường/Xã </option>')
            var districs = address[$('#tinh').val()]['districts'];
            districs.forEach(function(element, index) {
                $('#huyen').append('<option class="huyen" value="' + index + '">' + element[
                    'name'] + '</option>')
            })
            $('#huyen').change(function() {
                $('#xa').empty();
                $('#xa').append('<option value="-1"> Chọn Phường/Xã </option>')
                var wards = districs[$('#huyen').val()]['wards'];
                wards.forEach(function(element, index) {
                    $('#xa').append('<option  class="xa" value="' + index + '">' +
                        element['name'] + '</option>')
                })
            })
        });

    })
    </script>
</body>

</html>
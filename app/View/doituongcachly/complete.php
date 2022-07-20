<?php

use App\Core\View;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMSS</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/toastify/toastify.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>" />
    <link rel="shortcut icon" href="<?= View::assets('images/logo/logo_.png') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= View::assets('css/quan.css') ?>" />
    <style>
    body {
        font-family: 'Times New Roman';
        background-color: white;
        color: black;
        line-height: 15px;
    }

    #quochieu {
        text-align: center;
        margin-top: 50px;
        line-height: 10px;
        font-weight: bold;
        font-size: 20px;
    }

    #date {
        text-align: right;
    }

    #app {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    #date {
        font-style: italic;
    }

    #title {
        text-align: center;
        margin-top: 50px;
        line-height: 10px;
        font-weight: bold;
        font-size: 18px;
    }

    #person {
        line-height: 2em;
        width: 100%;
    }

    #person td {
        width: 40%;
    }

    #person .table-title {
        font-weight: bold;
        width: 20%;
    }
    </style>
</head>

<body>
    <div id="app">
        <div id="quochieu">
            <p>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
            <p style="font-size:18px; text-decoration:underline">Độc lập - Tự do - Hạnh phúc</p>
        </div>
        <br>
        <div id="date">
            Ngày..........Tháng......... Năm..........
        </div>
        <div id="title">
            <p> GIẤY XÁC NHẬN HOÀN THÀNH CÁCH LY Y TẾ</p>
        </div>
        <div id="content">
            <p>Ban chỉ đạo phòng chống
                dịch............................................................................... </p>
            Căn cứ Quyết định cách ly số: ................../QĐ..............., ngày..../..../..... xác nhận:
            <br><br><br>
            <div>
                <table id="person">
                    <tr>
                        <td class="table-title">Ông/Bà:</td>
                        <td id="name" class="personal"></td>
                        <td class="table-title"> Giới tính:</td>
                        <td id="sex" class="personal"></td>
                    </tr>
                    <tr>
                        <td class="table-title">Ngày sinh:</td>
                        <td id="birthday" class="personal"></td>
                        <td class="table-title"> Số điện thoại:</td>
                        <td id="phone" class="personal"></td>
                    </tr>
                    <tr>
                        <td class="table-title">Số CMND:</td>
                        <td id="CMND" class="personal"></td>
                        <td class="table-title"> Quốc tịch:</td>
                        <td id="quoctich" class="personal">Việt Nam</td>
                    </tr>
                    <tr>
                        <td class="table-title">Địa chỉ lưu trú:</td>
                        <td id="address" class="personal" colspan="3"></td>
                    </tr>
                    <tr>
                        <td class="table-title">Địa chỉ cách ly:</td>
                        <td id="address2" class="personal" colspan="3"></td>
                    </tr>
                    <tr>
                        <td class="table-title">Lý do cách ly: </td>
                        <td id="reason" class="personal" colspan="3"> Liên quan đến yếu tố dịch tễ</td>
                    </tr>
                </table>
            </div>
            <div>
                <div id="title">
                    <p> ĐÃ HOÀN THÀNH CÁCH LY Y TẾ</p>
                </div>
                <span>Thời gian thực hiện cách ly: </span><span id="time" style="padding-left:2em">Từ ngày .... đến hết
                    ngày ......</span>
            </div>
            <div>
                <div id="title" style="text-align:right">
                    <p> BAN CHỈ ĐẠO PHÒNG CHỐNG DỊCH</p>
                </div>
                <div id="qr">
                </div>
            </div>
        </div>
    </div>
    <script src="<?= View::assets('vendors/toastify/toastify.js') ?>"></script>
    <script src="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= View::assets('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.validate.js') ?>"></script>
    <script src="<?= View::assets('js/main.js') ?>"></script>
    <script src="<?= View::assets('js/changepass.js') ?>"></script>
    <script src="<?= View::assets('js/menu.js') ?>"></script>
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script src="<?= View::assets('js/address.js') ?>"></script>
    <script>
    $(document).ready(function() {
        //Lấy thời gian 
        $('#date').text(getDateTime());

        $.ajax({
            url: 'http://localhost/emss/auth/getUser',
        }).done(function(response) {
            $.ajax({
                url: `http://localhost/emss/nguoidung/getOneByID`,
                data: {
                    ma_nguoi_dung: response,
                },
                type: 'POST'
            }).done(function(res2) {
                if (res2[0]['ma_vai_tro'] != 1) {
                    if (getID() != response) {
                        alert("Bạn không có quyền truy cập vào trang này");
                        window.top.close();
                    } else {
                        getPerson();
                    }
                } else {
                    getPerson();
                }
            })
        })
    })
    //Format tg bắt đầu
    function formatDateTime(datetime) {
        let temp = datetime.split('-');
        temp_2 = temp[2].split(" ");
        return temp_2[0] + '-' + temp[1] + '-' + temp[0];
    }
    //Format tg kết thúc
    function formatDateTime_2(datetime) {
        let temp = datetime.split('-');
        return temp[2] + '-' + temp[1] + '-' + temp[0];
    }
    //Lấy thời gian
    function getDateTime() {
        var d = new Date();
        var yyyy = d.getFullYear();
        var mm = d.getMonth() + 1;
        var dd = d.getDate();
        return "Ngày " + (dd < 10 ? '0' + mm.toString() : dd) + " tháng " + (mm < 10 ? '0' + mm.toString() : mm) +
            " năm " + yyyy;
    }
    //Lấy id đối tượng
    function getID() {
        var url = location.href;
        var index1 = url.indexOf('id=');
        var index2 = url.indexOf('&');
        var str = url;
        if (index2 != -1) {
            str.slice(index1, index2);
        } else str.slice(index1);
        var str2 = "";
        for (var i = 0; i < str.length; i++)
            if (str[i] < '9' && str[i] > '0') str2 += str[i];
        return parseInt(str2, 10);
    }
    //Đổ thông tin vào đơn
    function getPerson() {
        $.ajax({
            url: `http://localhost/emss/nguoidung/getOneByID`,
            data: {
                ma_nguoi_dung: getID()
            },
            type: 'POST'
        }).done(function(response) {
            $('#name').text(response[0].ho_lot + " " + response[0].ten);
            $('#sex').text(response[0].phai);
            $('#CMND').text(response[0].cmnd);
            $('#address').text(response[0].dia_chi);
            $('#phone').text(response[0].so_dien_thoai);
            $('#birthday').text(response[0].ngay_sinh)
            $.ajax({
                url: `http://localhost/emss/doituongcachly/getFile`,
                data: {
                    ma_doi_tuong: getID()
                },
                type: 'POST'
            }).done(function(response_2) {
                $('#time').text(
                    `Từ ngày ${formatDateTime(response_2[0].tg_bat_dau)} đến hết ngày ${formatDateTime_2(response_2[0].tg_ket_thuc)}`
                )
                createQR();
                $.ajax({
                    url: 'http://localhost/emss/diadiem/getOneByID',
                    data: {
                        id: response_2[0]['ma_dia_diem']
                    },
                    type: 'POST',
                }).done(function(data_3) {
                    var address = "";
                    if (data_3[0].so_nha != '') address += data_3[0].so_nha + ' - ';
                    if (data_3[0].ap_thon != '') address += data_3[0].ap_thon + ' - ';
                    address +=
                        `${data_3[0].phuong_xa} - ${data_3[0].quan_huyen} - ${data_3[0].tp_tinh}`;
                    $('#address2').text(data_3[0].ten_dia_diem + " (" + address + ")");
                    window.print();
                })
            })
        })

    }
    //Tạo qrcode
    function createQR() {
        var admin = $.ajax({
            url: 'http://localhost/emss/doituongcachly/getFile',
            data: {
                ma_doi_tuong: getID(),
            },
            type: 'POST'
        });
        var user = $.ajax({
            url: 'http://localhost/emss/nguoidung/getOneByID',
            data: {
                ma_nguoi_dung: getID()
            },
            type: 'POST'
        })
        $.when(admin, user).done(function(data_1, data_2) {
            var name = data_2[0][0].ho_lot + " " + data_2[0][0].ten;
            name = name.toLocaleLowerCase();
            var text_create = name.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a").replace(/\ /g, '')
                .replace(/đ/g, "d").replace(/đ/g, "d").replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y").replace(
                    /ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u").replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ.+/g, "o").replace(
                    /è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ.+/g, "e").replace(/ì|í|ị|ỉ|ĩ/g, "i");
            name = text_create.toUpperCase();
            var time = $('#time').text().match(/\d/g);
            var number = time.join("");
            var birthday = data_2[0][0].ngay_sinh.match(/\d/g);
            var _birthday = birthday.join("");
            var text =
                `${data_1[0][0].cmnd}|${data_2[0][0].cmnd}|${name}|${_birthday}|${data_2[0][0].so_dien_thoai}|${number} `;
            $.ajax({
                url: 'http://localhost/emss/decode/encryptRSA',
                data: {
                    text: text,
                },
                type: 'POST'
            }).done(function(response) {
                $('#qr').html(
                    `<img src="https://huynhtanmao.com/barcode-master/barcode.php?f=jpg&s=qr&d=${response}"/>`
                );
            })

        })

    }
    </script>
</body>

</html>
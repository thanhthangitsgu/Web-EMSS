<?php

use App\Core\View;
use App\Core\Cookie;
View::$activeItem = 'dashboard';
date_default_timezone_set('Asia/Ho_Chi_Minh')
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
</head>

<body>
    <div id="app">
        <!-- SIDEBAR -->
        <?php View::partial('sidebar')  ?>
        <div id="main" class="layout-navbar">
            <!-- HEADER -->
            <?php View::partial('header')  ?>
            <?php View::partial('changepass')  ?>
            <div id="main-content">
                <div class="page-heading">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">

                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="assets/images/samples/4-640x360.png"
                                        alt="Card image cap" style="height: 20rem" />
                                    <div class="card-body">
                                        <h4 class="card-title">Tra cứu địa điểm cách ly</h4>
                                        <div class=" from-group row" style="padding-right: 1.5em; padding-left:0em" ;>
                                            <div class="col-12 row form-group">
                                                <div class="col-4">
                                                    <select class="form-control" name="province" id="tinh">
                                                        <option value='-1'>TP/Tỉnh</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select class="form-control" name="district" id="huyen">
                                                        <option value='-1'>Quận/Huyện</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select class="form-control" name="ward" id="xa">
                                                        <option value='-1'>Phường/Xã</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <section class="section">
                                <div class="page-title" style="padding-left: 5%">
                                    <h3>Danh sách địa điểm</h3>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-danger" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th class="w-35">Tên địa điểm</th>
                                                        <th>Địa chỉ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <nav class="mt-5">
                                                <ul id="pagination" class="pagination justify-content-center">
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                            </section>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                                <div class="card-content">

                                    <img class="card-img-top img-fluid" src="assets/images/samples/tiem-chung.png">
                                    <div class="card-body">
                                        <a href="https://tiemchungcovid19.gov.vn/portal/search" target="blank"> Tra cứu
                                            >></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <?php View::partial('footer')  ?>
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
    <script src="<?= View::assets('js/xml2json.js') ?>"></script>
    <script src="<?= View::assets('js/address.js') ?>"></script>
    <script>
    let currentPage = 1;
    let search = "";
    let search2 = "";
    $(function() {
        getAddressAjax();
        var address = $.xResponse();
        address.forEach(function(element, index) {
            $('#tinh').append('<option class="tinh" value="' + index + '">' + element['name'] +
                '</option>');
        })
        $('#tinh').change(function() {
            $('#huyen').empty();
            $('#huyen').append('<option value="-1">Quận/Huyện</option>')
            $('#xa').empty();
            $('#xa').append('<option value="-1">Phường/Xã </option>')
            var districs = address[$('#tinh').val()]['districts'];
            districs.forEach(function(element, index) {
                $('#huyen').append('<option class="huyen" value="' + index + '">' + element[
                    'name'] + '</option>')
            })
            $('#huyen').change(function() {
                $('#xa').empty();
                $('#xa').append('<option value="-1">Phường/Xã </option>')
                var wards = districs[$('#huyen').val()]['wards'];
                wards.forEach(function(element, index) {
                    $('#xa').append('<option  class="xa" value="' + index + '">' +
                        element['name'] + '</option>')
                })
            })
        });

        function changePage(newPage) {
            console.log(newPage);
            currentPage = newPage;
            getAddressAjax();
        }

        $('#tinh').change(function() {
            search2 = '1';
            search = $('#tinh option').filter(':selected').text();
            getAddressAjax();
        })

        $('#huyen').change(function() {
            search2 = '2';
            search = $('#tinh option').filter(':selected').text() + '::' + $('#huyen option').filter(
                ':selected').text();;
            getAddressAjax();
        })

        $('#xa').change(function() {
            search2 = '3';
            search = $('#tinh option').filter(':selected').text() + '::' + $('#huyen option').filter(
                ':selected').text() + '::' + $('#xa option').filter(':selected').text();
            getAddressAjax();
        })

        function getAddressAjax() {
            $.get(`http://localhost/emss/diadiem/getAddressHome?rowsPerPage=10&page=${currentPage}&search=${search}&search2=${search2}`,
                function(response) {
                    const table1 = $('#table1 > tbody');
                    table1.empty();
                    checkedRows = [];
                    $row = 0;
                    response.data.forEach(data => {
                        if ($row % 2 == 0) {
                            table1.append(`
                        <tr class="table-light">
                        <td>${data.ten_dia_diem}</td>
                            <td> ${data.so_nha} - ${data.ap_thon} - ${data.phuong_xa} - ${data.quan_huyen} - ${data.tp_tinh}</td>
                        </tr>`);
                        } else {
                            table1.append(`
                        <tr class="table-info">
                            <td>${data.ten_dia_diem}</td>
                            <td> ${data.so_nha} - ${data.ap_thon} - ${data.phuong_xa} - ${data.quan_huyen} - ${data.tp_tinh}</td>
                        </tr>`);
                        }
                    });

                    const pagination = $('#pagination');
                    // Xóa phân trang cũ
                    pagination.empty();
                    if (response.totalPage > 1) {
                        for (let i = 1; i <= response.totalPage; i++) {
                            if (i == currentPage) {
                                pagination.append(`
                                <li class="page-item active">
                                    <button class="page-link" onClick='changePage(${i})'>${i}</button>
                                </li>`)
                            } else {
                                pagination.append(`
                                <li class="page-item">
                                    <button class="page-link" onClick='changePage(${i})'>${i}</button>
                                </li>`)
                            }

                        }
                    }

                });
        }
    });
    </script>
</body>

</html>
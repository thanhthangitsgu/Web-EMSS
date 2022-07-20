<?php

use App\Core\View;

View::$activeItem = 'trace';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMSS</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
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
                    <div class="col-sm-6">
                        <h6>Tìm Kiếm</h6>
                        <div id="search-user-form" name="search-user-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="serch-user-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
                                <div class="form-control-icon">
                                    <i class="bi bi-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-7 order-md-1 order-last">
                                <label>
                                    <h3>Lịch sử truy vết</h3>
                                </label>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='do-trace' class="btn btn-primary">
                                        <i class="bi bi-share-fill icon-mid"></i> Tiến hành truy vết
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-danger" id="table">
                                        <thead>
                                            <tr>
                                                <th class="d-none check">Chọn</th>
                                                <th>Mã truy vết</th>
                                                <th>Mã bệnh nhân</th>
                                                <th>Mã nhân viên</th>
                                                <th>Thời gian truy vết</th>
                                                <th>Thời gian bắt đầu</th>
                                                <th>Thời gian kết thúc</th>
                                            </tr>
                                        </thead>
                                        <tbody id="content">
                                        </tbody>
                                    </table>
                                    <nav class="mt-5">
                                        <ul id="pagination_" class="pagination justify-content-center">
                                        </ul>
                                    </nav>

                                </div>
                            </div>
                    </section>
                </div>
                <!-- Model trace -->
                <div class="modal fade" id="modal-trace">
                    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header bg-warning">
                                <h2 class="modal-title text-light">Truy vết</h2>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body row" id="modal-content-delete">
                                <div class="form-group">
                                    <label for="ma_benh_nhan" class="col-form-label">Chọn đối tượng:</label>
                                    <select class="form-control " name="ma_benh_nhan" id="ma_benh_nhan">
                                        <option value='-1'>Chọn</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="ma_benh_nhan" class="col-form-label">Thời gian bắt đầu:</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="date" class="form-control" id="tgbd">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="ma_benh_nhan" class="col-form-label">Thời gian kết thúc:</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="date" class="form-control" id="tgkt">
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-danger" id="btn-confirm" data-bs-dismiss="modal">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Model result -->
                <div class="modal fade " id="modal-result">
                    <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header bg-warning">
                                <h2 class="modal-title text-light">Truy vết</h2>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body row">
                                <div class="col-6 form-group row">
                                    <div class="col-6">
                                        <label class="col-form-label">Xem theo:</label>
                                    </div>
                                    <div class="col-6">
                                        <select name="view" id="view" class="form-control">
                                            <option value="1">Mốc dịch tễ</option>
                                            <option value="2">F1</option>
                                            <option value="3">F2</option>
                                        </select>
                                    </div>
                                </div>
                                <table class="table mb-0 table-danger" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Mã địa điểm</th>
                                            <th>Tên địa điểm</th>
                                            <th>Địa chỉ</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content-table">
                                    </tbody>
                                </table>
                                <table class="table mb-0 table-danger" id="table2">
                                    <thead>
                                        <tr>
                                            <th>Họ và tên</th>
                                            <th>CMND</th>
                                            <th>Địa chỉ</th>
                                            <th>Ngày sinh</th>
                                            <th>Giới tính</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content-table-2">
                                    </tbody>
                                </table>
                                <table class="table mb-0 table-danger" id="table3">
                                    <thead>
                                        <tr>
                                            <th>Họ và tên</th>
                                            <th>CMND</th>
                                            <th>Địa chỉ</th>
                                            <th>Ngày sinh</th>
                                            <th>Giới tính</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content-table-3">
                                    </tbody>
                                </table>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <!--<button type="button" class="btn btn-danger" id="btn-confirm" data-bs-dismiss="modal">Xác nhận</button>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Model F1 -->

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
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script src="<?= View::assets('js/address.js') ?>"></script>
    <script>
        $(document).ready(function() {
            getList(1);
            $('#do-trace').click(function() {
                $('#modal-trace').modal('show');
            })
            $('#table2').hide();
            $('#table3').hide();

            function getList(current_page) {
                var list = $.ajax({
                    url: 'http://localhost/emss/truyvet/getList?current_page=' + current_page +
                        '&row_per_page=5',
                    type: 'get',
                });
                list.done(function(data) {
                    $('#content').empty();
                    var row = 1;
                    data['data'].forEach(function(element, index) {
                        var code = '<tr class="table-light">\
                                        <td class="d-none check"><input type="checkbox" value="' + element[
                                'ma_truy_vet'] +
                            '" class="form-check-input del-check shadow-none ' + element[
                                'ma_truy_vet'] + '"></td>\
                                        <td>' + element['ma_truy_vet'] + '</td>\
                                        <td>' + element['ma_benh_nhan'] + '</td>\
                                        <td>' + element['ma_nhan_vien'] + '</td>\
                                        <td>' + element['thoi_gian_truy_vet'] + '</td>\
                                        <td>' + element['tg_bat_dau'] + '</td>\
                                        <td>' + element['tg_ket_thuc'] + '</td>\
                                    </tr>';
                        if (row % 2) code = '<tr class="table-secondary">\
                                        <td class="d-none check"><input type="checkbox" value="' + element[
                                'ma_truy_vet'] +
                            '" class="form-check-input del-check shadow-none ' + element[
                                'ma_truy_vet'] + '"></td>\
                                        <td>' + element['ma_truy_vet'] + '</td>\
                                        <td>' + element['ma_benh_nhan'] + '</td>\
                                        <td>' + element['ma_nhan_vien'] + '</td>\
                                        <td>' + element['thoi_gian_truy_vet'] + '</td>\
                                        <td>' + element['tg_bat_dau'] + '</td>\
                                        <td>' + element['tg_ket_thuc'] + '</td>\
                                    </tr>';
                        $('#content').append(code);
                        row = row + 1;
                    })

                    var getBenhNhan = $.ajax({
                        url: 'http://localhost/emss/benhnhan/getAll',
                    });
                    getBenhNhan.done(function(data) {

                        data.forEach(function(element) {
                            $('#ma_benh_nhan').append('<option  class="select" value="' +
                                element['ma_benh_nhan'] + '"> ' + element[
                                    'ma_benh_nhan'] + ' - ' + element['ho_lot'] + ' ' +
                                element['ten'] + ' </option>')
                        });
                        $('#btn-confirm').click(function() {
                            $('#modal-result').modal('show');
                            $('#modal-trace').modal('hide');
                            $.ajax({
                                url: 'http://localhost/emss/truyvet/add',
                                data: {
                                    ma_benh_nhan: 30,
                                    tg_bat_dau: '2021-12-20',
                                    tg_ket_thuc: '2021-12-23',
                                },
                                type: 'POST'
                            }).done(function(data) {
                                getList(1);
                            })
                            $.ajax({
                                url: 'http://localhost/emss/truyvet/getSchedule',
                                data: {
                                    ma_doi_tuong: $('.select:selected').val(),
                                    tg_bat_dau: $('#tgbd').val(),
                                    tg_ket_thuc: $('#tgkt').val(),
                                },
                                type: 'POST'
                            }).done(function(data) {
                                $.ajax({
                                    url: 'http://localhost/emss/diadiem/getList',
                                }).done(function(data_l) {
                                    $('#content-table').empty();
                                    data['location'].forEach(function(
                                        element, index) {
                                        var temp = data_l['ma_' +
                                            element[
                                                'ma_dia_diem']];
                                        var code = '<tr class="table-light">\
                                            <td>' + element['ma_dia_diem'] + '</td>\
                                            <td>' + temp['ten_dia_diem'] + '</td>\
                                            <td>' + temp['tp_tinh'] + " - " + temp['quan_huyen'] + " - " + temp[
                                            'phuong_xa'] + '</td>\
                                        </tr>';
                                        $('#content-table').append(
                                            code);
                                    });
                                })
                                $('#view').change(function() {
                                    if ($('#view').val() == 1) {
                                        $('#table1').show();
                                        $('#table2').hide();
                                        $('#table3').hide();
                                        $.ajax({
                                            url: 'http://localhost/emss/diadiem/getList',
                                        }).done(function(data_l) {
                                            $('#content-table')
                                                .empty();
                                            var row = 1;
                                            data['location']
                                                .forEach(function(
                                                    element,
                                                    index) {
                                                    var temp =
                                                        data_l[
                                                            'ma_' +
                                                            element[
                                                                'ma_dia_diem'
                                                            ]
                                                        ];
                                                    var code = '<tr class="table-light">\
                                            <td>' + element['ma_dia_diem'] + '</td>\
                                            <td>' + temp['ten_dia_diem'] + '</td>\
                                            <td>' + temp['tp_tinh'] + " - " + temp['quan_huyen'] + " - " + temp[
                                                        'phuong_xa'
                                                    ] + '</td>\
                                        </tr>';
                                                    if (row %
                                                        2) {
                                                        code = '<tr class="table-secondary">\
                                            <td>' + element['ma_dia_diem'] + '</td>\
                                            <td>' + temp['ten_dia_diem'] + '</td>\
                                            <td>' + temp['tp_tinh'] + " - " + temp['quan_huyen'] + " - " + temp['phuong_xa'] + '</td>\
                                        </tr>';
                                                    }
                                                    $('#content-table')
                                                        .append(
                                                            code
                                                        );
                                                });
                                        })
                                    } else
                                    if ($('#view').val() == 2) {
                                        $('#table2').show();
                                        $('#table1').hide();
                                        $('#table3').hide();
                                        $.ajax({
                                            url: 'http://localhost/emss/nguoidung/getAll'
                                        }).done(function(data_f1) {
                                            $('#content-table-2')
                                                .empty();
                                            var row = 1;
                                            data['F1'].forEach(
                                                function(
                                                    element) {
                                                    var temp =
                                                        data_f1[
                                                            'ma_' +
                                                            element[
                                                                'ma_nguoi_dung'
                                                            ]
                                                        ];
                                                    var code = '<tr class="table-light">\
                                            <td>' + temp['ho_lot'] + " " + temp['ten'] + '</td>\
                                            <td>' + temp['cmnd'] + '</td>\
                                            <td>' + temp['dia_chi'] + '</td>\
                                            <td>' + temp['ngay_sinh'] + '</td>\
                                            <td>' + temp['phai'] + '</td>\
                                        </tr>';
                                                    if (row %
                                                        2) {
                                                        code = '<tr class="table-secondary">\
                                            <td>' + temp['ho_lot'] + " " + temp['ten'] + '</td>\
                                            <td>' + temp['cmnd'] + '</td>\
                                            <td>' + temp['dia_chi'] + '</td>\
                                            <td>' + temp['ngay_sinh'] + '</td>\
                                            <td>' + temp['phai'] + '</td>\
                                        </tr>';
                                                    }
                                                    $('#content-table-2')
                                                        .append(
                                                            code
                                                        );
                                                })
                                        })
                                    } else if ($('#view').val() == 3) {
                                        $('#table3').show();
                                        $('#table1').hide();
                                        $('#table2').hide();
                                        $.ajax({
                                            url: 'http://localhost/emss/nguoidung/getAll'
                                        }).done(function(data_f2) {
                                            $('#content-table-3')
                                                .empty();
                                            var row = 1;
                                            data['F2'].forEach(
                                                function(
                                                    element) {
                                                    var temp_ =
                                                        data_f2[
                                                            'ma_' +
                                                            element[
                                                                'ma_nguoi_dung'
                                                            ]
                                                        ];
                                                    var code = '<tr class="table-light">\
                                            <td>' + temp_['ho_lot'] + " " + temp_['ten'] + '</td>\
                                            <td>' + temp_['cmnd'] + '</td>\
                                            <td>' + temp_['dia_chi'] + '</td>\
                                            <td>' + temp_['ngay_sinh'] + '</td>\
                                            <td>' + temp_['phai'] + '</td>\
                                        </tr>';
                                                    if (row %
                                                        2) {
                                                        code = '<tr class="table-secondary">\
                                            <td>' + temp_['ho_lot'] + " " + temp_['ten'] + '</td>\
                                            <td>' + temp_['cmnd'] + '</td>\
                                            <td>' + temp_['dia_chi'] + '</td>\
                                            <td>' + temp_['ngay_sinh'] + '</td>\
                                            <td>' + temp_['phai'] + '</td>\
                                        </tr>';
                                                    }
                                                    $('#content-table-3')
                                                        .append(
                                                            code
                                                        );
                                                })
                                        })
                                    }
                                })
                            })
                        })
                    })
                })
            }
        })
    </script>

</body>

</html>
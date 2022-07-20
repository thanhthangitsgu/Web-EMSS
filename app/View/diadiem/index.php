<?php

use App\Core\View;

View::$activeItem = 'location';

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
    <style>
        table {
            text-align: center;
        }

        .table-file {
            border-collapse: collapse;
            width: 100%;
            height: 100%;
            text-align: center;
        }

        .table-file td {
            height: 2em;
            border-width: 1.5px;
            border-color: #6699FF;
            padding: 0.75em;
            color: black;
        }

        .table-file .title {
            width: 15%;
            color: #3366CC;
            font-weight: 550;
            background-color: #ddebf8;
        }
    </style>
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
                        <div id="search-address-form" name="search-address-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="search-address-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
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
                                    <h3>Danh sách địa điểm</h3>
                                </label>
                                <br>
                                <label>
                                    <h5> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary btn-sm" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                    <option value="ma">Mã địa điểm</option>
                                    <option value="ten">Tên địa điểm</option>
                                    <option value="tinh">Tỉnh/TP</option>
                                    <option value="huyen">Quận/Huyện</option>
                                    <option value="xa">Phường/Xã</option>
                                    <option value="thon">Ấp/Thôn</option>
                                    <option value="sonha">Số nhà</option>
                                    <option value="loai">Phân loại</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-address' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa địa điểm
                                    </button>
                                    <button id='open-add-address-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm địa điểm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-danger" id="table1">
                                        <thead>
                                            <tr>
                                                <th class=" d-none check">Chọn</th>
                                                <th style="width:10px">Mã</th>
                                                <th>Tên địa điểm</th>
                                                <th>Tỉnh/TP</th>
                                                <th>Quận/Huyện</th>
                                                <th>Phường/Xã</th>
                                                <th>Loại</th>
                                                <th style="width:15%">Tác Vụ</th>
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
            </div>
            <!-- MODAL ADD -->
            <div class="modal fade text-left" id="add-address-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm địa điểm</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="add-address-form" action="/" method="POST">
                                <div class="modal-body">
                                    <label for="sohieu">Tên địa điểm:</label>
                                    <div class="form-group">
                                        <input type="text" id="addten" name="addten" placeholder="Tên địa điểm" class="form-control">
                                    </div>
                                    <label for="cars-hang">Tỉnh/TP: </label><br>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="addtinh" id="addtinh" style="margin-right: 15px;">
                                            <option value="-1">Chọn Tỉnh/TP</option>
                                        </select>
                                    </fieldset>
                                    <label for="cars-hang">Quận/Huyện: </label><br>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="addhuyen" id="addhuyen" style="margin-right: 15px;">
                                            <option value="-1">Chọn Quận/Huyện</option>
                                        </select>
                                    </fieldset>
                                    <label for="cars-hang">Phường/Xã: </label><br>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="addxa" id="addxa" style="margin-right: 15px;">
                                            <option value="-1">Chọn Phường/Xã</option>
                                        </select>
                                    </fieldset>
                                    <label for="ghethuong">Ấp/Thôn:</label>
                                    <div class="form-group">
                                        <input type="text" id="addthon" name="addthon" placeholder="Ấp/Thôn" class="form-control">
                                    </div>
                                    <label for="ghethuong">Số nhà:</label>
                                    <div class="form-group">
                                        <input type="text" id="addsonha" name="addsonha" placeholder="Số nhà" class="form-control">
                                    </div>
                                    <label for="thuonggia">Phân loại:</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="addloai" id="addloai" style="margin-right: 15px;">
                                            <option value="0" selected>Điểm kiểm dịch</option>
                                            <option value="1">Điểm cách ly</option>
                                        </select>
                                    </fieldset>
                                    <div id='addcachly'></div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Đóng</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Thêm</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- MODAL UPDATE -->
            <div class="modal fade text-left" id="update-address-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Sửa địa điểm</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="update-address-form" action="/" method="POST">
                                <div class="modal-body">
                                    <label for="upname">Tên địa điểm:</label>
                                    <div class="form-group">
                                        <input type="text" id="upten" name="upten" placeholder="Tên địa điểm" class="form-control">
                                    </div>
                                    <label for="cars-hang">Tỉnh/TP: </label><br>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="uptinh" id="uptinh" style="margin-right: 15px;">
                                            <option value="-1">Chọn Tỉnh/TP</option>
                                        </select>
                                    </fieldset>
                                    <label for="cars-hang">Quận/Huyện: </label><br>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="uphuyen" id="uphuyen" style="margin-right: 15px;">
                                            <option value="-1">Chọn Quận/Huyện</option>
                                        </select>
                                    </fieldset>
                                    <label for="cars-hang">Phường/Xã: </label><br>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="upxa" id="upxa" style="margin-right: 15px;">
                                            <option value="-1">Chọn Phường/Xã</option>
                                        </select>
                                    </fieldset>
                                    <label for="ghethuong">Ấp/Thôn:</label>
                                    <div class="form-group">
                                        <input type="text" id="upthon" name="upthon" placeholder="Ấp/Thôn" class="form-control">
                                    </div>
                                    <label for="ghethuong">Số nhà:</label>
                                    <div class="form-group">
                                        <input type="text" id="upsonha" name="upsonha" placeholder="Số nhà" class="form-control">
                                    </div>
                                    <label for="thuonggia">Phân loại:</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="uploai" id="uploai" style="margin-right: 15px;">
                                            <option value="0">Điểm kiểm dịch</option>
                                            <option value="1">Điểm cách ly</option>
                                        </select>
                                    </fieldset>
                                    <div id='upcachly'></div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Đóng</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Sửa</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Thong bao -->
            <div class="modal fade text-left" id="question-address-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title white" id="myModalLabel110">
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body" id="question-modal">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Đóng</span>
                            </button>
                            <button type="button" id="thuchien" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Thực hiện</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL THÔNG BÁO-->
            <div class="modal" id="modal-confirm-delete">
                <div class="modal-dialog modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title text-light">Xác nhận</h4>
                        </div>
                        <div class="modal-body" id="modal-content-delete">
                            Xác nhận xóa hồ sơ cách ly?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-delete-cancel">Close</button>
                            <button type="button" class="btn btn-danger" id="btn-delete-confirm" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL XEM -->
            <div class="modal fade text-left" id="view-address-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title text-light">Xem thông tin địa điểm</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table-file">
                                <tr>
                                    <td class="title">
                                        Mã địa điểm
                                    </td>
                                    <td id="view-ID">
                                        01
                                    </td>
                                    <td class="title">
                                        Tên địa điểm
                                    </td>
                                    <td id="view-name">
                                        30
                                    </td>
                                </tr>
                                <tr>
                                    <td class="title">Thành Phố/Tỉnh</td>
                                    <td id="view-provide"></td>
                                    <td class="title">Quận/Huyện</td>
                                    <td id="view-district"></td>
                                </tr>
                                <tr>
                                    <td class="title">Phường/Xã</td>
                                    <td id="view-ward"></td>
                                    <td class="title">Ấp/Thôn</td>
                                    <td id="view-village"></td>
                                </tr>
                                <tr>
                                    <td class="title">Số</td>
                                    <td id="number"></td>
                                    <td class="title">Phân loại</td>
                                    <td id="category"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Đóng</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <?php View::partial('footer')  ?>
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
            getListAdvanted(1, "", "");
            $('#search-address-text').keyup(function() {
                getListAdvanted(1, $(this).val(), $('#cars-search').val());
            })
            $('#cars-search').change(function() {
                getListAdvanted(1, $('#search-address-text').val(), $(this).val());
            })
            $("#open-add-address-btn").click(function() {
                $("#add-address-modal").modal('toggle')
                addAddress();
            });

            $('#btn-delete-address').click(function() {
                $('.check').toggleClass('d-none')
                str = "";
                $('input.del-check:checked').each(function(index, element) {
                    str += $(this).val() + '-';
                })
                str = str.slice(0, str.length - 1);
                if (str != "") {
                    del(str);
                }
            })
            loadUpdate(1);
        })
        //Các hàm
        //Hàm thay đổi trang
        function changePage(newPage) {
            getListAdvanted(newPage, $('#search-address-text').val(), $('#cars-search').val());
        }
        //Hàm load dữ liệu
        function getListAdvanted(currentPage, text, column) {
            $.get(`http://localhost/emss/diadiem/getAddress?rowsPerPage=5&page=${currentPage}&search=${text}&search2=${column}`,
                function(response) {
                    var mark = "";
                    var row = 0;
                    const content = $('#table1 > tbody');
                    content.empty();
                    response.data.forEach(function(element, index) {
                        if (row % 2) {
                            mark = 'table-light';
                        } else {
                            mark = 'table-info'
                        }
                        content.append(
                            `<tr class="${mark}">
                            <td class="check d-none"><input type="checkbox" value="${element.ma_dia_diem}" class="form-check-input del-check shadow-none ${element.ma_dia_diem}"></td>
                            <td>${element.ma_dia_diem}</td>
                            <td>${element.ten_dia_diem}</td>
                            <td>${element.tp_tinh}</td>
                            <td>${element.quan_huyen}</td>
                            <td>${element.phuong_xa}</td>
                            <td>${element.phan_loai}</td>
                            <td>
                                <button onclick="getView('${element.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="update('${element.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="del('${element.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`
                        );
                        row++;
                    })
                    $('#pagination').empty();
                    for (i = 1; i <= response.totalPage; i++)
                        if (i == currentPage) {
                            $('#pagination').append(
                                `<li class="page-item active">\<button class="page-link" onclick="changePage(${i})" id="'${i}'">${i}</button>\</li>`
                            );
                        } else $('#pagination').append(
                            `<li class="page-item">\<button class="page-link" onclick="changePage(${i})" id="'${i}'">${i}</button>\</li>`
                        );
                })
        }
        /**THÊM */
        //Hàm load dữ liệu
        function loadAdd(key) {
            var address = $.xResponse();
            address.forEach(function(element, index) {
                $(`#${key}tinh`).append('<option value="' + index + '">' + element['name'] + '</option>');
            })
            $(`#${key}tinh`).change(function() {
                $(`#${key}huyen`).empty();
                $(`#${key}huyen`).append('<option value="-1"> Chọn Quận/Huyện</option>')
                $(`#${key}xa`).empty();
                $(`#${key}xa`).append('<option value="-1"> Chọn Phường/Xã </option>')
                var districs = address[$(`#${key}tinh`).val()]['districts'];
                districs.forEach(function(element, index) {
                    $(`#${key}huyen`).append('<option value="' + index + '">' + element[
                        'name'] + '</option>')
                })
                $(`#${key}huyen`).change(function() {
                    $(`#${key}xa`).empty();
                    $(`#${key}xa`).append('<option value="-1"> Chọn Phường/Xã </option>')
                    var wards = districs[$(`#${key}huyen`).val()]['wards'];
                    wards.forEach(function(element, index) {
                        $(`#${key}xa`).append('<option value="' + index + '">' +
                            element['name'] + '</option>')
                    })
                })
            });
        }
        //Hàm thêm
        function addAddress() {
            loadAdd("add");
            $("form[name='add-address-form']").validate({
                rules: {
                    addten: {
                        required: true,
                    },
                    addsucchua: {
                        required: true,
                    },
                    addtrong: {
                        required: true,
                    },
                },
                messages: {
                    addten: {
                        required: "Vui lòng nhập tên địa điểm",
                    },
                    addsucchua: {
                        required: "Vui lòng nhập sức chứa của khu cách ly",
                    },
                    addtrong: {
                        required: "Vui lòng nhập chỗ còn trống của khu cách ly",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    var suc, trong;
                    if ($('#addloai option').filter(':selected').val() == "cachly") {
                        suc = Number($("#addsucchua").val());
                        trong = Number($("#addtrong").val());
                    } else {
                        suc = 0;
                        trong = 0;
                    }
                    var ajax = $.post(`http://localhost/emss/diadiem/add`, {
                        addten: $('#addten').val(),
                        addtinh: $('#addtinh option').filter(':selected').text(),
                        addhuyen: $('#addhuyen option').filter(':selected').text(),
                        addxa: $('#addxa option').filter(':selected').text(),
                        addthon: $("#addthon").val(),
                        addsonha: $("#addsonha").val(),
                        addloai: $('#addloai option').filter(':selected').val(),
                        addsucchua: suc,
                        addtrong: trong
                    });

                    ajax.done(function(response) {
                        $("#add-address-modal").modal('toggle')
                        if (response.thanhcong) {
                            Toastify({
                                text: "Thêm Thành Công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                            getListAdvanted(1, "", "");
                        } else {
                            Toastify({
                                text: "Thêm Thất Bại",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#FF6A6A",
                            }).showToast();
                        }
                    });
                    $('#addten').val("");
                    $('#addtinh').val("-1");
                    $('#addhuyen').val("-1");
                    $('#addxa').val("-1");
                    $('#addthon').val("");
                    $('#addsonha').val("");
                    $('#addsucchua').val("");
                    $('#addtrong').val("");
                    $('#addloai').val("kiemdich");
                }
            })
        }
        //XÓA
        function del(list_id) {
            $('#modal-confirm-delete').modal('show');
            $('#btn-delete-confirm').click(function() {
                $.ajax({
                    url: 'http://localhost/emss/diadiem/delete',
                    data: {
                        list: list_id
                    },
                    type: 'POST'
                }).done(function(response) {
                    if (!response) {
                        Toastify({
                            text: "Xóa Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        getListAdvanted(1, "", "");
                    } else {
                        Toastify({
                            text: "Xóa Thất Bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                })
            })
            $('#btn-delete-cancel').click(function() {
                $('input.del-check:checked').each(function(index, element) {
                    $(this).prop('checked', false);
                })
            })
        }
        //XEM
        //Đổ dữ liệu:
        function getView(idAddress) {
            $('#view-address-modal').modal('show');
            $.ajax({
                url: 'http://localhost/emss/diadiem/getOneByID',
                data: {
                    id: idAddress,
                },
                type: 'POST'
            }).done(function(response) {
                $('#view-ID').text(response[0].ma_dia_diem);
                $('#view-name').text(response[0].ten_dia_diem);
                $('#view-provide').text(response[0].tp_tinh);
                $('#view-district').text(response[0].quan_huyen);
                $('#view-ward').text(response[0].phuong_xa);
                $('#view-village').text(response[0].ap_thon);
                $('#number').text(response[0].so_nha);
                if (response[0].phan_loai == 0) $('#category').text('Điểm kiểm dịch');
                else {
                    $('#category').text('Điểm cách ly')
                }
            })
        }
        //SỬA
        function doUpdate(idAddress) {
            $("form[name='update-address-form']").validate({
                rules: {
                    upten: {
                        required: true,
                    },
                    upsucchua: {
                        required: true,
                    },
                    uptrong: {
                        required: true,
                    },
                },
                messages: {
                    upten: {
                        required: "Vui lòng nhập tên địa điểm",
                    },
                    upsucchua: {
                        required: "Vui lòng nhập sức chứa của khu cách ly",
                    },
                    uptrong: {
                        required: "Vui lòng nhập chỗ còn trống của khu cách ly",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    suc = 0;
                    trong = 0;
                    var ajax = $.post(`http://localhost/emss/diadiem/update`, {
                        upma: idAddress,
                        upten: $('#upten').val(),
                        uptinh: $('#uptinh option').filter(':selected').text(),
                        uphuyen: $('#uphuyen option').filter(':selected').text(),
                        upxa: $('#upxa option').filter(':selected').text(),
                        upthon: $("#upthon").val(),
                        upsonha: $("#upsonha").val(),
                        uploai: $('#uploai option').filter(':selected').text(),
                        upsucchua: suc,
                        uptrong: trong
                    });

                    ajax.done(function(response) {
                        $("#update-address-modal").modal('toggle')
                        if (response.thanhcong) {
                            Toastify({
                                text: "Sửa Thành Công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                            getListAdvanted(1, "", "");
                        } else {
                            Toastify({
                                text: "Sửa Thất Bại",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#FF6A6A",
                            }).showToast();
                        }
                    });

                }
            });
        }

        //Đổ dữ liệu vào modal sửa
        function update(idAddress) {
            $('#update-address-modal').modal('show');
            $.ajax({
                url: 'http://localhost/emss/diadiem/getOneByID',
                data: {
                    id: idAddress,
                },
                type: 'POST'
            }).done(function(response) {
                $('#upten').val(response[0].ten_dia_diem);
                $('#uptinh').html(`<option> ${response[0].tp_tinh} </option>`);
                $('#uphuyen').html(`<option> ${response[0].quan_huyen} </option>`);
                $('#upxa').html(`<option> ${response[0].phuong_xa} </option>`);
                $('#upthon').val(response[0].ap_thon);
                $('#upsonha').val(response[0].so_nha);
                $('#uploai').val(response[0].phan_loai);
                loadAdd('up');
                doUpdate(idAddress);
            })
        }

        /* $(function() {
             getAddressAjax();
             var address = $.xResponse();
             address.forEach(function(element, index) {
                 $('#addtinh').append('<option value="' + index + '">' + element['name'] +
                     '</option>');
                 $('#uptinh').append('<option value="' + index + '">' + element['name'] +
                     '</option>');
             })
             $('#addtinh').change(function() {
                 $('#addhuyen').empty();
                 $('#addhuyen').append('<option value="-1"> Chọn Quận/Huyện</option>')
                 $('#addxa').empty();
                 $('#addxa').append('<option value="-1"> Chọn Phường/Xã </option>')
                 var districs = address[$('#addtinh').val()]['districts'];
                 districs.forEach(function(element, index) {
                     $('#addhuyen').append('<option value="' + index + '">' + element[
                         'name'] + '</option>')
                 })
                 $('#addhuyen').change(function() {
                     $('#addxa').empty();
                     $('#addxa').append('<option value="-1"> Chọn Phường/Xã </option>')
                     var wards = districs[$('#addhuyen').val()]['wards'];
                     wards.forEach(function(element, index) {
                         $('#addxa').append('<option value="' + index + '">' +
                             element['name'] + '</option>')
                     })
                 })
             });

             $('#uptinh').change(function() {
                 $('#uphuyen').empty();
                 $('#uphuyen').append('<option value="-1"> Chọn Quận/Huyện</option>')
                 $('#upxa').empty();
                 $('#upxa').append('<option value="-1"> Chọn Phường/Xã </option>')
                 var districs = address[$('#uptinh').val()]['districts'];
                 districs.forEach(function(element, index) {
                     $('#uphuyen').append('<option value="' + index + '">' + element[
                         'name'] + '</option>')
                 })
                 $('#uphuyen').change(function() {
                     $('#upxa').empty();
                     $('#upxa').append('<option value="-1"> Chọn Phường/Xã </option>')
                     var wards = districs[$('#uphuyen').val()]['wards'];
                     wards.forEach(function(element, index) {
                         $('#upxa').append('<option value="' + index + '">' +
                             element['name'] + '</option>')
                     })
                 })
             });


             $("form[name='add-address-form']").validate({
                 rules: {
                     addten: {
                         required: true,
                     },
                     addsucchua: {
                         required: true,
                     },
                     addtrong: {
                         required: true,
                     },
                 },
                 messages: {
                     addten: {
                         required: "Vui lòng nhập tên địa điểm",
                     },
                     addsucchua: {
                         required: "Vui lòng nhập sức chứa của khu cách ly",
                     },
                     addtrong: {
                         required: "Vui lòng nhập chỗ còn trống của khu cách ly",
                     },
                 },
                 submitHandler: function(form, event) {
                     event.preventDefault();
                     var suc, trong;
                     if ($('#addloai option').filter(':selected').val() == "cachly") {
                         suc = Number($("#addsucchua").val());
                         trong = Number($("#addtrong").val());
                     } else {
                         suc = 0;
                         trong = 0;
                     }
                     var ajax = $.post(`http://localhost/emss/diadiem/add`, {
                         addten: $('#addten').val(),
                         addtinh: $('#addtinh option').filter(':selected').text(),
                         addhuyen: $('#addhuyen option').filter(':selected').text(),
                         addxa: $('#addxa option').filter(':selected').text(),
                         addthon: $("#addthon").val(),
                         addsonha: $("#addsonha").val(),
                         addloai: $('#addloai option').filter(':selected').text(),
                         addsucchua: suc,
                         addtrong: trong
                     });

                     ajax.done(function(response) {
                         $("#add-address-modal").modal('toggle')
                         if (response.thanhcong) {
                             currentPage = 1;
                             getAddressAjax();
                             Toastify({
                                 text: "Thêm Thành Công",
                                 duration: 1000,
                                 close: true,
                                 gravity: "top",
                                 position: "center",
                                 backgroundColor: "#4fbe87",
                             }).showToast();
                         } else {
                             Toastify({
                                 text: "Thêm Thất Bại",
                                 duration: 1000,
                                 close: true,
                                 gravity: "top",
                                 position: "center",
                                 backgroundColor: "#FF6A6A",
                             }).showToast();
                         }
                     });
                     $('#addten').val("");
                     $('#addtinh').val("-1");
                     $('#addhuyen').val("-1");
                     $('#addxa').val("-1");
                     $('#addthon').val("");
                     $('#addsonha').val("");
                     $('#addsucchua').val("");
                     $('#addtrong').val("");
                     $('#addloai').val("kiemdich");
                 }
             })
         });

         $("#open-add-address-btn").click(function() {
             $("#add-address-modal").modal('toggle')
         });

         $('#addloai').change(function() {
             let loai = $('#addloai option').filter(':selected').val();
             if (loai == "cachly") {
                 $("#addcachly").append(`<label for="thuonggia">Sức chứa:</label>
                                         <div class="form-group">
                                             <input type="text" id="addsucchua" name="addsucchua" placeholder="Sức chứa"
                                                 class="form-control">
                                         </div>
                                         <label for="thuonggia">Số lượng còn trống:</label>
                                         <div class="form-group">
                                             <input type="text" id="addtrong" name="addtrong"
                                                 placeholder="Số lượng còn trống" class="form-control">
                                         </div>`);
             } else $("#addcachly").empty();
         });

         function repairRow(params) {
             let data = {
                 id: Number(params)
             };
             $.post(`http://localhost/emss/diadiem/getOneByID`, data, function(response) {
                 if (response.thanhcong) {
                     $('#upten').val(response.ten_dia_diem);
                     $('#uptinh option').filter(':selected').text(response.tp_tinh);
                     $('#uphuyen option').filter(':selected').text(response.quan_huyen);
                     $('#upxa option').filter(':selected').text(response.phuong_xa);
                     $("#upthon").val(response.ap_thon);
                     $("#upsonha").val(response.so_nha);
                     if (response.phan_loai == "Điểm cách ly") {
                         $('#uploai option[value=cachly]').attr('selected', 'selected');
                         $("#upcachly").empty();
                         $("#upcachly").append(`<label for="thuonggia">Sức chứa:</label>
                                         <div class="form-group">
                                             <input type="text" id="upsucchua" name="upsucchua" placeholder="Sức chứa"
                                                 class="form-control">
                                         </div>
                                         <label for="thuonggia">Số lượng còn trống:</label>
                                         <div class="form-group">
                                             <input type="text" id="uptrong" name="addtrong"
                                                 placeholder="Số lượng còn trống" class="form-control">
                                         </div>`);
                         $("#upsucchua").val(response.suc_chua);
                         $("#uptrong").val(response.so_luong_trong);
                     } else {
                         $('#uploai option[value=kiemdich]').attr('selected', 'selected');
                         $("#upcachly").empty();
                     }
                 }
             });
             $("#update-address-modal").modal('toggle');
             //Sua form
             $("form[name='update-address-form']").validate({
                 rules: {
                     addten: {
                         required: true,
                     },
                     addsucchua: {
                         required: true,
                     },
                     addtrong: {
                         required: true,
                     },
                 },
                 messages: {
                     addten: {
                         required: "Vui lòng nhập tên địa điểm",
                     },
                     addsucchua: {
                         required: "Vui lòng nhập sức chứa của khu cách ly",
                     },
                     addtrong: {
                         required: "Vui lòng nhập chỗ còn trống của khu cách ly",
                     },
                 },
                 submitHandler: function(form, event) {
                     event.preventDefault();
                     $("#myModalLabel110").text("Sửa địa điểm");
                     $("#question-model").text("Bạn có chắc chắn muốn sửa địa điểm này không");
                     $("#question-address-modal").modal('toggle');
                     $('#thuchien').off('click')
                     $("#thuchien").click(function() {
                         var suc, trong;
                         if ($('#uploai option').filter(':selected').val() == "cachly") {
                             suc = Number($("#upsucchua").val());
                             trong = Number($("#uptrong").val());
                         } else {
                             suc = 0;
                             trong = 0;
                         }
                         var ajax = $.post(`http://localhost/emss/diadiem/update`, {
                             upma: Number(params),
                             upten: $('#upten').val(),
                             uptinh: $('#uptinh option').filter(':selected').text(),
                             uphuyen: $('#uphuyen option').filter(':selected').text(),
                             upxa: $('#upxa option').filter(':selected').text(),
                             upthon: $("#upthon").val(),
                             upsonha: $("#upsonha").val(),
                             uploai: $('#uploai option').filter(':selected').text(),
                             upsucchua: suc,
                             uptrong: trong
                         });

                         ajax.done(function(response) {
                             $("#update-address-modal").modal('toggle')
                             if (response.thanhcong) {
                                 currentPage = 1;
                                 getAddressAjax();
                                 Toastify({
                                     text: "Sửa Thành Công",
                                     duration: 1000,
                                     close: true,
                                     gravity: "top",
                                     position: "center",
                                     backgroundColor: "#4fbe87",
                                 }).showToast();
                             } else {
                                 Toastify({
                                     text: "Sửa Thất Bại",
                                     duration: 1000,
                                     close: true,
                                     gravity: "top",
                                     position: "center",
                                     backgroundColor: "#FF6A6A",
                                 }).showToast();
                             }
                         });
                     });
                 }
             });
         }

         function viewRow(params) {
             let data = {
                 id: Number(params)
             };
             $.post(`http://localhost/emss/diadiem/getOneByID`, data, function(response) {
                 if (response.thanhcong) {
                     $('#viewten').val(response.ten_dia_diem);
                     $('#viewtinh').val(response.tp_tinh);
                     $('#viewhuyen').val(response.quan_huyen);
                     $('#viewxa').val(response.phuong_xa);
                     $("#viewthon").val(response.ap_thon);
                     $("#viewsonha").val(response.so_nha);
                     $("#viewloai").val(response.phan_loai);
                     if (response.phan_loai == "Điểm cách ly") {
                         $("#viewcachly").empty();
                         $("#viewcachly").append(`<label for="thuonggia">Sức chứa:</label>
                                         <div class="form-group">
                                             <input type="text" id="viewsucchua" name="upsucchua"
                                                 class="form-control" disabled>
                                         </div>
                                         <label for="thuonggia">Số lượng còn trống:</label>
                                         <div class="form-group">
                                             <input type="text" id="viewtrong" name="addtrong"
                                                 class="form-control" disabled>
                                         </div>`);
                         $("#viewsucchua").val(response.suc_chua);
                         $("#viewtrong").val(response.so_luong_trong);
                     } else $("#upcachly").empty();
                 }
             });
             $("#view-address-modal").modal('toggle');
         }

         $('#uploai').change(function() {
             let loai = $('#uploai option').filter(':selected').val();
             if (loai == "cachly") {
                 $("#upcachly").empty();
                 $("#upcachly").append(`<label for="thuonggia">Sức chứa:</label>
                                         <div class="form-group">
                                             <input type="text" id="upsucchua" name="upsucchua" placeholder="Sức chứa"
                                                 class="form-control">
                                         </div>
                                         <label for="thuonggia">Số lượng còn trống:</label>
                                         <div class="form-group">
                                             <input type="text" id="uptrong" name="addtrong"
                                                 placeholder="Số lượng còn trống" class="form-control">
                                         </div>`);
             } else $("#upcachly").empty();
         });

         function changePage(newPage) {
             currentPage = newPage;
             getAddressAjax();
         }

         $('#cars-search').change(function() {
             currentPage = 1;
             getAddressAjax();
         });

         $("#search-address-form").keyup(debounce(function() {
             currentPage = 1;
             getAddressAjax();
         }, 200));

         function getAddressAjax() {
             let search = $('#cars-search option').filter(':selected').val();
             console.log('/' + search + "/");
             $.get(`http://localhost/emss/diadiem/getAddress?rowsPerPage=10&page=${currentPage}&search=${$("#search-address-text").val()}&search2=${search}`,
                 function(response) {
                     const table1 = $('#table1 > tbody');
                     table1.empty();
                     checkedRows = [];
                     $row = 0;
                     response.data.forEach(data => {
                         if ($row % 2 == 0) {
                             table1.append(`
                             <tr class="table-light">
                                 <td><div class="custom-control custom-checkbox">
                                         <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_dia_diem}"/>
                                     </div>
                                 </td>
                                 <td>${data.ma_dia_diem}</td>
                                 <td>${data.ten_dia_diem}</td>
                                 <td>${data.tp_tinh}</td>
                                 <td>${data.quan_huyen}</td>
                                 <td>${data.phuong_xa}</td>
                                 <td>${data.phan_loai}</td>
                                 <td>
                                     <button onclick="viewRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                         <i class="bi bi-eye"></i>
                                     </button>
                                     <button onclick="repairRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                         <i class="bi bi-tools"></i>
                                     </button>
                                     <button onclick="deleteRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                         <i class="bi bi-trash-fill"></i>
                                     </button>
                                 </td>
                             </tr>`);
                         } else {
                             table1.append(`
                             <tr class="table-info">
                                 <td>
                                     <div class="custom-control custom-checkbox">
                                         <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_dia_diem}"/>
                                     </div>
                                 </td>
                                 <td>${data.ma_dia_diem}</td>
                                 <td>${data.ten_dia_diem}</td>
                                 <td>${data.tp_tinh}</td>
                                 <td>${data.quan_huyen}</td>
                                 <td>${data.phuong_xa}</td>
                                 <td>${data.phan_loai}</td>
                                 <td>
                                     <button onclick="viewRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                         <i class="bi bi-eye"></i>
                                     </button>
                                     <button onclick="repairRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                         <i class="bi bi-tools"></i>
                                     </button>
                                     <button onclick="deleteRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                         <i class="bi bi-trash-fill"></i>
                                     </button>
                                 </td>
                             </tr>`);
                         }
                         checkedRows.push(data.ma_dia_diem);
                         $row += 1;
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

         function deleteRow(params) {
             let data = {
                 id: params
             };
             $("#myModalLabel110").text("Xóa địa điểm");
             $("#question-model").text("Bạn có chắc chắn muốn xóa địa điểm này không");
             $("#question-address-modal").modal('toggle');
             $('#thuchien').off('click');
             $("#thuchien").click(function() {
                 $.post(`http://localhost/emss/diadiem//delete`, data, function(response) {
                     if (response.thanhcong) {
                         Toastify({
                             text: "Xóa Thành Công",
                             duration: 1000,
                             close: true,
                             gravity: "top",
                             position: "center",
                             backgroundColor: "#4fbe87",
                         }).showToast();
                         currentPage = 1;
                         getAddressAjax();
                     } else {
                         Toastify({
                             text: "Xóa Thất Bại",
                             duration: 1000,
                             close: true,
                             gravity: "top",
                             position: "center",
                             backgroundColor: "#FF6A6A",
                         }).showToast();
                     }
                 });
             });
         }

         $("#btn-delete-address").click(function() {
             $("#myModalLabel110").text("Xóa địa điểm");
             $("#question-model").text("Bạn có chắc chắn muốn xóa những địa điểm này không?");
             $("#question-address-modal").modal('toggle');
             $('#thuchien').off('click')
             $("#thuchien").click(function() {
                 let datas = [];
                 checkedRows.forEach(checkedRow => {
                     if ($("#" + checkedRow).attr("checked", true)) {
                         datas.push(checkedRow);
                     }
                 });
                 let data = {
                     ids: JSON.stringify(datas)
                 };
                 $.post(`http://localhost/emss/diadiem/deletes`, data, function(response) {
                     if (response.thanhcong) {
                         Toastify({
                             text: "Xóa Thành Công",
                             duration: 1000,
                             close: true,
                             gravity: "top",
                             position: "center",
                             backgroundColor: "#4fbe87",
                         }).showToast();
                         currentPage = 1;
                         getAddressAjax();
                     } else {
                         Toastify({
                             text: "Xóa Thất Bại",
                             duration: 1000,
                             close: true,
                             gravity: "top",
                             position: "center",
                             backgroundColor: "#FF6A6A",
                         }).showToast();
                     }
                 });
             });
         });*/
    </script>
</body>

</html>
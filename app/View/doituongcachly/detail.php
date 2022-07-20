<?php

use App\Core\View;

View::$activeItem = 'object';

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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript">
    </script>
    <style>
        .personal {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .personal img {
            width: 100%;
            height: 100%;
            background-size: cover;
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

        .table-person {
            border-collapse: collapse;
            width: 100%;
            height: 100%;
        }

        .table-person td {
            height: 2em;
            border-width: 1.5px;
            border-color: #6699FF;
            padding: 0.5em;
            width: 35%;
            padding-left: 1em;
            color: black;
        }

        .table-person .title {
            text-align: center;
            width: 15%;
            color: #3366CC;
            font-weight: 700;
            padding-left: 0px;
            background-color: #ddebf8;
        }

        #table1 {
            text-align: center;
        }

        .font-weight {
            font-weight: bold;
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
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-8 order-md-1 order-last">
                                <label>
                                    <h3>Hồ sơ cách ly</h3>
                                </label>
                                <br>
                            </div>
                            <div class="col-12 col-md-4 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete' class="btn btn-danger">
                                        <i class="bi bi-trash-fill icon-mid"></i> Xóa
                                    </button>
                                    <button id='open-add-benhnhan-btn' class="btn btn-primary">
                                        <i class="bi bi-person-fill icon-mid"></i> Thêm
                                    </button>
                                    <button id='view-dtcl' class="btn btn-primary">
                                        <i class="bi bi-card-list icon-mid"></i> Xem
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card personal d-none">
                            <div class="card-body">
                                <div>
                                    <table class="table-person">
                                        <tr>
                                            <td class="title">Họ và tên</td>
                                            <td id="person-name"></td>
                                            <td class="title">Giới tính</td>
                                            <td id="person-sex"></td>
                                        </tr>
                                        <tr>
                                            <td class="title">Ngày sinh</td>
                                            <td id="person-birthday"></td>
                                            <td class="title">CMND</td>
                                            <td id="person-card"></td>
                                        </tr>
                                        <tr>
                                            <td class="title">Số điện thoại</td>
                                            <td id="person-number">Phan Thanh Thắng</td>
                                            <td class="title">Email</td>
                                            <td id="person-email"></td>
                                        </tr>
                                        <tr>
                                            <td class="title">Địa chỉ</td>
                                            <td id="person-address" colspan="3"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                    </section>
                    <section class="section">
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-danger" id="table1">
                                        <thead>
                                            <tr>
                                                <th class=" d-none check">Chọn</th>
                                                <th>Mã hồ sơ</th>
                                                <th>Thời gian bắt đầu</th>
                                                <th>Thời gian kết thúc</th>
                                                <th>Địa điểm cách ly</th>
                                                <th>Tác Vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <nav class="mt-5">
                                        <ul id="pagination" class="pagination justify-content-center"> </ul>
                                    </nav>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
            <!-- MODAL ADD -->
            <div class="modal fade text-left" id="add-dtcl-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Hồ Sơ</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="form-detail-add" id=" " method="post">
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="object" class="col-sm-4 col-form-label">Đối tượng:</label>
                                        <div class="col-8">
                                            <select class="form-control" name="object" id="object">
                                                <option value='-1'>Chưa xác định</option>
                                                <option value='0'>F0</option>
                                                <option value='1'>F1</option>
                                                <option value='2'>F2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="source" class="col-sm-4 col-form-label">Nguồn lây:</label>
                                        <div class="col-8">
                                            <select class="form-control" name="source" id="source">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="phone_number" class="col-sm-4 col-form-label">Địa điểm:</label>
                                        <div class="col-8">
                                            <select class="form-control" name="local" id="local">
                                            </select>
                                        </div>
                                    </div>
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
            <!-- MODAL XÁC NHẬN XÓA -->
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
            <!-- MODAL XEM HỒ SƠ -->
            <div class="modal fade text-left" id="view-dtcl-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title text-light">Xem hồ sơ cách ly</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table-file">
                                <tr>
                                    <td class="title">
                                        Mã hồ sơ
                                    </td>
                                    <td id="view-IDhoso">
                                        01
                                    </td>
                                    <td class="title">
                                        Họ và tên
                                    </td>
                                    <td id="view-IDdoituong">
                                        30
                                    </td>
                                </tr>
                                <tr>
                                    <td class="title">Thời gian bắt đầu</td>
                                    <td id="view-tgbd"></td>
                                    <td class="title">Thời gian kết thúc</td>
                                    <td id="view-tgkt"></td>
                                </tr>
                                <tr>
                                    <td class="title">Đối tượng</td>
                                    <td id="view-f"></td>
                                    <td class="title">Nguồn lây</td>
                                    <td id="view-nguonlay"></td>
                                </tr>
                                <tr>
                                    <td class="title">Địa chỉ</td>
                                    <td colspan="3" id="diachi"></td>
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
            <!-- MODAL SỬA -->
            <div class="modal fade text-left" id="update-dtcl-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h4 class="modal-title  text-light">Cập Nhật Hồ Sơ</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="form-detail-update" method="post">
                                <div class="row">   
                                    <div class="form-group row col-6">
                                        <label for="object" class="col-sm-4 col-form-label">Đối tượng:</label>
                                        <div class="col-8">
                                            <select class="form-control" name="update_object" id="update_object">
                                                <option value='-1'>Chưa xác định</option>
                                                <option value='0'>F0</option>
                                                <option value='1'>F1</option>
                                                <option value='2'>F2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="source" class="col-sm-4 col-form-label">Nguồn lây:</label>
                                        <div class="col-8">
                                            <select class="form-control" name="update_source" id="update_source">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="phone_number" class="col-sm-4 col-form-label">Địa điểm:</label>
                                        <div class="col-8">
                                            <select class="form-control" name="update_local" id="update_local">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Đóng</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Cập nhật</span>
                            </button>
                        </div>
                        </form>
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
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#view-dtcl').click(function() {
                $('.personal').toggleClass('d-none')
            })
            getList(1);
            // Các sự kiện

            /**Thêm hồ sơ */
            $('#open-add-benhnhan-btn').click(function() {
                getAdd();
                $('#add-dtcl-modal').modal('show');
            })
            /**Xóa hồ sơ */
            $('#btn-delete').click(function() {
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
            getPerson();
        })
        //Các hàm:
        //Lấy ngày hiện tại
        function getDateTime() {
            var d = new Date();
            var yyyy = d.getFullYear();
            var mm = d.getMonth() + 1;
            var dd = d.getDate();
            return yyyy + '-' + (mm < 10 ? '0' + mm.toString() : mm) + '-' + (dd < 10 ? '0' + mm.toString() : dd);

        }
        //Format thời gian:
        function formatDateTime(datetime) {
            let temp = datetime.split('-');
            temp_2 = temp[2].split(" ");
            return temp_2[0] + '-' + temp[1] + '-' + temp[0];
        }
        //Cắt url lấy id:
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
        //Hàm thay đổi trang
        function changePage(newPage) {
            getList(newPage, $('#search-benhnhan-text').val(), $('#cars-search').val());
        }
        //Hàm load thông tin đối tượng
        function getPerson() {
            $.ajax({
                url: location.href + `&flag=getid`,
                type: 'get',
            }).done(function(data) {
                $.ajax({
                    url: 'http://localhost/emss/nguoidung/getOneByID',
                    data: {
                        ma_nguoi_dung: data.id
                    },
                    type: 'POST'
                }).done(function(kq) {
                    $('#person-name').text(kq[0].ho_lot + " " + kq[0].ten);
                    $('#person-sex').text(kq[0].phai);
                    $('#person-birthday').text(formatDateTime(kq[0].ngay_sinh));
                    $('#person-card').text(kq[0].cmnd);
                    $('#person-number').text(kq[0].so_dien_thoai)
                    $('#person-address').text(kq[0].dia_chi);
                    $('#person-email').text(kq[0].email)
                })
            })
        }
        //Hàm load dữ liệu vào bảng
        function getList(current_page) {
            var _url = location.href;
            $.ajax({
                url: _url + `&flag=view&row_per_page=5&current_page=${current_page}`,
                type: 'get'
            }).done(function(data) {
                const content = $('#table1 > tbody');
                content.empty();
                var row = 0;
                data.data.forEach(function(element, index) {
                    var mark = 'table-info';
                    if (row % 2 == 0) {
                        mark = 'table-light';
                    }
                    var html = `<tr class="${mark}" id="row${row}">
                            <td class="check d-none"><input type="checkbox" value="${element.ma_ho_so}" class="form-check-input del-check shadow-none ${element.ma_ho_so}"></td>
                            <td>${element.ma_ho_so}</td>
                            <td>${formatDateTime(element.tg_bat_dau)}</td>
                            <td>${formatDateTime(element.tg_ket_thuc)}</td>
                            <td>${element.ten_dia_diem}</td>
                            <td>
                                <button onclick="loadView(${element.ma_ho_so})"type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="loadUpdate(${element.ma_ho_so},${row})" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-gear"></i>
                                </button>
                                <button onclick="del(${element.ma_ho_so})" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`
                    content.append(html);
                    row++;
                })
                $('#row0').addClass('text-danger');
                $('#row0').addClass('font-weight');

                let i = 1;
                $('#pagination').empty();
                for (i = 1; i <= data.totalPage; i++)
                    if (i == current_page) {
                        $('#pagination').append(
                            `<li class="page-item active">\<button class="page-link" onclick="changePage(${i})" id="'${i}'">${i}</button>\</li>`
                        );
                    } else $('#pagination').append(
                        `<li class="page-item">\<button class="page-link" onclick="changePage(${i})" id="'${i}'">${i}</button>\</li>`
                    );
            })
        }
        /** XÓA */
        function del(list_id) {
            $('#modal-confirm-delete').modal('show');
            $('#btn-delete-confirm').click(function() {
                $.ajax({
                    url: 'http://localhost/emss/doituongcachly/delete',
                    data: {
                        list: list_id
                    },
                    type: 'POST'
                }).done(function(response) {
                    if (response.thanhcong == true) {
                        Toastify({
                            text: "Xóa Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        getList(1);
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

        /**THÊM */
        function add() {
            $("form[name='form-detail-add']").validate({
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        url: location.href + `&flag=getid`,
                        type: 'get'
                    }).done(function(data) {
                        $.post('http://localhost/emss/doituongcachly/add', {
                            ma_doi_tuong: data.id,
                            ma_dia_diem: $('#local').val(),
                            tg_ket_thuc: '0000-00-00',
                            f: $('#object').val(),
                            nguon_lay: $('#source').val()
                        }, function(response) {
                            $('#add-dtcl-modal').modal('hide');
                            if (response.thanhcong == true) {
                                getList(1);
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
                        })
                    })

                }
            });
        }
        //Hàm load dữ liệu vào modal thêm
        function getAdd() {

            var patient = $.ajax({
                url: 'http://localhost/emss/benhnhan/getAll',
                type: 'POST',
            });
            var location = $.ajax({
                url: 'http://localhost/emss/diadiem/getList',
                type: 'POST',
            });
            $.when(patient, location).done(function(l_patient, l_location) {
                const source = $('#source');
                source.empty();
                const local = $('#local');
                local.empty();
                l_patient[0].forEach(function(element) {
                    source.append(
                        `<option value='${element['ma_benh_nhan']}'>${element['ma_benh_nhan']} - ${element['ho_lot']} ${element['ten']}</option>`
                    );
                });
                l_location[0].forEach(function(element) {
                    if (element['phan_loai'] == 1) local.append(
                        `<option value='${element['ma_dia_diem']}'>${element['ten_dia_diem']}</option>`);
                });
                add();
            })
        }
        /**XEM */
        //Load dữ liệu vào modal xem:
        function loadView(idHS) {
            $('#view-dtcl-modal').modal('show');
            $.ajax({
                url: 'http://localhost/emss/doituongcachly/getOneByID',
                data: {
                    id: idHS,
                },
                type: 'POST'
            }).done(function(data) {
                $('#view-IDhoso').text(data[0].ma_ho_so);
                $('#view-tgbd').text(formatDateTime(data[0].tg_bat_dau));
                $('#view-tgkt').text(formatDateTime(data[0].tg_ket_thuc));
                if (data[0].F > -1) $('#view-f').text('F' + data[0].F);
                else $('#view-f').text("Chưa xác định");
                $.ajax({
                    url: 'http://localhost/emss/nguoidung/getOneByID',
                    data: {
                        ma_nguoi_dung: data[0].ma_doi_tuong,
                    },
                    type: 'POST',
                }).done(function(data_1) {
                    $('#view-IDdoituong').text(data_1[0]['ho_lot'] + " " + data_1[0]['ten']);
                })
                $.ajax({
                    url: 'http://localhost/emss/nguoidung/getOneByID',
                    data: {
                        ma_nguoi_dung: data[0].nguon_lay,
                    },
                    type: 'POST',
                }).done(function(data_2) {
                    $('#view-nguonlay').text(data_2[0]['ho_lot'] + " " + data_2[0]['ten']);
                })
                $.ajax({
                    url: 'http://localhost/emss/diadiem/getOneByID',
                    data: {
                        id: data[0].ma_dia_diem
                    },
                    type: 'POST',
                }).done(function(data_3) {
                    var address = "";
                    if (data_3[0].so_nha != '') address += data_3[0].so_nha + ' - ';
                    if (data_3[0].ap_thon != '') address += data_3[0].ap_thon + ' - ';
                    address += `${data_3[0].phuong_xa} - ${data_3[0].quan_huyen} - ${data_3[0].tp_tinh}`;
                    $('#diachi').text(data_3[0].ten_dia_diem + " (" + address + ")");
                })
            })
        }
        /**SỬA */
        //Cập nhật
        function update(idHS, _id) {
            $("form[name='form-detail-update']").validate({
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.post('http://localhost/emss/doituongcachly/update', {
                        ma_ho_so: idHS,
                        ma_dia_diem: $('#update_local').val(),
                        f: $('#update_object').val(),
                        nguon_lay: $('#update_source').val(),
                        row: _id,
                        id: getID()
                    }, function(response) {
                        $('#update-dtcl-modal').modal('hide');
                        if (response.thanhcong == true) {
                            getList(1);
                            Toastify({
                                text: "Cập Nhật Thành Công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                        } else {
                            Toastify({
                                text: "Cập Nhật Thất Bại",
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
        }
        //Hàm load dữ liệu vào modal sửa
        function loadUpdate(idHS, _id) {
            $('#update-dtcl-modal').modal('show');
            var file = $.ajax({
                url: 'http://localhost/emss/doituongcachly/getOneByID',
                data: {
                    id: idHS,
                },
                type: 'POST',
            });
            var patient = $.ajax({
                url: 'http://localhost/emss/benhnhan/getAll',
                type: 'POST',
            });
            var location = $.ajax({
                url: 'http://localhost/emss/diadiem/getList',
                type: 'POST',
            });
            $.when(patient, location, file).done(function(l_patient, l_location, _file) {
                const source = $('#update_source');
                source.empty();
                const local = $('#update_local');
                local.empty();
                l_patient[0].forEach(function(element) {
                    source.append(
                        `<option value='${element['ma_benh_nhan']}'>${element['ma_benh_nhan']} - ${element['ho_lot']} ${element['ten']}</option>`
                    );
                });
                l_location[0].forEach(function(element) {
                    if (element['phan_loai'] == 0) local.append(
                        `<option value='${element['ma_dia_diem']}'>${element['ten_dia_diem']}</option>`);
                });
                $('#update_beginday').val(_file[0][0].tg_bat_dau);
                if (_file[0][0].F > -1) $('#update_object').val(_file[0][0].F);
                source.val(_file[0][0].nguon_lay);
                local.val(_file[0][0].ma_dia_diem);
                update(idHS, _id);
            })
        }
    </script>
</body>

</html>
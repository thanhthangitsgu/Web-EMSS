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
    <style>
        .btn i {
            width: 50px;
            height: 50px;
        }

        .btn-sm {
            padding: 0.2em;
            margin: 0.2em;
        }

        .modal-content {
            width: 1200em;
        }

        table {
            text-align: center;
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
                    <div class="row">
                        <h6>Tìm Kiếm</h6>
                        <div class="col-6">
                            <div id="search-user-form" name="search-user-form">
                                <div class="form-group position-relative has-icon-right">
                                    <input id="search-user-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
                                    <div class="form-control-icon">
                                        <i class="bi bi-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>
                                <h5 style="margin-right: 10px;"> Lọc Theo:</h5>
                            </label>
                            <select class="btn btn btn-primary btn-sm" name="search-cbb" id="cars-search">
                                <option value="">Tất Cả</option>
                                <option value="ho">Họ Lót</option>
                                <option value="ten">Tên</option>
                                <option value="cmnd">CMND</option>
                                <option value="sdt">Số điện thoại</option>
                            </select>
                        </div>
                    </div>
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-7 order-md-1 order-last">
                                <label>
                                    <h3>Chọn người dùng</h3>
                                </label>
                                <br>
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
                                                <th class="d-none check">Chọn</th>
                                                <th>Họ Lót</th>
                                                <th>Tên</th>
                                                <th>Giới tính</th>
                                                <th>Số điện thoại</th>
                                                <th>CMND</th>
                                                <th>Tác Vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody id="content">
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
                <!-- MODAL ADD -->
                <div class="modal fade text-left" id="add-dtcl-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm Hồ Sơ</h4>
                                <input type="text" id="idUser" class="d-none" value="1">
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
            getListAdvantage(1, "", "   ")
            $('#open-add-user-btn').click(function() {
                $('#add-user-modal').modal('show');
            })

            $("#search-user-text").keyup(function() {
                getListAdvantage(1, $('#search-user-text').val(), $('#cars-search').val())
            });
            $('#cars-search').change(function() {
                getListAdvantage(1, $('#search-user-text').val(), $('#cars-search').val())
            })

        })
        /** Các hàm */
        //Lấy ngày hiện tại
        function getDateTime() {
            var d = new Date();
            var yyyy = d.getFullYear();
            var mm = d.getMonth() + 1;
            var dd = d.getDate();
            return yyyy + '-' + (mm < 10 ? '0' + mm.toString() : mm) + '-' + (dd < 10 ? '0' + mm.toString() : dd);

        }
        //Thay đổi trang
        function changePage(newPage) {
            getListAdvantage(newPage, $('#search-user-text').val(), $('#cars-search').val());
        }
        // Hàm update người dùng
        function updateUser(idUser) {
            $.ajax({
                url: `http://localhost/emss/nguoidung/updateRole`,
                data: {
                    ma_nguoi_dung: idUser,
                    role: 5
                },
                type: 'POST'
            }).done(function(data) {
                return data;
            })
        }
        //Hàm lấy idUser 
        function getID(idUser) {
            $('#add-dtcl-modal').modal('show');
            getAdd(idUser);
        }
        /**THÊM */
        //Hàm thêm mới hồ sơ cho đối tượng
        function addDetail(idUser) {
            $("form[name='form-detail-add']").validate({
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.post('http://localhost/emss/doituongcachly/add', {
                        ma_doi_tuong: idUser,
                        ma_dia_diem: $('#local').val(),
                        tg_ket_thuc: '0000-00-00',
                        f: $('#object').val(),
                        nguon_lay: $('#source').val()
                    }, function(response) {
                        addPerson(idUser);
                        updateUser(idUser);
                        $('#add-dtcl-modal').modal('hide');
                        if (response.thanhcong == true) {
                            Toastify({
                                text: "Thêm Thành Công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                            window.location = 'http://localhost/emss/doituongcachly/doAdd'
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
                }
            });
        }
        //Hàm thêm đối tượng 
        function addPerson(idUser) {
            $.ajax({
                url: 'http://localhost/emss/doituongcachly/addPerson',
                data: {
                    ma_doi_tuong: idUser,
                    ma_dia_diem: $('#local').val(),
                    f: $('#object').val(),
                    nguon_lay: $('#source').val()
                },
                type: 'POST',
            }).done(function(data) {
                return data;
            })
        }
        //Hàm load dữ liệu vào modal thêm
        function getAdd(idUser) {
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
                    if (element['phan_loai'] == 0) local.append(
                        `<option value='${element['ma_dia_diem']}'>${element['ten_dia_diem']}</option>`);
                });
                addDetail(idUser);
            })
        }

        //Lấy danh sách
        function getListAdvantage(current_page, text, column) {
            $.ajax({
                url: `http://localhost/emss/nguoidung/getList?current_page=${current_page}&row_per_page=5&keyword=${text}&column=${column}`,
                type: 'GET'
            }).done(function(data) {
                var row = 1;
                const table1 = $('#table1 > tbody');
                table1.empty();
                data.data.forEach(function(element, index) {
                    if (element.ma_vai_tro == 6) {
                        var mark = 'table-info';
                        if (row % 2 == 0) {
                            mark = 'table-light';
                        }
                        var html =
                            `<tr class="${mark}">
                            <td class="check d-none"><input type="checkbox" value="${element.ma_nguoi_dung}" class="form-check-input del-check shadow-none ${element.ma_nguoi_dung}"></td>
                            <td>${element.ho_lot}</td>
                            <td>${element.ten}</td>
                            <td>${element.phai}</td>
                            <td>${element.so_dien_thoai}</td>
                            <td>${element.cmnd}</td>
                            <td>
                            <button type="button" onclick="getID(${element.ma_nguoi_dung})"class="btn btn-sm btn-primary" style="padding-top: 7px; padding-bottom: 0px;">
                            <i class="bi bi-plus-circle"></i>
                            </button>
                            </td>
                        </tr>`;
                        table1.append(html);
                        row++;
                    }
                })
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
            });
        }
    </script>
</body>

</html>
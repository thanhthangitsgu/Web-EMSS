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
                    <div class="col-sm-6">
                        <h6>Tìm Kiếm</h6>
                        <div id="search-benhnhan-form" name="search-benhnhan-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="search-benhnhan-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
                                <div class="form-control-icon">
                                    <i class="bi bi-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-8 order-md-1 order-last">
                                <label>
                                    <h3>Danh sách đối tượng cách ly</h3>
                                </label>
                                <br>
                                <label>
                                    <h5 style="margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary btn-sm" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                    <option value="ho">Họ Lót</option>
                                    <option value="ten">Tên</option>
                                    <option value="F">Đối tượng</option>
                                    <option value="cmnd">CMND</option>
                                    <option value="sdt">Số điện thoại</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-dtcl' class="btn btn-danger">
                                        <i class="bi bi-trash-fill icon-mid"></i> Xóa DTCL
                                    </button>
                                    <a href="http://localhost/emss/doituongcachly/doAdd">
                                        <button id="btn-add-dtcl" class="btn btn-primary">
                                            <i class="bi bi-person-plus-fill icon-mid"></i> Thêm DTCL
                                        </button>
                                    </a>
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
                                                <th>Họ Lót</th>
                                                <th>Tên</th>
                                                <th>Đối tượng</th>
                                                <th>CMND</th>
                                                <th>Số điện thoại</th>
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
            <!-- MODAL XÁC NHẬN XÓA -->
            <div class="modal" id="modal-confirm-delete">
                <div class="modal-dialog modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title text-light">Xác nhận</h4>
                        </div>
                        <div class="modal-body" id="modal-content-delete">
                            Xác nhận xóa đối tượng?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-delete-cancel">Close</button>
                            <button type="button" class="btn btn-danger" id="btn-delete-confirm" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal">
                <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title text-light">Xác nhận</h4>
                        </div>
                        <div class="modal-body" id="modal-content-delete">
                            Xác nhận xóa đối tượng?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-delete-cancel">Close</button>
                            <button type="button" class="btn btn-danger" id="btn-delete-confirm" data-bs-dismiss="modal">OK</button>
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
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script src="<?= View::assets('js/address.js') ?>"></script>
    <script>
        /**Hàm chính */
        $(function() {
            getList(1, "", "");
            //Xóa
            $('#btn-delete-dtcl').click(function() {
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
            
        });

        /**Các sự kiện */
        $('#search-benhnhan-text').keyup(function() {
            getList(1, $('#search-benhnhan-text').val(), $('#cars-search').val());
        })
        $('#cars-search').change(function() {
            getList(1, $('#search-benhnhan-text').val(), $('#cars-search').val());
        })

        /**Các hàm */
        //Hàm lấy số trang
        function changePage(newPage) {
            getList(newPage, $('#search-benhnhan-text').val(), $('#cars-search').val());
        }
        /**Hàm lấy danh sách tỉnh huyện xã */
        function getListAddress(flag) {
            var address = $.xResponse();
            address.forEach(function(element, index) {
                $(`#${flag}tinh`).append(
                    `<option class="${flag}tinh" value="${index}">${element['name']}</option>`);
            })
            $(`#${flag}tinh`).change(function() {
                $(`#${flag}huyen`).empty();
                $(`#${flag}huyen`).append('<option value="-1"> Chọn Quận/Huyện</option>')
                $(`#${flag}xa`).empty();
                $(`#${flag}xa`).append('<option value="-1"> Chọn Phường/Xã </option>')
                var districs = address[$(`#${flag}tinh`).val()]['districts'];
                districs.forEach(function(element, index) {
                    $(`#${flag}huyen`).append(
                        `<option class="huyen" value="${index}">${element['name']}</option>`);
                })
                $(`#${flag}huyen`).change(function() {
                    $(`#${flag}xa`).empty();
                    $(`#${flag}xa`).append('<option value="-1"> Chọn Phường/Xã </option>')
                    var wards = districs[$(`#${flag}huyen`).val()]['wards'];
                    wards.forEach(function(element, index) {
                        $(`#${flag}xa`).append(
                            `<option  class="xa" value="${index}">${element['name']}</option>`);
                    })
                })
            });
        }
        //Lấy danh sách đối tượng cách ly   
        function getList(current_page, text, column) {
            $.ajax({
                url: `http://localhost/emss/doituongcachly/getList?current_page=${current_page}&row_per_page=5&keyword=${text}&column=${column}`,
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
                    var object = "";
                    if (element.F == -1) object = "Chưa xác định";
                    else object = 'F' + element.F;
                    var html = `<tr class="${mark}">
                            <td class="check d-none"><input type="checkbox" value="${element.ma_doi_tuong}" class="form-check-input del-check shadow-none ${element.ma_doi_tuong}"></td>
                            <td>${element.ho_lot}</td>
                            <td>${element.ten}</td>
                            <td>${object}</td>
                            <td>${element.cmnd}</td>
                            <td>${element.so_dien_thoai}</td>
                            <td>
                                <a href = "<?= View::url('doituongcachly/detail?id=${element.ma_nguoi_dung}') ?>">
                                    <button type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;"><i class="bi bi-eye"></i></button>
                                </a>
                                <button onclick="del('${element.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                                <button onclick="complete(${element.ma_nguoi_dung})" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                <i class="bi bi-check-circle"></i>
                                </button>
                            </td>
                        </tr>`
                    content.append(html);
                    row++;
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
            })
        }
        /**XÓA */
        function del(list_id) {
            $('#modal-confirm-delete').modal('show');
            $('#btn-delete-confirm').click(function() {
                $.ajax({
                    url: 'http://localhost/emss/doituongcachly/delete_dtcl',
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
                        getList(1, "", "");
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
        /** Hoàn thành cách ly */
        function complete(idUser) {
            $.ajax({
                url: 'http://localhost/emss/doituongcachly/updateFinishTime',
                data: {
                    ma_doi_tuong: idUser
                },
                type: 'POST'
            }).done(function(response) {
                if (response) {
                    $.ajax({
                        url: 'http://localhost/emss/doituongcachly/delete_dtcl',
                        data: {
                            list: idUser
                        },
                        type: 'POST',
                    }).done(function(data) {
                        if (data.thanhcong == true) {
                            Toastify({
                                text: "Thành Công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                            getList(1, "", "");
                            window.open("http://localhost/emss/doituongcachly/complete?id="+idUser,'_blank')
                        } else {
                            Toastify({
                                text: "Thất Bại",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#FF6A6A",
                            }).showToast();
                        }
                    })
                }
            })
        }
    </script>
</body>

</html>
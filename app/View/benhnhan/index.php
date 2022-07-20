<?php

use App\Core\View;

View::$activeItem = 'patient';

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
                    <div class="col-sm-6">
                        <h6>Tìm Kiếm</h6>
                        <div id="search-benhnhan-form" name="search-benhnhan-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="search-benhnhan-text" type="text" class="form-control" placeholder="Tìm kiếm"
                                    value="">
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
                                    <h3>Danh sách bệnh nhân</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                    <option value="ho">Họ Lót</option>
                                    <option value="ten">Tên</option>
                                    <option value="phai">Phái</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-benhnhan' class="btn btn-danger">
                                        <i class="bi bi-trash-fill icon-mid"></i> Xóa bệnh nhân
                                    </button>
                                    <button id='open-add-benhnhan-btn' class="btn btn-primary">
                                        <i class="bi bi-person-plus-fill icon-mid"></i> Thêm bệnh nhân
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <th>Phái</th>
                                                <th>CMND</th>
                                                <th>Số điện thoại</th>
                                                <th>Tác Vụ</th>
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
            <div class="modal fade text-left" id="add-benhnhan-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm bệnh nhân</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="add-benhnhan-form" method="post">
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
                                            <input type="text" class="form-control" id="cmnd" name="cmnd"
                                                placeholder="CMND">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="firstname" class="col-sm-4 col-form-label">Ngày sinh:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="birthday" name="birthday"
                                                placeholder="Tên">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="sex" class="col-sm-4 col-form-label">Giới tính:</label>
                                        <div class="col-sm-8 row">
                                            <div class="col-6">
                                                <input type="radio" name="sex" id="male" value="Nam" checked=checked>
                                                <label class="form-check-label col-form-label" for="male"> Nam
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <input class="" type="radio" name="sex" valune="Nữ" id="female">
                                                <label class="form-check-label col-form-label" for="female"> Nữ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="phone_number" class="col-sm-4 col-form-label">SĐT:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="phone_number"
                                                name="phone_number" placeholder="Số điện thoại">
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
                                                placeholder="Thôn/Ấp">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="home" name="home"
                                                placeholder="Số nhà">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">

                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="email" class="col-4 col-form-label"> Email:</label>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Email">
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

            <!-- The Modal Delete -->
            <div class="modal" id="modal-confirm-delete">
                <div class="modal-dialog modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title text-light">Xác nhận</h4>
                        </div>
                        <div class="modal-body" id="modal-content-delete">
                            Xác nhận xóa bệnh nhân?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" id="btn-delete-benhnhan-confirm"
                                data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Thong bao -->
            <div class="modal fade text-left" id="question-benhnhan-modal" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel110" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title white" id="myModalLabel110">
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body" id="question-model">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Đóng</span>
                            </button>
                            <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span id="thuchien" class="d-none d-sm-block">Thực hiện</span>
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
    let currentPage = 1;
    $(function() {
        getBenhNhanAjax();

        var role_ = $.ajax({
            url: 'http://localhost/emss/phanquyen/getListRole',
            type: 'POST'
        });

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

        $("form[name='add-benhnhan-form']").validate({
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
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                // lấy dữ liệu từ form
                const data = Object.fromEntries(new FormData(form).entries());
                console.log(data);
                $.post(`http://localhost/emss/nguoidung/add`, data, function(
                    response) {
                    $("#add-benhnhan-modal").modal('toggle')
                    if (response.thanhcong) {
                        currentPage = 1;
                        getBenhNhanAjax();
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
                $('#sohieu').val("");
                $('#ghethuong').val("");
                $('#thuonggia').val("");
            }
        })

    });

    function changePage(newPage) {
        currentPage = newPage;
        getBenhNhanAjax();
    }

    $('#cars-search').change(function() {
        currentPage = 1;
        getBenhNhanAjax();
    });

    $("#search-benhnhan-form").keyup(debounce(function() {
        currentPage = 1;
        getBenhNhanAjax();
    }, 200));

    function getBenhNhanAjax() {
        let search = $('#cars-search option').filter(':selected').val();
        console.log('/' + search + "/");
        $.get(`http://localhost/emss/benhnhan/getList?row_per_page=10&current_page=${currentPage}&search=${$("#search-benhnhan-text").val()}&search2=${search}`,
            function(response) {
                const table1 = $('#table1 > tbody');
                table1.empty();
                checkedRows = [];
                $row = 0;
                response.data.forEach(data => {
                    if ($row % 2 == 0) {
                        table1.append(`
                        <tr class="table-light">
                            <td class="d-none check">
                                <input type="checkbox" value="' + ${data.ma_nguoi_dung} + '" class="form-check-input del-check shadow-none ' + ${data.ma_nguoi_dung} + '">
                            </td>
                            <td>${data.ho_lot}</td>
                            <td>${data.ten}</td>
                            <td>${data.phai}</td>
                            <td>${data.cmnd}</td>
                            <td>${data.so_dien_thoai}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-file-earmark-person view"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td class="d-none check">
                                <input type="checkbox" value="' + ${data.ma_nguoi_dung} + '" class="form-check-input del-check shadow-none ' + ${data.ma_nguoi_dung} + '">
                            </td>
                            <td>${data.ho_lot}</td>
                            <td>${data.ten}</td>
                            <td>${data.phai}</td>
                            <td>${data.cmnd}</td>
                            <td>${data.so_dien_thoai}</td>
                            <td>
                            <button onclick="viewRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-file-earmark-person view"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    $row += 1;
                });

                const pagination = $('#pagination');
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

    $("#open-add-benhnhan-btn").click(function() {
        $("#add-benhnhan-modal").modal('toggle')
    });

    $('#btn-delete-benhnhan').click(function() {
        $('.check').toggleClass('d-none');
        var str = "";
        $('input.del-check:checked').each(function(index, element) {
            str += $(this).val() + '-';
        })
        str = str.slice(0, str.length - 1);
        if (str != "") {
            $('#modal-confirm-delete').modal('show');
            $('#btn-delete-benhnhan-confirm').click(function() {
                $.ajax({
                    url: 'http://localhost/emss/nguoidung/delete',
                    data: {
                        list_user: str
                    },
                    type: 'POST',
                }).done(function(data) {
                    if (data) {
                        Toastify({
                            text: "Xóa Thất Bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                        getBenhNhanAjax();
                    } else {
                        Toastify({
                            text: "Xóa thành công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#00CC33",
                        }).showToast();
                        getBenhNhanAjax();
                    }
                })
            })
        }
    });

    function deleteRow(params) {
        let data = {
            ma_nguoi_dung: params
        };
        $("#myModalLabel110").text("Xóa bệnh nhân");
        $("#question-model").text("Bạn có chắc chắn muốn xóa bệnh nhân này không");
        $("#question-benhnhan-modal").modal('toggle');
        $('#thuchien').off('click');
        $("#thuchien").click(function() {
            $.post(`http://localhost/emss/benhnhan/delete`, data, function(response) {
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
                    getBenhNhanAjax();
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
    </script>
</body>

</html>
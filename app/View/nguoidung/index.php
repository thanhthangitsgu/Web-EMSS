<?php

use App\Core\View;

View::$activeItem = 'user';

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
                        <div id="search-user-form" name="search-user-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="search-user-text" type="text" class="form-control" placeholder="Tìm kiếm"
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
                                    <h3>Danh sách người dùng</h3>
                                </label>
                                <br>
                                <label>
                                    <h5 style="margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary btn-sm" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                    <option value="ho">Họ Lót</option>
                                    <option value="ten">Tên</option>
                                    <option value="vaitro">Vai trò</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-user' class="btn btn-danger">
                                        <i class="bi bi-trash-fill icon-mid"></i> Xóa người dùng
                                    </button>
                                    <button id='open-add-user-btn' class="btn btn-primary">
                                        <i class="bi bi-person-plus-fill icon-mid"></i> Thêm người dùng
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
                                                <th class="d-none check">Chọn</th>
                                                <th>Họ Lót</th>
                                                <th>Tên</th>
                                                <th>Vai trò</th>
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
                <div class="modal fade text-left" id="add-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm Tài Khoản</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-form" method="post">
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
                                                    <input type="radio" name="sex" id="male" value="Nam"
                                                        checked=checked>
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
                                                    placeholder="Thôn/ấp">
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
                                        <div class="form-group row col-6">
                                            <label for="role" class="col-4 col-form-label"> Vai trò:</label>
                                            <div class="col-8">
                                                <select class="form-control" name="role" id="role">
                                                    <option value='-1'>Chọn vai trò</option>
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
                <!-- MODAL ADD HO SO -->
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
                                <button class="btn btn-primary ml-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Thêm</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- MODAL ADD HO SO -->
                <div class="modal fade text-left" id="update-dtcl-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                <select class="form-control" name="update_object" id="update_source">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="phone_number" class="col-sm-4 col-form-label">Địa điểm:</label>
                                            <div class="col-8">
                                                <select class="form-control" name="update_object" id="update_local">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary ml-1">
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
                            <!-- Modal Header -->
                            <div class="modal-header bg-danger">
                                <h4 class="modal-title text-light">Xác nhận</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" id="modal-content-delete">
                                Xác nhận xóa tài khoản?
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="btn-delete-user-confirm"
                                    data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL VIEW -->
                <div class="modal fade text-left" id="view-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title text-light">Xem thông tin người dùng</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table-file">
                                    <tr>
                                        <td class="title">
                                            Mã người dùng
                                        </td>
                                        <td id="view-id">
                                            01
                                        </td>
                                        <td class="title">
                                            Họ và tên
                                        </td>
                                        <td id="view-hoten">
                                            30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title">Số CMND</td>
                                        <td id="view-cmnd"></td>
                                        <td class="title">Ngày sinh</td>
                                        <td id="view-ngaysinh"></td>
                                    </tr>
                                    <tr>
                                        <td class="title">Giới tính</td>
                                        <td id="view-gioitinh"></td>
                                        <td class="title">Vai trò</td>
                                        <td id="view-vaitro"></td>
                                    </tr>
                                    <tr>
                                        <td class="title">Số điện thoại</td>
                                        <td id="view-sdt"></td>
                                        <td class="title">Email</td>
                                        <td id="view-email"></td>
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
                <!-- MODAL UPDATE -->
                <div class="modal fade text-left" id="modal-update-user" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title">Sửa thông tin</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="update-form" method="post">
                                    <div class="row">
                                        <div class="form-group row col-6">
                                            <label for="lastname" class="col-sm-4 col-form-label">Họ lót:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="update_lastname"
                                                    name="update_lastname" placeholder="Họ lót">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="firstname" class="col-sm-4 col-form-label">Tên:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="update_firstname"
                                                    name="update_firstname" placeholder="Tên">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group row col-6">
                                            <label for="cmnd" class="col-sm-4 col-form-label">CMND:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="update_cmnd"
                                                    name="update_cmnd" placeholder="CMND">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="firstname" class="col-sm-4 col-form-label">Ngày sinh:</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="update_date"
                                                    name="update_date" placeholder="Tên">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="sex" class="col-sm-4 col-form-label">Giới tính:</label>
                                            <div class="col-sm-8 row">
                                                <div class="col-6">
                                                    <input type="radio" name="update_sex" id="male" value="Nam"
                                                        checked=checked>
                                                    <label class="form-check-label col-form-label" for="male"> Nam
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="" type="radio" name="update_sex" value="Nữ"
                                                        id="female">
                                                    <label class="form-check-label col-form-label" for="female"> Nữ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="phone_number" class="col-sm-4 col-form-label">SĐT:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="update_phone_number"
                                                    name="update_phone_number" placeholder="Số điện thoại">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" from-group row" style="padding-right: 1.5em; padding-left:0em" ;>
                                        <label for="address" class="col-2 col-form-label ">Địa chỉ:</label>
                                        <div class="col-10 row form-group">
                                            <div class="col-4">
                                                <select class="form-control" name="update_province" id="update_tinh">
                                                    <option value='-1'> Chọn Tỉnh/Thành Phố</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-control" name="update_district" id="update_huyen">
                                                    <option value='-1'> Chọn Quận/Huyện</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-control" name="update_ward" id="update_xa">
                                                    <option value='-1'> Chọn Phường/Xã</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group" ;>
                                        <label for="" class="col-2 col-form-label"> </label>
                                        <div class="col-10 row">
                                            <div class="col-6 row">
                                                <input type="text" class="form-control" id="update_village"
                                                    name="update_village" placeholder="Thôn/ấp">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="update_home"
                                                    name="update_home" placeholder="Số nhà">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                    </div>
                                    <div class="row">
                                        <div class="form-group row col-6">
                                            <label for="email" class="col-4 col-form-label"> Email:</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" id="update_email"
                                                    name="update_email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="role" class="col-4 col-form-label"> Vai trò:</label>
                                            <div class="col-8">
                                                <select class="form-control" name="update_role" id="update_role">
                                                    <option value='-1'>Chọn vai trò</option>
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
                                <button type="submit" class="btn btn-primary ml-1" id="btn-update">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Sửa</span>
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
            addPerson();
        })

        $("#search-user-text").keyup(function() {
            getListAdvantage(1, $('#search-user-text').val(), $('#cars-search').val())
        });
        $('#cars-search').change(function() {
            getListAdvantage(1, $('#search-user-text').val(), $('#cars-search').val())
        })
        $('#role').change(function() {
            if ($('#role').val() == 5) {
                $('#add-dtcl-modal').modal('show');
                $('#add-user-modal').modal('hide');
                getAdd();
            }
        })
        $('#add-dtcl-modal').validate({
            submitHandler: function(form, event) {
                event.preventDefault();
                $('#add-dtcl-modal').modal('hide');
                $('#add-user-modal').modal('show');
            }
        })
        $('#update_role').change(function() {
            if ($('#update_role').val() == 5) {
                $('#update-dtcl-modal').modal('show');
                $('#modal-update-user').modal('hide');
                getUpdate();
            }
        })
        $('#update-dtcl-modal').validate({
            submitHandler: function(form, event) {
                event.preventDefault();
                $('#update-dtcl-modal').modal('hide');
                $('#modal-update-user').modal('show');
            }
        })
        $('#btn-delete-user').click(function() {
            $('.check').toggleClass('d-none');
            var str = "";
            $('input.del-check:checked').each(function(index, element) {
                str += $(this).val() + '-';
            })
            str = str.slice(0, str.length - 1);
            if (str != "") {
                del(str);
            }
        });
    })
    /**SỬA */
    function update(idUser) {
        $('#modal-update-user').modal('show');
        updatePerson(idUser);

    }
    //Đổ dữ liệu vào modal sửa
    function updatePerson(idUser) {
        getAddress('update_');
        $.ajax({
            url: 'http://localhost/emss/phanquyen/getListRole',
            type: 'POST'
        }).done(function(response) {
            $('#update_role').empty();
            $('#update_role').append(' <option value=-1> Chọn  </option>');
            response.forEach(function(element, index) {
                var code = ' <option value=' + element['ma_vai_tro'] + ' class="role">' +
                    element['ten_vai_tro'] + '</option>';
                $('#update_role').append(code);
            });
            $.ajax({
                url: 'http://localhost/emss/nguoidung/getOneByID',
                data: {
                    ma_nguoi_dung: idUser
                },
                type: 'POST'
            }).done(function(response) {
                $('#update_lastname').val(response[0].ho_lot);
                $('#update_firstname').val(response[0].ten);
                $('#update_cmnd').val(response[0].cmnd);
                $('#update_date').val(response[0].ngay_sinh);
                $('#update_sex').val(response[0].phai);
                $('#update_phone_number').val(response[0].so_dien_thoai);
                $('#update_email').val(response[0].email);
                $('#update_role').val(response[0].ma_vai_tro);
                doUpdate(idUser);
            })
        })
    }
    /**Đổ dữ liệu vào modal hồ sơ */
    function getUpdate() {

        var patient = $.ajax({
            url: 'http://localhost/emss/benhnhan/getAll',
            type: 'POST',
        });
        var location = $.ajax({
            url: 'http://localhost/emss/diadiem/getList',
            type: 'POST',
        });
        $.when(patient, location).done(function(l_patient, l_location) {
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
                if (element['phan_loai'] == 1) local.append(
                    `<option value='${element['ma_dia_diem']}'>${element['ten_dia_diem']}</option>`);
            });
        })
    }

    function doUpdate(idUser) {
        $("form[name='update-form']").validate({
            // Định nghĩa rule validate
            rules: {
                update_lastname: {
                    required: true,
                },
                update_firstname: {
                    required: true,
                },
                update_cmnd: {
                    required: true,
                    minlength: 9,
                },
                update_date: {
                    required: true,
                },
                update_phone_number: {
                    required: true,
                    number: true,
                },
                update_province: {
                    min: 0
                },
                update_district: {
                    min: 0
                },
                update_ward: {
                    min: 0
                },
                update_email: {
                    email: true,
                    required: true
                },
            },
            //Tạo massages:
            messages: {
                update_lastname: "Vui lòng nhập họ lót",
                update_firstname: "Vui lòng nhập tên",
                update_cmnd: {
                    required: "Vui lòng nhập số chứng minh nhân dân",
                    minlength: "Định dạng CMND không hợp lệ",
                },
                update_date: "Vui lòng chọn ngày sinh",
                update_phone_number: {
                    required: "Vui lòng nhập số điện thoại",
                    number: "Vui lòng nhập đúng định dạng"
                },
                update_rovince: "Vui lòng chọn tỉnh/thành phố",
                update_district: "Vui lòng chọn huyện/quận",
                update_ward: "Vui lòng chọn xã/phường",
                update_email: {
                    email: "Vui lòng nhập đúng định dạng",
                    required: "Vui lòng nhập email"
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                $.post(
                    'http://localhost/emss/nguoidung/update', {
                        idUser: idUser,
                        lastname: $('#update_lastname').val(),
                        firstname: $('#update_firstname').val(),
                        cmnd: $('#update_cmnd').val(),
                        birthday: $('#update_date').val(),
                        sex: $('input[name="update_sex"]').val(),
                        phone_number: $('#update_phone_number').val(),
                        province: $('.update_tinh:selected').text(),
                        district: $('.update_huyen:selected').text(),
                        ward: $('.update_xa:selected').text(),
                        village: $('#update_village').val(),
                        home: $('#update_home').val(),
                        email: $('#updaye_email').val(),
                        password: $('#update_cmnd').val(),
                        role: $('.role:selected').val(),
                        object: $('#update_object').val(),
                        source: $('#update_source').val(),
                        local: $('#update_local').val()
                    }).done(function(data) {
                    if (data == true) {
                        Toastify({
                            text: "Cập Nhật Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        $(form).trigger("reset");
                        $('#modal-update-user').modal('hide');
                        getListAdvantage(1, "", "");
                    } else {
                        Toastify({
                            text: "Thất bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6600",
                        }).showToast();
                        $('#modal-update-user').modal('show');
                    }
                })
            }
        });
    }

    /**XEM */
    function getView(idUser) {
        $('#view-user-modal').modal('show');
        $.ajax({
            url: 'http://localhost/emss/nguoidung/getOneByID',
            data: {
                ma_nguoi_dung: idUser
            },
            type: 'POST'
        }).done(function(response) {
            $('#view-id').text(response[0].ma_nguoi_dung);
            $('#view-hoten').text(response[0].ho_lot + ' ' + response[0].ten);
            $('#view-cmnd').text(response[0].cmnd);
            $('#view-ngaysinh').text(response[0].ngay_sinh);
            $('#view-gioitinh').text(response[0].phai);
            $('#view-vaitro').text(response[0].ten_vai_tro);
            $('#view-sdt').text(response[0].so_dien_thoai);
            $('#view-email').text(response[0].email);
            $('#diachi').text(response[0].dia_chi);
        })
    }
    /**Đổ dữ liệu vào modal hồ sơ */
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
        })
    }
    /**XÓA TÀI KHOẢN
     * 
     */
    function del(str) {
        $('#modal-confirm-delete').modal('show');
        $('#btn-delete-user-confirm').click(function() {
            $.ajax({
                url: 'http://localhost/emss/nguoidung/delete',
                data: {
                    list_user: str
                },
                type: 'POST',
            }).done(function(data) {
                if (!data) {
                    Toastify({
                        text: "Xóa thành công",
                        duration: 1000,
                        close: true,
                        gravity: "top",
                        position: "center",
                        backgroundColor: "#00CC33",
                    }).showToast();
                    getListAdvantage(1, "", "");
                } else {
                    Toastify({
                        text: "Xóa thất bại",
                        duration: 1000,
                        close: true,
                        gravity: "top",
                        position: "center",
                        backgroundColor: "#00CC33",
                    }).showToast();
                }
            })
        })
    }

    /**Lấy danh sách tỉnh huyện xã */
    function getAddress(text) {
        var address = $.xResponse();
        address.forEach(function(element, index) {
            $(`#${text}tinh`).append(
                `<option class="${text}tinh" value="${index}">${element['name']}</option>`);
        })
        $(`#${text}tinh`).change(function() {
            $(`#${text}huyen`).empty();
            $(`#${text}huyen`).append('<option value="-1"> Chọn Quận/Huyện</option>')
            $(`#${text}xa`).empty();
            $(`#${text}xa`).append('<option value="-1"> Chọn Phường/Xã </option>')
            var districs = address[$(`#${text}tinh`).val()]['districts'];
            districs.forEach(function(element, index) {
                $(`#${text}huyen`).append(
                    `<option class="${text}huyen" value="${index}">${element['name']}</option>`)
            })
            $(`#${text}huyen`).change(function() {
                $(`#${text}xa`).empty();
                $(`#${text}xa`).append('<option value="-1"> Chọn Phường/Xã </option>')
                var wards = districs[$(`#${text}huyen`).val()]['wards'];
                wards.forEach(function(element, index) {
                    $(`#${text}xa`).append(
                        `<option  class="${text}xa" value="${index}">${element['name']}</option>`
                    )
                })
            })
        });
    }
    /**THÊM */
    function addPerson() {
        getAddress("");
        $.ajax({
            url: 'http://localhost/emss/phanquyen/getListRole',
            type: 'POST'
        }).done(function(response) {
            $('#role').empty();
            $('#role').append(' <option value=-1> Chọn  </option>');
            response.forEach(function(element, index) {
                var code = ' <option value=' + element['ma_vai_tro'] + ' class="role">' +
                    element['ten_vai_tro'] + '</option>';
                $('#role').append(code);
            });
            doAdd();
        })
    }

    function doAdd() {
        $("form[name='add-form']").validate({
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
                $.post(
                    'http://localhost/emss/nguoidung/add', {
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
                        password: $('#cmnd').val(),
                        role: $('.role:selected').val(),
                        object: $('#object').val(),
                        source: $('#source').val(),
                        local: $('#local').val()
                    }).done(function(data) {
                    if (data.thanhcong == true) {
                        Toastify({
                            text: "Thêm Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        $(form).trigger("reset");
                        $('#add-user-modal').modal('hide');
                        getListAdvantage(1, "", "");
                    } else {
                        Toastify({
                            text: data.error,
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6600",
                        }).showToast();
                        $('#add-user-modal').modal('show');
                    }
                })
            }
        });
    }

    /** Các hàm */
    //Hàm đổi page
    function changePage(newPage) {
        getListAdvantage(newPage, $('#search-user-text').val(), $('#cars-search').val());
    }
    //Hàm lấy dữ liệu
    function getListAdvantage(current_page, text, column) {
        $.ajax({
            url: `http://localhost/emss/nguoidung/getList?current_page=${current_page}&row_per_page=5&keyword=${text}&column=${column}`,
            type: 'GET'
        }).done(function(data) {
            var row = 1;
            const table1 = $('#table1 > tbody');
            table1.empty();
            data.data.forEach(function(element, index) {
                var mark = 'table-info';
                if (row % 2 == 0) {
                    mark = 'table-light';
                }
                var html =
                    `<tr class="${mark}">
                            <td class="check d-none"><input type="checkbox" value="${element.ma_nguoi_dung}" class="form-check-input del-check shadow-none ${element.ma_nguoi_dung}"></td>
                            <td>${element.ho_lot}</td>
                            <td>${element.ten}</td>
                            <td>${element.ten_vai_tro}</td>
                            <td>${element.so_dien_thoai}</td>
                            <td>${element.cmnd}</td>
                            <td>
                                <button onclick="getView(${element.ma_nguoi_dung})"type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="update(${element.ma_nguoi_dung})" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-gear"></i>
                                </button>
                                <button onclick="del(${element.ma_nguoi_dung})" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`;
                table1.append(html);
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
    </script>
</body>

</html>
<?php

use App\Core\View;

View::$activeItem = 'test';

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
                            <div class="col-12 col-md-8 order-md-1 order-last">
                                <label>
                                    <h3>Danh sách mẫu xét nghiệm</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                    <option value="ho">Mã mẫu xét nghiệm</option>
                                    <option value="ten">Mã hồ sơ</option>
                                    <option value="phai">Thời gian lấy mẫu</option>
                                    <option value="cmnd">Thời gian có kết quả</option>
                                    <option value="sdt">Kết quả</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-benhnhan' class="btn btn-danger">
                                        <i class="bi bi-trash-fill icon-mid"></i> Xóa mẫu
                                    </button>
                                    <button id='open-add-benhnhan-btn' class="btn btn-primary">
                                        <i class="bi bi-plus icon-mid"></i> Thêm mẫu
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
                                                <th>Chọn</th>
                                                <th>Mã mẫu xét nghiệm</th>
                                                <th>Mã hồ sơ</th>
                                                <th>Thời gian lấy mẫu</th>
                                                <th>Thời gian có kết quả</th>
                                                <th>Kết quả</th>
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
    let currentPage = 1;
    $(function() {
        getTestAjax();

    });

    function changePage(newPage) {
        currentPage = newPage;
        getTestAjax();
    }

    function getTestAjax() {
        $.get(`http://localhost/emss/xetnghiem/getList?row_per_page=10&current_page=${currentPage}`,
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
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_mau_XN}"/>
                                </div>
                            </td>
                            <td>${data.ma_mau_XN}</td>
                            <td>${data.ma_ho_so}</td>
                            <td>${data.tg_lay_mau}</td>
                            <td>${data.tg_co_ket_qua}</td>
                            <td>${data.ket_qua}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_mau_XN}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_mau_XN}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_mau_XN}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_mau_XN}"/>
                                </div>
                            </td>
                            <td>${data.ma_mau_XN}</td>
                            <td>${data.ma_ho_so}</td>
                            <td>${data.tg_lay_mau}</td>
                            <td>${data.tg_co_ket_qua}</td>
                            <td>${data.ket_qua}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_mau_XN}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_mau_XN}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_mau_XN}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                        $row += 1;
                    }
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
    </script>
</body>

</html>
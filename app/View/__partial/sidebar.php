<?php

use App\Core\View;
use App\Core\Cookie;
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="index.html"><img src="<?= View::assets('images/logo/logo_.png') ?>" alt="Logo" srcset="" style="transform: scale(1.6, 1.6)" /></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item <?= View::$activeItem == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= View::getBaseUrl() ?>" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Trang Chủ</span>
                    </a>
                </li>
                <li id="dangnhap" class="sidebar-item">
                    <a href="<?= View::url('auth/login') ?>" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Đăng nhập</span>
                    </a>
                </li>
                <li id="1" class="d-none sidebar-item  <?= View::$activeItem == 'user' ? 'active' : '' ?>">
                    <a href="<?= View::url('nguoidung/index') ?>" class="sidebar-link">
                        <i class="bi bi-people"></i>
                        <span>Quản lí người dùng</span>
                    </a>
                </li>
                <li id="2" class="d-none sidebar-item  <?= View::$activeItem == 'patient' ? 'active' : '' ?>">
                    <a href="<?= View::url('benhnhan/index') ?>" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Quản lí bệnh nhân</span>
                    </a>
                </li>
                <li id="3" class="d-none sidebar-item  <?= View::$activeItem == 'object' ? 'active' : '' ?>">
                    <a href="<?= View::url('doituongcachly/index') ?>" class="sidebar-link">
                        <i class="bi bi-person-square"></i>
                        <span>Quản lí DTCL</span>
                    </a>
                </li>
                <li id="4" class="d-none sidebar-item  <?= View::$activeItem == 'trace' ? 'active' : '' ?>">
                    <a href="<?= View::url('truyvet/index') ?>" class="sidebar-link">
                        <i class="bi bi-share"></i>
                        <span>Quản lí truy vết</span>
                    </a>
                </li>
                <li id="5" class="d-none sidebar-item  <?= View::$activeItem == 'test' ? 'active' : '' ?>">
                    <a href="<?= View::url('xetnghiem/index') ?>" class="sidebar-link">
                        <i class="bi bi-eyedropper"></i>
                        <span>Quản lí xét nghiệm</span>
                    </a>
                </li>
                <li id="9" class="d-none sidebar-item  <?= View::$activeItem == 'location' ? 'active' : '' ?>">
                    <a href="<?= View::url('diadiem/index') ?>" class="sidebar-link">
                        <i class="bi bi-map"></i>
                        <span>Quản lí địa điểm</span>
                    </a>
                </li>
                <li id="6" class="d-none sidebar-item  <?= View::$activeItem == 'role' ? 'active' : '' ?>">
                    <a href="<?= View::url('phanquyen/index') ?>" class="sidebar-link">
                        <i class="bi bi-person-check"></i>
                        <span>Quản lí phân quyền</span>
                    </a>
                </li>
                <li id="7" class="d-none sidebar-item  <?= View::$activeItem == 'statis' ? 'active' : '' ?>">
                    <a href="<?= View::url('thongke/index') ?>" class="sidebar-link">
                        <i class="bi bi-graph-up"></i>
                        <span>Thống kê</span>
                    </a>
                </li>
                <li id="10" class="d-none sidebar-item  <?= View::$activeItem == 'confirm' ? 'active' : '' ?>">
                    <a href="<?= "http://localhost/emss/doituongcachly/complete/id=". Cookie::get('user_id')?>" target="_blank" class="sidebar-link">
                        <i class="bi bi-graph-up"></i>
                        <span>Xác nhận hoàn thành cách ly</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
        </button>
    </div>
</div>
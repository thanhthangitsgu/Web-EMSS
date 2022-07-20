<?php

namespace App\Core;

use App\Model\QuyenModel;

class Auth
{

    // Kiểm tra xem user có đang đang nhập hay không, nếu không thì chuyển hướng sang trang đăng nhập
    public static function checkAuthentication()
    {
        if (!Cookie::userIsLoggedIn()) {
            Redirect::to('auth/login?redirect='  . urlencode($_SERVER['REQUEST_URI']));
        }
    }

    public static function checkLogin(){
        if (Cookie::userIsLoggedIn()) {
            return true;
        }
        return false;
    }

    // Kiểm tra xem user có đang đang nhập hay không, nếu có thì chuyển hướng sang trang chủ
    public static function checkNotAuthentication()
    {
        if (Cookie::userIsLoggedIn()) {
            Redirect::home();
        }
    }
}

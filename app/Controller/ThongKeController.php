<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;

class ThongKeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('thongke/index');
    }
}

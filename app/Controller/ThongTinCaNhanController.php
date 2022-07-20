<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;

class ThongTinCaNhanController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('thongtincanhan/index');
    }
    public function getOneByID()
    {
    }
    public function add()
    {
    }
    public function getList()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}

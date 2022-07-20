<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Model\PhanQuyenModel;
class PhanQuyenController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('phanquyen/index');
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
    public function getListRole(){
        Auth::checkAuthentication();
        $data = PhanQuyenModel::getListRole();
        $this->View->renderJSON($data);
    }
}


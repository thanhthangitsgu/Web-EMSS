<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Request;
use App\Model\XetNghiemModel;

class XetNghiemController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('xetnghiem/index');
    }
    public function getOneByID()
    {
    }
    public function add()
    {
    }
    public function getList()    {
        Auth::checkAuthentication();
        $current_page = Request::get('current_page');
        $row_per_page = Request::get('row_per_page');
        $data = XetNghiemModel::getList($current_page, $row_per_page);
        $this->View->renderJSON($data);
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
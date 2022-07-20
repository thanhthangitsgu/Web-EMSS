<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;

use App\Core\Request;
use App\Model\DiaDiemModel;

class DiaDiemController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('diadiem/index');
    }

    public function getOneByID()
    {
        Auth::checkAuthentication();
        $id = Request::post('id');
        $kq = DiaDiemModel::getOneByID($id);
        $this->View->renderJSON($kq);
    }

    public function add()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN02");
        $ten = Request::post('addten');
        $tinh = Request::post('addtinh');
        $huyen = Request::post('addhuyen');
        $xa = Request::post('addxa');
        $thon = Request::post('addthon');
        $sonha = Request::post('addsonha');
        $loai = Request::post('addloai');
        $succhua = Request::post('addsucchua');
        $trong = Request::post('addtrong');
        $kq = DiaDiemModel::create($ten, $tinh, $huyen, $xa, $thon, $sonha, $loai, $succhua, $trong);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function getAddress()
    {

        //Auth::ktraquyen("CN02");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page');
        $rowsPerPage = Request::get('rowsPerPage');
        $data = DiaDiemModel::getAllPagination($search, $search2, $page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getAddressHome()
    {
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page');
        $rowsPerPage = Request::get('rowsPerPage');
        $data = DiaDiemModel::getAllPaginationHome($search, $search2, $page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function update()
    {
        Auth::checkAuthentication();
        $ma = Request::post('upma');
        $ten = Request::post('upten');
        $tinh = Request::post('uptinh');
        $huyen = Request::post('uphuyen');
        $xa = Request::post('upxa');
        $thon = Request::post('upthon');
        $sonha = Request::post('upsonha');
        $loai = Request::post('uploai');
        $succhua = Request::post('upsucchua');
        $trong = Request::post('uptrong');
        $kq = DiaDiemModel::update($ma, $ten, $tinh, $huyen, $xa, $thon, $sonha, $loai, $succhua, $trong);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function delete()
    {
        Auth::checkAuthentication();
        $list = Request::post('list');
        $list_id = explode('-', $list);
        foreach ($list_id as $value) {
            $data = DiaDiemModel::delete($value);
            if ($data = false) $this->View->renderJSON($data);
        }
        $this->View->renderJSON($data);
    }

    public function deletes()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN02");
        $ids = Request::post('ids');
        $ids = json_decode($ids);
        $kq = DiaDiemModel::deletes($ids);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function getList()
    {
        Auth::checkAuthentication();
        $data = DiaDiemModel::getAll();
        return $this->View->renderJSON($data);
    }
}

<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Request;
use App\Model\DTCLModel;
use App\Model\DiaDIemModel;
use App\Model\NguoiDungModel;
use App\Core\Cookie;
use App\Core\AES;
use App\Core\RSA;

date_default_timezone_set('Asia/Ho_Chi_Minh');
class DoiTuongCachLyController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    public function index()
    {
        $this->View->render('doituongcachly/index');
    }

    public function complete()
    {
        $this->View->render('doituongcachly/complete');
    }
    public function detail()
    {
        $flag = Request::get('flag');
        if ($flag === 'view') {
            $current_page = Request::get('current_page');
            $row_per_page = Request::get('row_per_page');
            $userID = Request::get('id');
            $data = DTCLModel::getDetailDTCL($userID, $row_per_page, $current_page);
            foreach ($data['data'] as $value) {
                $value->ten_dia_diem = DiaDIemModel::getOneByID($value->ma_dia_diem)[0]->ten_dia_diem;
            }
            $this->View->renderJSON($data);
        } else
        if ($flag === 'getid') {
            $id = Request::get('id');
            $_data = [
                'id' => $id,
            ];
            $this->View->renderJSON($_data);
        }
        if ($flag == null)  $this->View->render('doituongcachly/detail');
    }
    public function doAdd()
    {
        $this->View->render('doituongcachly/doAdd');
    }
    public function getOneByID()
    {
        Auth::checkAuthentication();
        $id = Request::post('id');
        $data = DTCLModel::getOneByID($id);
        $this->View->renderJSON($data);
    }
    public function add()
    {
        Auth::checkAuthentication();
        $ma_doi_tuong = Request::post('ma_doi_tuong');
        $ma_dia_diem = Request::post('ma_dia_diem');
        $tg_bat_dau =  date('Y-m-d H:i:s');
        $tg_ket_thuc = Request::post('tg_ket_thuc');
        $f = Request::post('f');
        $nguon_lay = Request::post('nguon_lay');
        $data = DTCLModel::add($ma_doi_tuong, $ma_dia_diem, $tg_bat_dau, $tg_ket_thuc, $f, $nguon_lay);
        if ($data == true) $data = [
            'thanhcong' => true,
        ];
        else $data = [
            'thanhcong' => false,
        ];
        $this->View->renderJSON($data);
    }
    public function getList()
    {
        Auth::checkAuthentication();
        $keyword = Request::get('keyword');
        $current_page = Request::get('current_page');
        $row_per_page = Request::get('row_per_page');
        $column = Request::get('column');
        $data = DTCLModel::getAllPagination($keyword, $column, $current_page, $row_per_page);
        foreach ($data['data'] as $value ){
            //$value->password=RSA::decryptRSA(AES::decryptAES($value->password));
            $value->user_name=AES::decryptAES($value->user_name);
            $value->cmnd=AES::decryptAES($value->cmnd);
            $value->so_dien_thoai=AES::decryptAES($value->so_dien_thoai);
        }
        $this->View->renderJSON($data);
    }

    public function update()
    {
        Auth::checkAuthentication();
        $ma_ho_so = Request::post('ma_ho_so');
        $ma_dia_diem = Request::post('ma_dia_diem');
        $f = Request::post('f');
        $nguon_lay = Request::post('nguon_lay');
        $row = Request::post('row');
        $id = Request::post('id');
        $data = DTCLModel::update($ma_ho_so, $ma_dia_diem, $f, $nguon_lay);
        if ($row == 0) {
            $data = DTCLModel::update_2($ma_dia_diem, $nguon_lay, $f, $id);
        }
        if ($data = false)
            $data = ['thanhcong' => false,];
        else $data = ['thanhcong' => true];
        $this->View->renderJSON($data);
    }
    public function delete()
    {
        Auth::checkAuthentication();
        $list = Request::post('list');
        $list_id = explode('-', $list);
        foreach ($list_id as $value) {
            $data = DTCLModel::delete($value);
            if ($data = false) {
                $data = [
                    'thanhcong' => false,
                ];
                $this->View->renderJSON($data);
            }
        }
        $data = [
            'thanhcong' => true,
        ];
        $this->View->renderJSON($data);
    }
    public function delete_dtcl()
    {
        Auth::checkAuthentication();
        $list = Request::post('list');
        $list_id = explode('-', $list);
        foreach ($list_id as $value) {
            $data = DTCLModel::delete_2($value);
            $data = NguoiDungModel::updateRole($value, 6);
            if ($data = false) {
                $data = [
                    'thanhcong' => false,
                ];
                $this->View->renderJSON($data);
            }
        }
        $data = [
            'thanhcong' => true,
        ];
        $this->View->renderJSON($data);
    }

    public function addPerson()
    {
        Auth::checkAuthentication();
        $ma_doi_tuong = Request::post('ma_doi_tuong');
        $ma_dia_diem = Request::post('ma_dia_diem');
        $f = Request::post('f');
        $nguon_lay = Request::post('nguon_lay');
        $data = DTCLModel::add_2($ma_doi_tuong, $ma_dia_diem, $f, $nguon_lay);
        $this->View->renderJSON($data);
    }
    public function updateFinishTime()
    {
        Auth::checkAuthentication();
        $ma_doi_tuong = Request::post('ma_doi_tuong');
        $idUser = Cookie::get('user_id');
        $user = NguoiDungModel::getOneByID($idUser);
        $tg_ket_thuc =  date('Y:m:d');
        $file = DTCLModel::getCurrentFile($ma_doi_tuong);
        $response = DTCLModel::updateFinishTime($tg_ket_thuc, $file[0]->ma_ho_so, $user[0]->cmnd);
        $this->View->renderJSON($response);
    }
    public function getFile()
    {
        Auth::checkAuthentication();
        $ma_doi_tuong = Request::post('ma_doi_tuong');
        $file = DTCLModel::getCurrentFile($ma_doi_tuong);
        $file[0]->cmnd=AES::decryptAES($file[0]->cmnd);
        $this->View->renderJSON($file);
    }
}
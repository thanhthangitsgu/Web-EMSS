<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Cookie;
use App\Model\TruyVetModel;
use App\Core\AES;

class TruyVetController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('truyvet/index');
    }
    public function getOneByID()
    {
    }
    public function add()
    {
        Auth::checkAuthentication();
        $ma_benh_nhan = Request::post('ma_benh_nhan');
        $ma_nhan_vien =  Cookie::get('user_fullname');
        $timestamp = time();
        $thoi_gian_truy_vet = date('Y-m-d H:i:s', $timestamp);
        $tg_bat_dau = Request::post('tg_bat_dau');
        $tg_ket_thuc = Request::post('tg_ket_thuc');
        $data = TruyVetModel::add($ma_benh_nhan, $ma_nhan_vien, $thoi_gian_truy_vet, $tg_bat_dau, $tg_ket_thuc);
        return $this->View->renderJSON($data);
    }
    public function getList()
    {
        Auth::checkAuthentication();
        $current_page = Request::get('current_page');
        $row_per_page = Request::get('row_per_page');
        $data = TruyVetModel::getList($current_page, $row_per_page);
        return $this->View->renderJSON($data);
    }
    public function ascData($date, $number)
    {
    }
    public function getSchedule()
    {
        Auth::checkAuthentication();
        $ma_doi_tuong = Request::post('ma_doi_tuong');
        $tgbd = Request::post('tg_bat_dau');
        $tgkt = Request::post('tg_ket_thuc');
        $Object = TruyVetModel::getOneByObject($ma_doi_tuong, $tgbd, $tgkt);
        $result = [
            'location' => $Object
        ];
        $i = 0;
        $F1_name = array();
        foreach ($Object as $value) {
            $exp = explode(" ", $value['thoi_gian']);
            $getDate = explode('-', $exp[0]);
            $getTime = explode(':', $exp[1]);
            $time = mktime($getTime[0], $getTime[1], $getTime[2], $getDate[1], ($getDate[2] + 3), $getDate[0]);
            $F1 = TruyVetModel::getOneByLocation($value['ma_dia_diem'], $value['thoi_gian'], date('Y-m-d H:i:s', $time),  $value['ma_nguoi_dung'],$value['ma_nguoi_dung']);
            foreach ($F1 as $value_) {
                $F1_name[$i] = ['ma_nguoi_dung' => $value_['ma_nguoi_dung'], 'thoi_gian' => $value_['thoi_gian']];
                $i++;
            }
        }
        $result['F1'] = $F1_name;
        $i = 0;
        $F2_name = array();
        foreach ($F1_name as $value) {
            $F2 = TruyVetModel::getOneByObject($value['ma_nguoi_dung'], $tgbd, $tgkt);
            foreach ($F2 as $value_) {
                $exp = explode(" ", $value_['thoi_gian']);
                $getDate = explode('-', $exp[0]);
                $getTime = explode(':', $exp[1]);
                $time = mktime($getTime[0], $getTime[1], $getTime[2], $getDate[1], ($getDate[2] + 3), $getDate[0]);
                $F2_location = TruyVetModel::getOneByLocation($value_['ma_dia_diem'], $value_['thoi_gian'], date('Y-m-d H:i:s', $time),  $value_['ma_nguoi_dung'], $result['location'][0]['ma_nguoi_dung']);
                foreach ($F2_location as $value_1) {
                    $F2_name[$i] = ['ma_nguoi_dung' => $value_1['ma_nguoi_dung'], 'thoi_gian' => $value_1['thoi_gian']];
                    $i++;
                }
            }
        }
        $result['F2'] = $F2_name;
        return $this->View->renderJSON($result);
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
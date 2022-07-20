<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;
use stdClass;

class TruyVetModel
{

    public static function getList($current_page, $row_per_page)
    {
        $limit = $row_per_page;
        $offset = ($current_page - 1) * $row_per_page;
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT * FROM thong_tin_truy_vet WHERE trang_thai = 1 ORDER BY thoi_gian_truy_vet DESC LIMIT " . $offset . ", " . $limit;
        $query = $database->prepare($sql);
        $query->execute();
        $result = new stdClass;
        if ($data = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $result = $data;
        }
        $sql_ = "SELECT COUNT(*) AS SL FROM thong_tin_truy_vet WHERE trang_thai =1";
        $query = $database->prepare($sql_);
        $query->execute();
        $totalRow = $query->fetch(PDO::FETCH_COLUMN);
        $response = [
            'totalPage' => ceil(intval($totalRow) / $row_per_page),
            'data' => $result
        ];
        return $response;
    }
    public static function getOneByObject($ma_nguoi_dung, $tgbd, $tgkt)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT * FROM lich_trinh WHERE ma_nguoi_dung ='" . $ma_nguoi_dung . "' AND thoi_gian>='" . $tgbd . "' AND thoi_gian<='" . $tgkt . "'";
        $query = $database->prepare($sql);
        $query->execute();
        if ($data = $query->fetchAll(PDO::FETCH_ASSOC)) {
            return $data;
        }
        return null;
    }
    public static function getOneByLocation($ma_dia_diem, $tgbd, $tgkt, $ma_nguoi_dung_1, $ma_nguoi_dung_2)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT * FROM lich_trinh WHERE ma_dia_diem ='" . $ma_dia_diem . "' AND thoi_gian>='" . $tgbd . "' AND thoi_gian<='" . $tgkt . "' AND ma_nguoi_dung!='" . $ma_nguoi_dung_1 . "' AND ma_nguoi_dung!='" . $ma_nguoi_dung_2 . "'";
        $query = $database->prepare($sql);
        $query->execute();
        $data = array();
        if ($data = $query->fetchAll(PDO::FETCH_ASSOC)) {
            return $data;
        }
        return $data;
    }
    public static function add($ma_benh_nhan, $ma_nhan_vien, $thoi_gian_truy_vet, $tg_bat_dau, $tg_ket_thuc)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "INSERT INTO thong_tin_truy_vet (ma_benh_nhan, ma_nhan_vien, thoi_gian_truy_vet, tg_bat_dau, tg_ket_thuc, trang_thai)
                VALUES (:ma_benh_nhan,:ma_nhan_vien, :thoi_gian_truy_vet, :tg_bat_dau, :tg_ket_thuc, 1)";
        $query = $database->prepare($sql);
        $query->execute([':ma_benh_nhan' =>$ma_benh_nhan, ':ma_nhan_vien' => $ma_nhan_vien, 'thoi_gian_truy_vet' => $thoi_gian_truy_vet, 'tg_bat_dau' => $tg_bat_dau, 'tg_ket_thuc'=> $tg_ket_thuc ]);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }

        return false;
    }
}

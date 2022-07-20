<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;
use stdClass;

class XetNghiemModel{
    public static function getList($current_page, $row_per_page){
        $limit = $row_per_page;
        $offset = ($current_page - 1) * $row_per_page;
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT * FROM thong_tin_xet_nghiem WHERE trang_thai = 1 ORDER BY ma_mau_XN LIMIT " . $offset . ", " . $limit;
        $query = $database->prepare($sql);
        $query->execute();
        $result = new stdClass;
        if ($data = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $result = $data;
        }
        $sql_ = "SELECT COUNT(*) AS SL FROM thong_tin_xet_nghiem WHERE trang_thai =1";
        $query = $database->prepare($sql_);
        $query->execute();
        $totalRow = $query->fetch(PDO::FETCH_COLUMN);
        $response = [
            'totalPage' => ceil(intval($totalRow) / $row_per_page),
            'data' => $result
        ];
        return $response;
    }
}
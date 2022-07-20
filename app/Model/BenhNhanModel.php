<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class BenhNhanModel{

    public static function getAllPagination($search, $search2, $current_page , $row_per_page){
        $limit = $row_per_page;
        $offset = ($current_page - 1) * $row_per_page;
        $database = DatabaseFactory::getFactory()->getConnection();
        $search = '%' . $search . '%';

        if ($search2 == "") {
            $sql = 'SELECT * FROM nguoi_dung WHERE (ho_lot LIKE :search OR ten LIKE :search OR phai LIKE :search) AND ma_vai_tro=4 AND trang_thai=1';
        } else if ($search2 == "ho") {
            $sql = 'SELECT * FROM nguoi_dung WHERE (ho_lot LIKE :search) AND ma_vai_tro=4 AND trang_thai=1';
        } else if ($search2 == "ten") {
            $sql = 'SELECT * FROM nguoi_dung WHERE (ten LIKE :search) AND ma_vai_tro=4 AND trang_thai=1';
        } else if ($search2 == "phai") {
            $sql = 'SELECT * FROM nguoi_dung WHERE (phai LIKE :search) AND ma_vai_tro=4 AND trang_thai=1';
        }

        $sql .= ' ORDER BY ma_nguoi_dung ASC LIMIT :limit OFFSET :offset';
        $query = $database->prepare($sql);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':search', $search, PDO::PARAM_STR);
        $query->execute();
        
        $data = $query->fetchAll();

        $count = "";
        if ($search2 == "") {
            $count = 'SELECT COUNT(*) FROM nguoi_dung WHERE (ho_lot LIKE :search OR ten LIKE :search OR phai LIKE :search) AND ma_vai_tro=4 AND trang_thai=1';
        } else if ($search2 == "ho") {
            $count = 'SELECT COUNT(*) nguoi_dung WHERE (ho_lot LIKE :search) AND ma_vai_tro=4 AND  trang_thai=1';
        } else if ($search2 == "ten") {
            $count = 'SELECT COUNT(*) FROM nguoi_dung WHERE (ten LIKE :search) AND ma_vai_tro=4 AND trang_thai=1';
        } else if ($search2 == "phai") {
            $count = 'SELECT COUNT(*) FROM nguoi_dung WHERE (phai LIKE :search) AND ma_vai_tro=4 AND trang_thai=1';
        }

        $countQuery = $database->prepare($count);
        $countQuery->bindValue(':search', $search, PDO::PARAM_STR);

        $countQuery->execute();
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN);

        $response = [
            'current_page' => $current_page,
            'row_per_page' => $row_per_page,
            'totalPage' => ceil(intval($totalRows) / $row_per_page),
            'data' => $data,
        ];
        return $response;
    }
    
    public static function getAll()
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT ma_benh_nhan, ma_benh_vien, ho_lot, ten FROM benh_nhan, nguoi_dung WHERE nguoi_dung.ma_nguoi_dung = benh_nhan.ma_benh_nhan";
        $query = $database->prepare($sql);
        $query->execute();  
        $data = $query->fetchAll();
        return $data;
    }
    
}
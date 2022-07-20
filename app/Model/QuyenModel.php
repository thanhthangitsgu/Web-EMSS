<?php

namespace App\Model;

use App\Core\DatabaseFactory;
use App\Core\Cookie;
use PDO;

class QuyenModel{
    
    public static function getAllPagination($search = null, $page = 1, $rowsPerPage = 20)
    {
        // tính limit và offset dựa trên số trang và số lương dòng trên mỗi trang
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();

        // query chỉ lấy quyen thuộc page yêu cầu
        $raw = 'SELECT * FROM vai_tro';
        if ($search) {
            $search = '%' . $search . '%';
            $raw .= ' WHERE (ten_vai_tro LIKE :search OR ma_vai_tro LIKE :search ) AND trang_thai = 1';
        } else {
            $raw .= ' WHERE trang_thai = 1';
        }

        $raw .= ' ORDER BY ma_vai_tro ASC LIMIT :limit OFFSET :offset';
        $query = $database->prepare($raw);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($search) {
            $query->bindValue(':search', $search, PDO::PARAM_STR);
        }

        $query->execute();
        $data = $query->fetchAll();

        // đếm số lượng tất cả quyen để tính số trang
        $count ='SELECT COUNT(ma_vai_tro) FROM vai_tro';
        if ($search) {
            $search = '%' . $search . '%';
            $count .= ' WHERE (ten_vai_tro LIKE :search OR ma_vai_tro LIKE :search) AND trang_thai = 1';
        } else {
            $count .= ' WHERE trang_thai = 1';
        }

        $countQuery = $database->prepare($count);  
        if ($search) {
            $countQuery->bindValue(':search', $search, PDO::PARAM_STR);
        } 
        $countQuery->execute(); 
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN);

        $response = [
            'page' => $page,
            'rowsPerPage' => $rowsPerPage,
            'totalPage' => ceil(intval($totalRows) / $rowsPerPage),
            'data' => $data,
        ];
        return $response;
    }

    public static function getAll(){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = 'SELECT * FROM quyen WHERE TrangThai = 1';
        $query  = $database->query($sql);
        $data = $query->fetchAll();
        $check = true;
        if(!$query){
            $check = false;
        }
        $response = [
            'thanhcong' => $check,
            'data' =>$data,
        ];
        return $response;
    }

    public static function getQuyen($maquyen){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = 'SELECT * FROM quyen WHERE MaQuyen = "'.$maquyen.'" AND TrangThai = 1 LIMIT 1';
        $query  = $database->query($sql);
        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }

    public static function getChiTietQuyen(){
        $database = DatabaseFactory::getFactory()->getConnection();
        $maquyen = Cookie::get('user_quyen');

        $sql = 'SELECT * FROM chi_tiet_quyen WHERE ma_vai_tro = "'.$maquyen.'" AND trang_thai = 1 ';
        $query = $database->query($sql);
        $data = $query->fetchAll();
        $check = true;
        if(!$query){
            $check = false;
        }
        $response = [
            'thanhcong' => $check,
            'data' =>$data,
        ];
        return $response;
    }

    public static function ktraQuyen($macn){
        $database = DatabaseFactory::getFactory()->getConnection();
        $maquyen = Cookie::get('user_quyen');
        $sql = 'SELECT * FROM chitietquyen WHERE MaQuyen = "'.$maquyen.'" AND MaChucNang = "'.$macn.'"';
        $query = $database->query($sql);
        $data = $query->fetch();
        if($data->TrangThai == 0){
            return false;
        }
        return true;
    }

    public static function getChucNang(){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = 'SELECT * FROM `chuc_nang` WHERE trang_thai = 1';
        $query = $database->query($sql);
        $row = $query->fetchAll();
        $check = true;
        if(!$query){
            $check = false;
        }
        $response = [
            'thanhcong' => $check,
            'data' =>$row,
        ];
        return $response;
    }

    public static function findOneByMaQuyen($maquyen){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM vai_tro WHERE ma_vai_tro = :mamon LIMIT 1");
        $query->execute([':mamon' => $maquyen]);


        if ($row = $query->fetch()) {
            return $row;
        }
        return null;

    }

    public static function update($maquyen, $tenquyen,$chitiets)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE vai_tro SET ten_vai_tro =:tenquyen WHERE ma_vai_tro = :maquyen";
        $query = $database->prepare($sql);
        $query->execute([':maquyen' => $maquyen,':tenquyen' => $tenquyen]);

        $count2 = 0;
        foreach ($chitiets as &$chitiet) {
            $sql2 = "UPDATE chi_tiet_quyen SET trang_thai =:trangthai WHERE ma_vai_tro = :maquyen AND ma_chuc_nang = :machucnang";
            $query2 = $database->prepare($sql2);
            $query2->execute([':maquyen' => $chitiet->MaQuyen,':machucnang' => $chitiet->MaChucNang,':trangthai' => $chitiet->TrangThai]);
            $count2 += $query2->rowCount();
        }

        $count = $query->rowCount() + $count2;
        if ($count > 0) {
            return true;
        }
        return false;
    }

    public static function create($maquyen, $tenquyen,$chitiets)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "INSERT INTO vai_tro (ma_vai_tro, ten_vai_tro) VALUES (:maquyen,:tenquyen) ";
        $query = $database->prepare($sql);
        $query->execute([':maquyen' => $maquyen,':tenquyen' => $tenquyen]);

        $count2 = 0;
        foreach ($chitiets as &$chitiet) {
            $sql2 = "INSERT INTO chi_tiet_quyen (ma_vai_tro, ma_chuc_nang, trang_thai) VALUES (:maquyen,:machucnang,:trangthai)";
            $query2 = $database->prepare($sql2);
            $query2->execute([':maquyen' => $chitiet->MaQuyen,':machucnang' => $chitiet->MaChucNang,':trangthai' => $chitiet->TrangThai]);
            $count2 += $query2->rowCount();
        }

        $count = $query->rowCount() + $count2;
        if ($count > 0) {
            return true;
        }
        return false;
    }

    public static function findChiTietQuyen($maquyen){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM chi_tiet_quyen WHERE ma_vai_tro = :mamon ORDER BY ma_chuc_nang ASC");
        $query->execute([':mamon' => $maquyen]);

        if ($row = $query->fetchAll()) {
            return $row;
        }
        return null;
    }

    public static function delete($maquyen){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "UPDATE `vai_tro` SET trang_thai = 0  WHERE ma_vai_tro = :mamon";
        $query = $database->prepare($sql);
        $query->execute([':mamon' => $maquyen]);       
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function deletes($maquyens){
        $database = DatabaseFactory::getFactory()->getConnection();
        $raw = "(";
        foreach ($maquyens as &$email) {
            $raw .= "'" . $email . "',";
        }
        $raw = substr($raw, 0, -1);
        $raw .= ")";

        $sql = "UPDATE `vai_tro` SET trang_thai = 0  WHERE ma_vai_tro IN " . $raw;
        echo($sql);
        $count  = $database->exec($sql);
        if (!$count) {
            return false;
        }
        return true;
    }
}
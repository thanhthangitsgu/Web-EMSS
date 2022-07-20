<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;
use stdClass;

class NguoiDungModel
{

    public static function getOneByUserName($username)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM nguoi_dung WHERE user_name = :username LIMIT 1");
        $query->execute([':username' => $username]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function getOneByID($ma_nguoi_dung)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM nguoi_dung, vai_tro WHERE ma_nguoi_dung = :mnd AND nguoi_dung.ma_vai_tro = vai_tro.ma_vai_tro  LIMIT 1");
        $query->execute([':mnd' => $ma_nguoi_dung]);
        $data = $query->fetchAll();
        return $data;
    }
    public static function add($username, $password, $vaitro, $holot, $ten, $cmnd, $ngaysinh, $phai, $diachi, $email, $sdt)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $data = [
            'thanhcong' => false,
        ];
        $sql = "SELECT * FROM nguoi_dung WHERE user_name='" . $username . "'";
        $query = $database->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        if ($count == 1) {
            $data['thanhcong'] = false;
            $data['error'] = "Số điện thoại đã được sử dụng";
            return $data;
        }
        $sql = "SELECT * FROM nguoi_dung WHERE cmnd='" . $cmnd . "'";
        $query = $database->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        if ($count == 1) {
            $data['thanhcong'] = false;
            $data['error'] = "CMND đã tồn tại";
            return $data;
        }

        $sql_ = "INSERT INTO nguoi_dung (user_name, password, ma_vai_tro, ho_lot, ten, cmnd, ngay_sinh, phai, dia_chi, email, so_dien_thoai, trang_thai)
                VALUES ('" . $username . "','" . $password . "'," . $vaitro . ", '" . $holot . "', '" . $ten . "', '" . $cmnd . "', '" . $ngaysinh . "','" . $phai . "', '" . $diachi . "', '" . $email . "', '" . $sdt . "', 1)";
        $query = $database->prepare($sql_);
        //$query->execute([':user_name' => $username, ':hashed_password' => $hashed_password, ':role' => $vaitro, ':holot'=> $holot, ':ten'=> $ten, ':cmnd'=> $cmnd, ':ngay_sinh'=> $ngaysinh, ':phai'=> $phai, ':dia_chi'=>$diachi, ':email'=>$email, ':so_dien_thoai'=>$sdt]);
        $query->execute();
        $count = $query->rowCount();
        if ($count == 1) {
            $data['thanhcong'] = true;
            $data['summary'] = "Thành công";
        }

        return $data;
    }
    public static function update($idUser,$user_name, $role, $lastname, $firstname, $cmnd, $birthday, $sex, $address, $email, $phone_number)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("UPDATE nguoi_dung SET user_name='" . $user_name . "', ma_vai_tro=" . $role . ", ho_lot='" . $lastname . "', ten='" . $firstname . "', cmnd='" . $cmnd . "' , ngay_sinh='" . $birthday . "', phai='" . $sex . "', dia_chi='" . $address . "', email='" . $email . "', so_dien_thoai= '" . $phone_number . "' WHERE ma_nguoi_dung='" . $idUser. "'");
        return $query->execute();
    }
    public static function delete($ma_nguoi_dung)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("UPDATE nguoi_dung SET trang_thai=0 WHERE ma_nguoi_dung='" . $ma_nguoi_dung . "'");
        return $query->execute();
    }
    public static function getList($current_page, $row_per_page)
    {
        $limit = $row_per_page;
        $offset = ($current_page - 1) * $row_per_page;
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT * FROM nguoi_dung WHERE trang_thai = 1 ORDER BY ten LIMIT " . $offset . ", " . $limit;
        $query = $database->prepare($sql);
        $query->execute();
        $result = new stdClass;
        if ($data = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $result = $data;
        }
        $sql_ = "SELECT COUNT(*) AS SL FROM nguoi_dung WHERE trang_thai =1";
        $query = $database->prepare($sql_);
        $query->execute();
        $totalRow = $query->fetch(PDO::FETCH_COLUMN);
        $response = [
            'totalPage' => ceil(intval($totalRow) / $row_per_page),
            'data' => $result
        ];
        return $response;
    }
    public static function getListAdvanted($current_page, $row_per_page, $keyword, $column)
    {
        $limit = $row_per_page;
        $offset = ($current_page - 1) * $row_per_page;
        $database = DatabaseFactory::getFactory()->getConnection();
        $keyword = '%' . $keyword . '%';

        $sql = "";
        if ($column == "") {
            $sql = 'SELECT * FROM nguoi_dung, vai_tro WHERE (ho_lot LIKE :keyword OR ten LIKE :keyword OR ten_vai_tro LIKE :keyword) AND nguoi_dung.ma_vai_tro = vai_tro.ma_vai_tro AND nguoi_dung.trang_thai =1';
        } else if ($column == "ho") {
            $sql = 'SELECT * FROM nguoi_dung, vai_tro WHERE (ho_lot LIKE :keyword) AND nguoi_dung.ma_vai_tro = vai_tro.ma_vai_tro AND nguoi_dung.trang_thai =1';
        } else if ($column == "ten") {
            $sql = 'SELECT * FROM nguoi_dung, vai_tro WHERE ten LIKE :keyword AND nguoi_dung.ma_vai_tro = vai_tro.ma_vai_tro AND nguoi_dung.trang_thai =1';
        } else if ($column == "vaitro") {
            $sql = 'SELECT * FROM nguoi_dung, vai_tro WHERE ten_vai_tro LIKE :keyword AND nguoi_dung.ma_vai_tro = vai_tro.ma_vai_tro AND nguoi_dung.trang_thai =1';
        }
        $sql .= ' ORDER BY ma_nguoi_dung ASC LIMIT :limit OFFSET :offset';
        $query = $database->prepare($sql);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':keyword', $keyword, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetchAll();

        if ($column == "") {
            $sql_ = 'SELECT COUNT(*) FROM nguoi_dung, vai_tro WHERE (ho_lot LIKE :keyword OR ten LIKE :keyword OR ten_vai_tro LIKE :keyword) AND nguoi_dung.ma_vai_tro = vai_tro.ma_vai_tro AND nguoi_dung.trang_thai = 1';
        } else if ($column == "ho") {
            $sql_ = 'SELECT COUNT(*) FROM nguoi_dung, vai_tro WHERE ho_lot LIKE :keyword AND nguoi_dung.ma_vai_tro = vai_tro.ma_vai_tro AND  nguoi_dung.trang_thai = 1';
        } else if ($column == "ten") {
            $sql_ = 'SELECT COUNT(*) FROM nguoi_dung, vai_tro WHERE ten LIKE :keyword AND nguoi_dung.ma_vai_tro = vai_tro.ma_vai_tro AND  nguoi_dung.trang_thai = 1';
        } else if ($column == "vaitro") {
            $sql_ = 'SELECT COUNT(*) FROM nguoi_dung, vai_tro WHERE ten_vai_tro LIKE :keyword AND nguoi_dung.ma_vai_tro = vai_tro.ma_vai_tro AND  nguoi_dung.trang_thai = 1';
        }   
        $countQuery = $database->prepare($sql_);
        $countQuery->bindValue(':keyword', $keyword, PDO::PARAM_STR);
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
        $sql = "SELECT * FROM nguoi_dung WHERE trang_thai = 1";
        $query = $database->prepare($sql);
        $query->execute();
        $data = array();
        if ($data = $query->fetchAll(PDO::FETCH_ASSOC)) {
            return $data;
        }
        return $data;
    }
    public static function updateRole($ma_nguoi_dung, $role)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("UPDATE nguoi_dung SET ma_vai_tro = :mavaitro WHERE ma_nguoi_dung = :manguoidung AND trang_thai =1");
        $query->execute([':mavaitro' => $role, ':manguoidung' => $ma_nguoi_dung]);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }
}
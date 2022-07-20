<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class PhanQuyenModel
{

    public static function getOneByUserName($username)
    {
    }
    public static function add()
    {
    }
    public static function update()
    {
    }
    public static function delete()
    {
    }
    public static function getList()
    {
    }
    public static function getListRole()
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT * FROM vai_tro";
        $query = $database->prepare($sql);
        $query->execute();
         if ($data = $query->fetchAll()) {
            return $data;
        }
        return null;
    }
}

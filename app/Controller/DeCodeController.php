<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Cookie;
use App\Core\Redirect;
use App\Core\Request;
use App\Model\NguoiDungModel;
use App\Model\UserModel;
use App\Core\RSA;
use App\Core\AES;

class DeCodeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('decode/index');
    }
    public function encryptRSA()
    {
        $text = Request::post('text');
        $data = RSA::encryptRSA($text);
        $this->View->renderJSON($data);
    }
    public function decryptRSA()
    {
        $text = Request::post('text');
        $data = RSA::decryptRSA($text);
        $this->View->renderJSON($data);
    }
}

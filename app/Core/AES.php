<?php
namespace App\Core;

class AES
{
    public static $password = 'emssarwin';
    public static function encryptAES($plaintext) {
        $method = "AES-256-CBC";
        $key = hash('sha256', self::$password, true);
        $iv = openssl_random_pseudo_bytes(16);
     
        $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);
     
        return base64_encode($iv . $hash . $ciphertext);
    }
     
    public static function decryptAES($ivHashCiphertext) {
        $ivHashCiphertext=base64_decode($ivHashCiphertext);
        $method = "AES-256-CBC";
        $iv = substr($ivHashCiphertext, 0, 16);
        $hash = substr($ivHashCiphertext, 16, 32);
        $ciphertext = substr($ivHashCiphertext, 48);
        $key = hash('sha256', self::$password, true);
     
        if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;
     
        return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
    }
}
?>
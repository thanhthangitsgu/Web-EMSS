<?php
namespace App\Core;

class RSA
{
    //'531137992816767098689588206552468627329593117727031923199444138200403559860852242739162502265229285668889329486246501015346579337652707239409519978766587351943831270835393219031728127'; //bcsub(bcpow('2', '607'),'1');
    protected static $p = '162259276829213363391578010288127';//bcsub(bcpow('2', '107'),'1'); 
    protected static $q = '6864797660130609714981900799081393217269435300143305409394463459185543183397656052122559640661454554977296311391480858037121987999716643812574028291115057151'; //bcsub(bcpow('2', '521'),'1');
    protected static $b = '170141183460469231731687303715884105727';//bcsub(bcpow('2', '127'),'1'); 
    public static $base10='0123456789';
    public static $baseText='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghiklmnopqrstuvwxyz0123456789| ';
    
    public static function encryptRSA($text){
        $n=bcmul(self::$p, self::$q);
        $num=self::baseToBase($text,self::$baseText,self::$base10);
        $mod=bcpowmod($num,self::$b,$n);
        return self::baseToBase($mod,self::$base10,self::$baseText);
    }

    public static function decryptRSA($text){
        $n=bcmul(self::$p, self::$q);
        $_n=bcmul(bcsub(self::$p,'1'), bcsub(self::$q,'1'));
        $a=self::Euclide_extend($_n,self::$b);
        $num=self::baseToBase($text,self::$baseText,self::$base10);
        $mod=bcpowmod($num,$a,$n);
        return self::baseToBase($mod,self::$base10,self::$baseText);
    }
    
    public static function Euclide_extend($num, $a){
        $n=$num;
        $x2='1'; $x1='0'; $y2='0'; $y1='1';
        while(bccomp($a,'0')==1){
            $q=bcdiv($n,$a);
            $r=bcsub($n,bcmul($q,$a));
            $x=bcsub($x2,bcmul($q,$x1));
            $y=bcsub($y2,bcmul($q,$y1));
            $n=$a;
            $a=$r;
            $x2=$x1;
            $x1=$x;
            $y2=$y1;
            $y1=$y;            
        }
        return bcadd($num,$y2);
    }
     
    //Chuyển đổi từ cơ sở này sang cơ sở khác
    public static function baseToBase ($message, $fromBase, $toBase){
        $from= strlen( $fromBase);
        $b[$from]= $fromBase; 
        $to= strlen( $toBase);
        $b[$to]= $toBase; 
     
        $result= substr( $b[$to], 0, 1);
     
        $f= substr( $b[$to], 1, 1);
     
        $tf= self::digit( $from, $b[$to]);
     
        for ($i=strlen($message)-1; $i>=0; $i--){
            $result= self::badd( $result, self::bmul( self::digit( strpos( $b[$from], substr( $message, $i, 1)), $b[$to]), $f, $b[$to]), $b[$to]);
            $f= self::bmul($f, $tf, $b[$to]);
        }
        return $result; 
    } 
     
    public static function digit( $from, $bto){   
        $to= strlen( $bto);
        $b[$to]= $bto; 
     
        $t[0]= intval( $from);
        $i= 0;
        while ( $t[$i] >= intval( $to)){
            if ( !isset( $t[$i+1])){ 
                $t[$i+1]= 0;
            }
            while ( $t[$i] >= intval( $to)){
                $t[$i]= $t[$i] - intval( $to);
                $t[$i+1]++;
            }
            $i++;
        }
     
        $res= '';
        for ( $i=count( $t)-1; $i>=0; $i--){ 
            $res.= substr( $b[$to], $t[$i], 1);
        }
        return $res;
    }   
    
    // Cộng $n1 với $n2
    public static function badd( $n1, $n2, $nbase){
        $base= strlen( $nbase);
        $b[$base]= $nbase; 
     
        while ( strlen( $n1) < strlen( $n2)){
            $n1= substr( $b[$base], 0, 1) . $n1;
        }
        while ( strlen( $n1) > strlen( $n2)){
            $n2= substr( $b[$base], 0, 1) . $n2;
        }
        $n1= substr( $b[$base], 0, 1) . $n1;    
        $n2= substr( $b[$base], 0, 1) . $n2;
        $m1= array();
        for ( $i=0; $i<strlen( $n1); $i++){
            $m1[$i]= strpos( $b[$base], substr( $n1, (strlen( $n1)-$i-1), 1));
        }   
        $res= array();
        $m2= array();
        for ($i=0; $i<strlen( $n1); $i++){
            $m2[$i]= strpos( $b[$base], substr( $n2, (strlen( $n1)-$i-1), 1));
            $res[$i]= 0;
        }           
        for ($i=0; $i<strlen( $n1)  ; $i++){
            $res[$i]= $m1[$i] + $m2[$i] + $res[$i];
            if ($res[$i] >= $base){
                $res[$i]= $res[$i] - $base;
                $res[$i+1]++;
            }
        }
        $o= '';
        for ($i=0; $i<strlen( $n1); $i++){
            $o= substr( $b[$base], $res[$i], 1).$o;
        }   
        $t= false;
        $o= '';
        for ($i=strlen( $n1)-1; $i>=0; $i--){
            if ($res[$i] > 0 || $t){    
                $o.= substr( $b[$base], $res[$i], 1);
                $t= true;
            }
        }
        return $o;
    }
    
    //Nhân $n1 với $n2
    public static function bmul( $n1, $n2, $nbase){
        $base= strlen( $nbase);
        $b[$base]= $nbase; 
     
        $m1= array();
        for ($i=0; $i<strlen( $n1); $i++){
            $m1[$i]= strpos( $b[$base], substr($n1, (strlen( $n1)-$i-1), 1));
        }   
        $m2= array();
        for ($i=0; $i<strlen( $n2); $i++){
            $m2[$i]= strpos( $b[$base], substr($n2, (strlen( $n2)-$i-1), 1));
        }           
        $res= array();
        for ($i=0; $i<strlen( $n1)+strlen( $n2)+2; $i++){
            $res[$i]= 0;
        }
        for ($i=0; $i<strlen( $n1)  ; $i++){
            for ($j=0; $j<strlen( $n2)  ; $j++){
                $res[$i+$j]= ($m1[$i] * $m2[$j]) + $res[$i+$j];
                while ( $res[$i+$j] >= $base){
                    $res[$i+$j]= $res[$i+$j] - $base;
                    $res[$i+$j+1]++;
                }
            }
        }
        $t= false;
        $o= '';
        for ($i=count( $res)-1; $i>=0; $i--){
            if ($res[$i]>0 || $t){  
                $o.= substr( $b[$base], $res[$i], 1);
                $t= true;
            }
        }
        return $o;
    }

}
?>
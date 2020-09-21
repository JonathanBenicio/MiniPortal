<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class Adm extends Model
{
    use HasFactory;

    protected $table = 'adm';


    public static function logar(String $email, String $senha)
    {
        # code...

        $adm = self::where([['email',$email], ['senha',$senha]])->first();

         if(!is_object($adm)) return false;



        session(['adm'=> ['email' => $adm->email,'senha' => $adm->senha,]]);

        return $adm;

    }

    public static function check()
    {
        # code...

        $adm = session("adm");

        if(is_null($adm)) return false;

        $logar = self::where([["email",$adm["email"]], ["senha",$adm["senha"]]])->exists();


        return $logar;

    }
}

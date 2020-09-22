<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'senha',
        'status'
    ];

    protected $attributes = ['status' => 'A'];


    public static function logar(String $email, String $senha)
    {
        # code...

        $query = self::where([['email',$email], ['senha',$senha]])->first();


        if(is_null($query)) return false;


        return $query;

    }

    public static function check()
    {
        # code...

        $editor = session("editor");

        if(is_null($editor)) return false;

        $logar = self::where([["email",$editor->email], ["senha",$editor->senha]])->exists();


        return $logar;

    }



    public static function getSession()
    {
        # code...
        return session('editor');

    }

    protected $table = 'editor';

}

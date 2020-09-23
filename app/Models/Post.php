<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao'
    ];

    protected $table = 'post';
    public $timestamps = false;


    public static function listPosts($id)
    {
        # code...

        $query = self::where(['editor_id'=> $id])->get();

        return $query;

    }

    public static function createPost($id, $titulo, $descricao)
    {
        # code...

        $data =[
            'titulo' => $titulo,
            '$descricao' => $descricao,
            'editor_id' => $id
        ];

        self::create($data);
    }
}

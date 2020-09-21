<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Models\Post;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idSession = Editor::getSession()->id;

        $posts = Post::listPosts($idSession);

        return view('edt.home', compact('posts'));

    }


    public function criar(Request $request)
    {
        # code...

        $titulo = $request->titulo;
        $descricao = $request->descricao;


        Post::insert(['titulo'=> $titulo, 'descricao'=>$descricao, 'editor' => Editor::getSession()->id]);

        return view('edt.create-post');
    }

    public function atualizar(Request $request)
    {
        # code...

    }
    public function deleta(Request $request)
    {
        # code...

        Post::where(['id' => $request->id])->delete();

        $request->session()->flash('mensagem', 'Post deleltado com sucesso');

        return redirect('/edt');

    }






}

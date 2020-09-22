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

    public function getAtualizar(Request $request)
    {
        # code...

        $post = Post::where('id', $request->id);

        return view('adm.editar-post', $post);


    }
    public function deleta(Request $request)
    {
        # code...

        Post::destroy($request->id);

        $request->session()->flash('mensagem', 'Post deleltado com sucesso');

        return redirect()->route('edt');

    }






}

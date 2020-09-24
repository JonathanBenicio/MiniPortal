<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function deletar(Request $request)
    {
        # code...

        

        
        Post::where('id',$request->id)->delete();
        $request->session()->flash('mensagem', 'Post deleltado com sucesso');

        return redirect('edt');

    }


    
    public function createEdt(Request $request)
    {
        # code...
        $nome = $request->input('nome');
        $email = $request->input('email');
        $cpf = $request->input('cpf');
        $senha = $request->input('senha');

        if (!empty($nome) && !empty($email) && !empty($cpf) && !empty($senha)) {

            if (Editor::where(['email' => $email, 'cpf' => $cpf])->exists()); {
                $request->session()->flash('mensagem', 'Usuario já cadastrato');
                $mensagem = $request->session()->get('mensagem');
                return view('edt.create-edt', compact('mensagem'));
            };
            $query = Editor::create(['nome' => $nome, 'email' => $email, 'cpf' => $cpf, 'senha' => Hash::make($senha), 'status' => 0]);
            $query->when(true, function ($request) {
                $request->session()->flash('mensagem', 'Cadastro realizado, aguarde o administrador libera acesso!');
                return redirect('/login/edt');
            });
        }


        return view('edt.create-edt');
    }




}

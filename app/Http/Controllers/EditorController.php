<?php

namespace App\Http\Controllers;

use App\Models\Editor;
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
        $idEditor = Editor::getSession();

        $posts = Editor::find($idEditor)->post()->get();


        return view('edt.home', compact('posts'));

    }


    public function create()
    {
        return view('edt.create-edt');        
    }

    public function getAtualizar(Request $request)
    {
        # code...

        $post = Editor::post()::where('id', $request->id);

        return view('adm.editar-post', $post);


    }
    public function deletar(Request $request)
    {
        ;

    }

    public function store(Request $request)
    {
        # code...
        $nome = $request->nome;
        $email = $request->email;
        $cpf = $request->cpf;
        $senha = $request->senha;

        
        if (Editor::where(['email' => $email, 'cpf' => $cpf])->exists()) {
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
}

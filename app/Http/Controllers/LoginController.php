<?php

namespace App\Http\Controllers;

use App\Models\Adm;
use App\Models\Editor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Parser;
use Psy\Util\Json;

class LoginController extends Controller
{
    //

    public function index(Request $request )
    {
        # code...

        if(Editor::check()) return redirect('edt');

        if(Adm::check()) return redirect('adm');

        return redirect('/');
    }





    public function indexAdm(Request $request)
    {
        # code...
        if(Adm::check()) return redirect('adm');

        return view('adm.login');
    }


    public function indexEdt(Request $request)
    {
        # code...
        if(Editor::check()) return redirect('edt');

        $mensagem = $request->session()->get('mensagem');

        return view('edt.login', compact('mensagem'));
    }




    public function logarAdm(Request $request)
    {

        $email = $request->input('email');
        $senha = $request->input('senha');


        if(!empty($email) && !empty($senha)){




            $editor = Adm::logar($email, Hash::make($senha));


            var_dump(json_encode($editor));


            // if(is_object($editor)) return redirect('edt');



        }

    }

    public function logarEdt(Request $request)
    {
        # code...

        $email = $request->input('email');
        $senha = $request->input('senha');

        if(!empty($email) && !empty($senha)){


            $editor = Editor::logar($email, $senha);


            if(is_object($editor)){

                $editor = json_decode($editor);

                $request->session()->put('editor', $editor);
                return redirect('edt');
            }

            $request->session()->flash('mensagem', 'Aguarde liberação do Administrador');

            return redirect('/login/edt');
        }

    }

    public function createEdt(Request $request)
    {
        # code...
        $nome = $request->input('nome');
        $email = $request->input('email');
        $cpf = $request->input('cpf');
        $senha = $request->input('senha');

        if(!empty($nome) && !empty($email) && !empty($cpf) && !empty($senha)){

            Editor::insert(['nome'=>$nome, 'email'=>$email, 'cpf'=>$cpf, 'senha'=>Hash::make($senha), 'status'=>0]);



        $request->session()->flash('mensagem', 'Cadastro realizado, aguarde o administrador libera acesso!');
        return redirect('/login/edt');
        }


        return view('edt.create-edt');
    }

    public function logout(Request $request)
    {
        # code...
        session_reset();
    }

}

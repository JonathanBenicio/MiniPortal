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

    public function index(Request $request)
    {
        # code...

        if (Editor::check()) return redirect('edt');

        if (Adm::check()) return redirect('adm');

        return view('index');
    }





    public function indexAdm(Request $request)
    {
        # code...
        if (Adm::check()) return redirect('adm');

        return view('adm.login');
    }


    public function indexEdt(Request $request)
    {
        # code...
        if (Editor::check()) return redirect('edt');

        $mensagem = $request->session()->get('mensagem');

        return view('edt.login', compact('mensagem'));
    }




    public function logarAdm(Request $request)
    {

        $email = $request->input('email');
        $senha = $request->input('senha');


        if (!empty($email) && !empty($senha)) {
            $adm = Adm::logar($email, Hash::make($senha));
            var_dump(json_encode($adm));
            if (is_object($adm)) return redirect('adm');
        }
    }

    public function logarEdt(Request $request)
    {
        # code...

        $email = $request->input('email');
        $senha = $request->input('senha');

        
        die(Editor::attempt(['email' => $email, 'password' => $senha]));

        if (!empty($email) && !empty($senha)) {


            $editor = json_decode(Editor::logar($email, $senha));

            if (is_object($editor)) {


                $request->session()->put('editor', $editor);
                return redirect('edt');
            }

            is_null($editor) ? $request->session()->flash('mensagem', 'Varefique seu Email ou senha') : $request->session()->flash('mensagem', 'Aguarde liberação do Administrador');

            return redirect('/login/edt');
        }
    }


    public function logout(Request $request)
    {
        # code...
        session_reset();
        redirect('/');
    }
}

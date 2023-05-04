<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

/**
 * Summary of LoginController
 */
class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('site.login');
    }

    public function authLogin(Request $request)
    {
        $rules = [
            'user'      => 'email',
            'password'  => 'required'
        ];

        $messages = [
            'user.required'     => 'O campo usuário (e-mail) é obrigatório',
            'password.required' => 'O campo senha é obrigatório',
            'email'             => 'Insira um email válido'
        ];

        $request->validate($rules, $messages);

        $email = $request->get('user');
        $password = $request->get('password');

        $user = User::where('email', $email)->first();

        if(!$user || password_verify($password, $user->password) === false){

            return redirect()->route('site.login')->with('message', 'Usuário ou senha inválidos!')->with('color', 'danger');
        }

        session_start();
        $_SESSION['nome']   = $user->name;
        $_SESSION['email']  = $user->email;

        return redirect()->route('app.home');

    }

    public function logout()
    {
        session_destroy();
        return redirect()->route('site.index');
    }

}

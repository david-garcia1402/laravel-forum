<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        Auth::logout();
        return view('auth.welcome');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $name       = $request->name;
        $password   = $request->password;
        $email      = $request->email;

        $registros = User::where('name', '=', $name)
                        ->orWhere('email', '=', $email)->count();
        
        if ($registros > 0) { //Já existe um registro 
            Session::flash('hasUser', 'E-mail ou usuário já sendo usado.');
            return redirect()->route('welcome.index');
        } else {
            User::insert([
                'name'      => $name,
                'email'     => $email,
                'password'  => $password
            ]);
    
            Session::flash('registered', 'Cadastro realizado com sucesso!');
            return redirect()->route('welcome.index');
        }

    }

    public function login()
    {
        return view('auth.signin');
    }

    public function verifyLogin(Request $request)
    {
        $name       = $request->name;
        $password   = $request->password;
        $passhash   = Hash::make($password);
        $user       = User::where('name', $name)->first();

        if ($user && Hash::check($user->password, $passhash)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/forum');
        } else {
            Session::flash('wrongLogin', 'Credencias incorretas, registre-se ou tente novamente.');
            return redirect()->route('welcome.index');
        }
    }

    public function logout() 
    {
        if(auth()->check()) {
            Session::flash('logout', 'Você foi deslogado.');
            Auth::logout();
            return redirect('/');
        } else {
            return 'Não tem sessão';
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Exibe o formulário de login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Processa o login
     */
    public function login(Request $request)
    {
        // 1) Validação simples dos campos
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // 2) Busca o usuário pelo e-mail
        $user = User::where('email', $request->email)->first();

        // 3) Se não existir ou a senha estiver errada, volta com erro
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['email' => 'E-mail ou senha inválidos'])
                ->onlyInput('email');
        }

        // 4) Autentica o usuário
        Auth::login($user);

        // 5) Redireciona para a rota protegida (ex: /home)
        return redirect()->intended('home');
    }

    /**
     * Processa o logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}

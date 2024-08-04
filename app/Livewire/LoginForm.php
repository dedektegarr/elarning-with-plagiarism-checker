<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public $username;
    public $password;

    public function authenticate(Request $request)
    {
        $credentials = $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            $user = Auth::user();

            flash('Selamat datang ' . '<b style="text-transform: capitalize;">' . $user->name . '</b>', 'success');
            return redirect()->intended('/');
        }

        flash('Akun tidak ditemukan', 'error');
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}

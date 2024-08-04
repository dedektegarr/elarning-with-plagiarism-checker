<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $username;
    public $gender;
    public $password;

    public function registerUser()
    {
        $validated = $this->validate([
            'name' => 'required|min:1|max:80',
            'username' => 'required|alpha_num:ascii|unique:users',
            'gender' => 'required',
            'password' => 'required|min:6'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = strlen($validated['username']) > 9 ? 'teacher' : 'student';

        $user = User::create($validated);

        if (Auth::loginUsingId($user->user_id, true)) {
            flash('Selamat datang ' . '<b style="text-transform: capitalize;">' . $user->name . '</b>', 'success');

            return redirect()->route('dashboard.index');
        }

        flash('Terjadi kesalahan, coba lagi beberapa saat', 'error');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}

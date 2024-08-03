<?php

namespace App\Livewire;

use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $username;
    public $password;

    public function registerUser()
    {
        dd($this->name, $this->username, $this->password);
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}

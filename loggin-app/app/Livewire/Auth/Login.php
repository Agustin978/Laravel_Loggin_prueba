<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Login extends Component
{
    public $nomb_usr = '';
    public $password = '';

    protected $rules = [
        'nomb_usr' => 'required|string',
        'password' => 'required|string',
    ];

    public function login()
    {
        $this->validate();

        // Forward credentials to Fortify's standard login endpoint
        // Livewire traditionally does its own Login, but taking advantage of 
        // Fortify's Rate Limiting and Setup, we can just let it handle the request natively.
        // The most secure and simple way is simulating a standard form submit 
        // in Fortify. So we simply render a form that POSTs to /login.
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

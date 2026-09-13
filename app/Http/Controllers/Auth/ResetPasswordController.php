<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    // Define the guard to use for the client model
    protected $guard = 'client';

    // Override the broker to use the 'clients' broker
    public function broker()
    {
        return Password::broker('clients');
    }
    public function __construct()
    {
        $this->middleware('guest:client');
    }
    protected $redirectTo = '/';
}

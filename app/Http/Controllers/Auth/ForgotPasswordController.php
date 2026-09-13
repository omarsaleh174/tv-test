<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client');
    }
    protected $guard = 'client';

    public function broker()
    {
        return Password::broker('clients'); // Use the clients broker
    }
    use SendsPasswordResetEmails;
}

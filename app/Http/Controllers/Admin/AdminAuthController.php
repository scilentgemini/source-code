<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminAuthController extends Controller
{
    function login() : RedirectResponse
    {
        return redirect()->route('login');
    }

    function PasswordRequest() : View {
        return view('admin.auth.forgot-password');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as BaseController;

class LoginController extends BaseController
{
    public function create()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $user = User::find(1);

        if ($request->password == config('admin.password')) {
            Auth::login($user);
        }

        return redirect()->intended('/admin');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('pages.root');
    }
}

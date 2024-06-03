<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username == 'admin' && $password == 'admin') {
            return redirect()->route('admin.index');
        }
        return redirect()->back()->withErrors(['error', 'Username or password is incorrect.']);
    }
}
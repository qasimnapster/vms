<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        if (!Auth::id()) {
            return redirect()->route('admin.login');
        }
        
        echo 'logged in';
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $hasAuthenticated = (Auth::attempt($validated));
        
        if ($hasAuthenticated) {
            return redirect()->route('admin.index');
        }
        
        return redirect()->back()->withErrors(['password' => 'Please Insert Valid Credentials']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function login(request $request)
    {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if (Auth::attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']]))
        {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout()
    {
        auth::logout();
        return redirect('/');
    }
    
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required'
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        // Add admin field (always false)
        $incomingFields['admin'] = false;

        $User = User::create($incomingFields);
        Auth::login($User);
        return redirect('/');
            
    }
}

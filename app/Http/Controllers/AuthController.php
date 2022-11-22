<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    function getLogin()
    {
        return view('auth.login');
    }
    function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'exists:users,email'],
            'password' => ['required'],
        ]);
        $user = User::query()->where("email", $request->email)->first();
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Invalid credentials']);
        }
        Auth::login($user, $request->remember);
        if (Auth::user()->role->nomrole == 'manager') {
            return redirect()->intended('admin');
        }
        if (Auth::user()->role->nomrole == 'employe') {
            return redirect()->intended('employe');
        }
        if (Auth::user()->role->nomrole == 'technicien') {
            return redirect()->intended('technicien');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}

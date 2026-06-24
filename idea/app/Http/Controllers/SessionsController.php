<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $atrributes = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255'
        ]);

        if(!Auth::attempt($atrributes)) {
            return back()
                ->withErrors(['password' => 'Invalid credentials'])
                ->withInput();
        }

        request()->session()->regenerate();

        return redirect()->intended('/')->with('success', 'Login complete!');

    }

    public function destroy(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}

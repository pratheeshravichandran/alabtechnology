<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegister() {
        return view('register');
    }
    
    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
    
        Auth::login($user);
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
    
    public function showLogin() {
        return view('login');
    }
    
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
    
        return back()->with('error', 'Invalid credentials');
    }
    
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', 'Logged out successfully.');
}

    public function index()
{
    return view('dashboard');
}

}

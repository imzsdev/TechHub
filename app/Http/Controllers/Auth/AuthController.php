<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show Login Form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Process Login
     */
    public function login(Request $request)
    {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {

        $request->session()->regenerate();

        return redirect()
            ->intended(route('home'))
            ->with('success', 'Welcome back!');
    }

    return back()
        ->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])
        ->onlyInput('email');
    }

    /**
     * Show Register Form
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Process Register
     */
    public function register(Request $request)
    {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'confirmed', 'min:8'],
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    Auth::login($user);

    return redirect()
        ->route('home')
        ->with('success', 'Registration successful! Welcome to TechHub.');
    }

    /**
     * Logout User
     */
    public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()
        ->route('home')
        ->with('success', 'You have been logged out successfully.');
    }
}
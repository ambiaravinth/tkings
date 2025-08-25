<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\User;


class AuthController extends Controller
{
    /**
     * Display a Register Page.
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Display a Save User.
     */
    public function save_register(Request $request)
    {
        try {
            $user = User::create([
                'username' => $request->username,
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'image' => null,
                'mobile' => null,
                'role' => $request->role ?? 'user', // optional input
            ]);

            return redirect()->to('login')->with('success', 'Registered Successfully!');
        } catch (Exception $e) {
            Log::error('Registration Error: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Registered Failed!');
            //throw $e; // Or return something safe
        }
    }

    /**
     * Display a login Page.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Check a login.
     */
    public function loginsubmit(Request $request)
    {

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Login Successful!');
        }else{
            return redirect()->back()->with('danger', 'Invalid Credentials!');
        }
    }

    /**
     * Check a logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('login')->with('success', 'Logged out successfully!');
    }
}

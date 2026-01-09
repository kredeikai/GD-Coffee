<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Proses login ADMIN & SUPERADMIN
     */
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // ❌ CUSTOMER DILARANG
            if ($user->role === 'customer') {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Akses ditolak.',
                ]);
            }

            // ✅ SUPERADMIN
            if ($user->role === 'superadmin') {
                return redirect('/superadmin/dashboard');
            }

            // ✅ ADMIN
            return redirect('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }


    /**
     * Proses login customer
     */
    public function login(Request $request)
    {
        // 1. VALIDATION
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        // 2. ATTEMPT LOGIN
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // 3. REDIRECT BASED ON ROLE
            // Admin
            if ($user->isAdmin()) {
                return redirect('/admin/dashboard');
            }

            // Superadmin
            if ($user->isSuperAdmin()) {
                return redirect('/superadmin/dashboard');
            }

            // Customer
            return redirect()->route('customer.home');
        }

        // 4. FAILED LOGIN
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Proses register customer
     */
    public function register(Request $request)
    {
        // 1. VALIDATION
        $validated = $request->validate([
            'name'                  => ['required', 'string', 'max:100'],
            'email'                 => ['required', 'email', 'unique:users,email'],
            'password'              => ['required', 'min:6', 'confirmed'],
        ]);

        // 2. CREATE USER (DEFAULT ROLE: CUSTOMER)
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'customer',
        ]);

        // 3. AUTO LOGIN
        auth()->login($user);

        // 4. REDIRECT
        return redirect()->route('customer.home')->with('success', 'Registrasi berhasil. Selamat datang!');
    }


    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $user = auth()->user();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect berdasarkan role
        if ($user && ($user->isAdmin() || $user->isSuperAdmin())) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('login');
    }
}

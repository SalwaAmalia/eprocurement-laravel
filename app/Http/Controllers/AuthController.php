<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:vendor,buyer',
        ]);

        $user = new \App\Models\User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->is_approved = false;
        $user->password = bcrypt($validated['password']);
        $user->save();

        auth()->login($user);

        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil. Tunggu persetujuan admin.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Login gagal. Cek kembali email dan password.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function dashboard()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.vendors');
        }

        if ($user->role === 'vendor') {
            return redirect()->route('products.index');
        }

        if ($user->role === 'buyer') {
            return redirect()->route('rfqs.index');
        }

        return redirect('/');
    }

}

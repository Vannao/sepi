<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return redirect('login')->withErrors('Login details are not valid');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' =>  'required|string',
            'terms' => 'required'
        ], [
            'terms.required' => 'You must agree to the terms and conditions.'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        Auth::login($user);

        return redirect()->intended('login');
    }




    public function registerAsAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' =>  'required|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();


        return redirect()->back()->with('success', 'Akun berhasil di daftarkan!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }


    public function tampilPengguna()
    {

        $pengguna = User::paginate(5);

        return view('Super-Admin.manage-pengguna', ['pengguna' => $pengguna]);
    }
}

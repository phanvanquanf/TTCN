<?php

namespace App\Http\Controllers;

use App\Http\Requests\Accounts\LoginRequest;
use App\Http\Requests\Accounts\RegisterRequest;
use App\Models\Accounts;
use App\Models\Client\Patients;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        // Tạo tài khoản
        $account = Accounts::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => 2,
            'status' => 0,
        ]);

        Patients::create([
            'fullName' => $request->get('fullName'),
            'gender' => $request->get('gender', 0),
            'birthDate' => $request->get('birthDate'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'idCard' => $request->get('idCard'),
            'accountId' => $account->accountId,
            'status' => 0,
            'checkinDate' => now(),
        ]);

        return redirect()->route('login');
    }


    public function login()
    {
        return view("auth.login");
    }

    public function postLogin(LoginRequest $request)
    {
        $credential = $request->only('username', 'password');
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 0 || $user->role == 1) {
                return redirect()->route('admin.home');
            } else if ($user->role == 2) {
                return redirect()->route('home');
            }
        }
        return back()->withErrors([
            'password' => 'Tên đăng nhập hoặc mật khẩu không chính xác',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

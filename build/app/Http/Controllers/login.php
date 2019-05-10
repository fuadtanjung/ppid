<?php

namespace App\Http\Controllers;
use App\Models\Pengelola;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Auth;

class login extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $kiriman)
    {
        $password = $kiriman->password;
        $username = $kiriman->username;

        $pw1 = Pengguna::where('username', $username)->first();
        $data1 = Pengguna::where('username', $username)->get();
        $pw2 = Pengelola::where('username', $username)->first();
        $data2 = Pengelola::where('username', $username)->get();
//        dd($password,$username);
        if ((Hash::check($password, optional($pw1)->password)) && count($data1) > 0) {
            Auth::guard('pengguna')->LoginUsingId($data1[0]['id_user']);
//            $data = Pengguna::where('username',$username)->first();
            return redirect('profil');

        } elseif ((Hash::check($password, optional($pw2)->password)) && count($data2) > 0) {
            Auth::guard('users')->LoginUsingId($data2[0]['id_pengelola']);
//            $data = Pengelola::where('username',$username)->first();
            return redirect('dashboard');
        } else {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ])->redirectTo('/auth/login');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('users')->check()){
            Auth::guard('users')->logout();
        }
        elseif (Auth::guard('pengguna')->check()){
            Auth::guard('pengguna')->logout();
        }

        return redirect()->route('login');
    }
}

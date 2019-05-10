<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function redirect(Request $request)
    {
        if (\Auth::user()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login');
        }
    }
}

<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view("login.login.login");
    }
    public function registration()
    {
        return view("login.login.registration");
    }

    public function registrationForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|regex:/\+?(88)?0?1[2-9][0-9]{8}\b/',
            'password' => 'required|min:6|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
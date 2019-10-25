<?php

namespace App\Http\Controllers\Login;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\RegistrationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showRegistrationForm()
    {
        return view("front.login.registration");
    }

    public function registration(Request $request)
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
        else {
            $user = new User();
            $user->saveUserInfo($user, $request);
            
            Mail::to($user->email)->queue(new RegistrationEmail($user));

            $this->setSuccessMessage("Please check your email to active your account");
            return redirect()->back();
        }
    }

    public function userEmailVerification($token)
    {
        $user = User::where("email_verification_token", $token)->first();

        if($user)
        {
            $user->update([
                "email_verified_at" => Carbon::now(),
                "email_verification_token" => "",
            ]);
            $this->setSuccessMessage("Your account activated. Please login");
            return redirect("/login");
        }
        else {
            $this->setErrorMessage("Invalid token");
            return redirect("/login");
        }
    }

    public function showLoginForm()
    {
        return view("front.login.login");
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        else {
            $credentials = $request->only(['email', 'password']);
            
            if (Auth::attempt($credentials)) {

                if (Auth::user()->email_verification_token == null && Auth::user()->email_verified_at != null) {
                    return redirect()->intended(route('/'));
                }

                else {
                    $this->setErrorMessage("Your account is not active. Please check your email to active");
                    return redirect()->back();
                }
            }
            else {
                $this->setErrorMessage("Email or Password is worng. Please try again");
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }

    
    // Admin-----------------------------------------------------

    public function showAdminLoginForm()
    {
        return view("admin.login.login");
    }

    public function adminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        else {
            $credentials = $request->only(['email', 'password']);
            
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect('/admin/dashboard');
            }
            else {
                $this->setErrorMessage("Email or Password is worng. Please try again");
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }

    public function admniLogout()
    {
        Auth::guard('admin')->logout();
        return redirect("/admin/login");
    }

    // Socialite----------------------------------------------------------------------

    public function redirectToProvider($socialite)
    {
        return Socialite::driver($socialite)->redirect();
    }

    public function handleProviderCallback($socialite)
    {
        $socialUser = Socialite::driver($socialite)->stateless()->user();

        $DBuser = User::where("email", $socialUser->getEmail())->first();
        if ($DBuser) {
            Auth::login($DBuser);
        }
        else {
            $user = new User();
            $user->name = $socialUser->getName();
            $user->email = $socialUser->getEmail();
            $user->password = Hash::make(123456);
            $user->save();

            Auth::login($user);
        }
        return redirect()->intended(route('/'));
        
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $key = $request->session()->get('key');

            if($key !== null) {
                $request->session()->regenerate();
            } else {
                $request->session()->start();

            }


            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

//        $config = [
//            'email' => ['required'],
//            'password' => ['required']
//        ];
//
//        $validator = Validator::make($request->all(), $config);
//
//        if($validator->fails()) {
//            return back()->withErrors($validator)
//                ->withInput();
//        } else {
//            $userdata = array (
//                'email' => $request->email,
//                'password' => $request->password
//            );
//
//            If (Auth::attempt ($userdata, true)) {
//                return Redirect::to('/');
//            } else {
//                return Redirect::to('/')
//                    ->withErrors('Incorrect username/password');
//            }
//
//        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

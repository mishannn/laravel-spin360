<?php

namespace App\Http\Controllers;

use App\Helpers\UploadHelper;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Validator;

class LoginController extends Controller {
    public function __construct() {
        //
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginForm() {
        return view('login');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function loginAction(Request $request) {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, true)) {
            return redirect()->route('admin.upload');
        }

        $errors = new MessageBag();
        $errors->add('login_error', __('Wrong username or password!'));

        return redirect()->route('login')->withErrors($errors);
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }
}

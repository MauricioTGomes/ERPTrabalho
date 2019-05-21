<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	 */

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}

//    public function authenticate(Request $request)
//    {
//        try {
//            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
//                return redirect()->route('index');
//            }
//        } catch (\Exception $e) {
//            return redirect()->route('auth.login')->with('erro', "Erro ao fazer login." . "\n" . $e->getMessage())->withInput();
//        }
//    }
}

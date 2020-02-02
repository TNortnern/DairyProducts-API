<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function signin(Request $request)
    {
        // if not logged in
        if (!Auth::check()) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
            ]);
            $user = User::where('email', '=', $request->email)->first();
            // if email exists
            if ($user) {
                $password = Hash::check($request->password, $user->password);
                if ($password) {
                    Auth::login($user);
                    return response()->json($user->only(['id', 'name', 'email', 'is_authorized', 'auth_lvl']), 200);
                }
            }
            if (!$user || !$password) {
                return response()->json('invalid', 200);
            } else {
                // will be used to redirect if a user is already logged in
                return response()->json('LoggedIn', 200);
            }
        }
    }
}

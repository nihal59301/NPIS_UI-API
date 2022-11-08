<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Send the response after the user was authenticated.
     * Remove the other sessions of this user.
     *
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $rules = ['Captcha' => 'required|captcha'];
        $validator = validator()->make(request()->all(), $rules);        
        if ($validator->fails()) {
            $this->guard()->logout();

            $request->session()->invalidate();

            throw ValidationException::withMessages([
                'Captcha' => ['Invalid Captcha'],
            ]);       
        }else {            
            $firstTime = Auth::user()->first_time;
            
            if($firstTime) {                
                return redirect()->route('first.reset');
            }else {
                $request->session()->regenerate();

                $this->clearLoginAttempts($request);

                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'user' => $this->guard()->user(),
                    ]);
                }

                return $this->authenticated($request, $this->guard()->user())
                    ?: redirect()->intended($this->redirectPath());
            }
            
        }
        
    }
}

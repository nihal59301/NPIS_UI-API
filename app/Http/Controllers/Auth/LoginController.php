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
        // $rules = ['Captcha' => 'required|captcha'];
        // $validator = validator()->make(request()->all(), $rules);        
        // if ($validator->fails()) {
        //     $this->guard()->logout();

        //     $request->session()->invalidate();

        //     throw ValidationException::withMessages([
        //         'Captcha' => ['Invalid Captcha'],
        //     ]);       
        // }else {            
            $firstTime = Auth::user()->first_time;
            
            if($firstTime) {                
                return redirect()->route('first.reset');
            }else {
                $token = $request->user()->createToken('user_token_' . Auth::user()->id);
                $request->session()->regenerate();

                $this->clearLoginAttempts($request);

                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'user' => $this->guard()->user(),
                    ]);
                }

                // foreach (Auth::user()->tokens as $token) {
                //     //
                //     dump($token);
                // }
                // dd('done');
                return $this->authenticated($request, $this->guard()->user())
                    ?: redirect()->intended($this->redirectPath());
            }
            
        //}
        
    }

        /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {        
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

     /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        //return 'email';
        $field = (filter_var(request()->email, FILTER_VALIDATE_EMAIL) || !request()->email) ? 'email' : 'no_ic';
        request()->merge([$field => request()->email]);
        return $field;
    }
}

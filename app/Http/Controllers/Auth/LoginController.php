<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\LoginSession;

use Illuminate\Http\Request;

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
        protected function redirectTo(){
            if(Auth()->user()->userType=='admin'){
                return route('admin.dashboard');
            }
            elseif(Auth()->user()->userType=='editor'){
                return route('editor.dashboard');
            }
            elseif(Auth()->user()->userType=='user'){
                return route('user.home');
            }
        }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        


        $input = $request->all();

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])) ){

            /* Input session details to the table */

            $session  = new LoginSession();
            $clientIP = \Request::getClientIp(true);
            $session->email = $request->email;
            $session->last_login_ip = $request->getClientIp(true);

            $session->save();

            if(auth()->user()->userType=='admin'){
                return redirect()->route('admin.dashboard');
            }
            elseif(auth()->user()->userType=='editor'){
                return redirect()->route('editor.dashboard');
            }
        }
        else{
            return redirect()->route('login')->with('error', 'Email and Password are wrong.');
        }
    }
}

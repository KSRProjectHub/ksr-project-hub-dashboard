<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\UserType;
use App\Models\LoginSession;
use App\Models\SessionModel;
use Browser;

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
            if(Auth::user()->role_id==1){
                return redirect()->route('admin.dashboard');
            }
            elseif(auth()->user()->role_id== 2){
                return route('editor.dashboard');
            }
            elseif(auth()->user()->role_id==3){
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
            $session->user_id = auth()->user()->id;
            $session->email = $request->email;
            $session->last_login_ip = $request->getClientIp(true);
            $session->device = Browser::deviceType();
            $session->browser = Browser::browserName();
            $session->operating_system = Browser::platformName();

            $session->save();

            $newSession = SessionModel::all();

            $newSession;

            //Session::push('input', [
            //    'user_id'=>auth()->user()->id,

            //]);
            //dd(auth()->user()->role_id);

            if(auth()->user()->role_id == 1){
                return redirect()->route('admin.dashboard');
            }
            elseif(auth()->user()->role_id == 2){
                return redirect()->route('editor.dashboard');
            }elseif(Auth()->user()->role_id == 3){
                return route('users.home');
            }
        }
        else{
            return redirect()->route('login')->with('error', 'Email and Password are wrong.');
        }
    }
}

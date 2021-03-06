<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:5'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'dob' => ['required','date','date_format:Y-m-d'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:1'],
            'nic' => ['required', 'string', 'max:12', 'regex:/^^([0-9]{9}[x|X|v|V]|[0-9]{12})$/', 'unique:users'],
            'marital_status' => ['required', 'string', 'max:10'],
            'contactNo' => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'title' => $data['title'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'nic' => $data['nic'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'role_id' =>1,
            'contactNo' => $data['contactNo'],
            'marital_status' => $data['marital_status'],
            'password' => Hash::make($data['password']),
        ]);

        Session::push('user', [
            'fname' => $data['fname'],
            'email' => $data['email'],
        ]);

        return $user;
    }
}

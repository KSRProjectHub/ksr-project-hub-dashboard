<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = DB::table('users')->count();
        $userCount = UserType::count();
        $userTypes=UserType::all();
        
        return view('home', compact('count', 'userCount', 'userTypes'));
    }

    public function adminDashboard()
    {
        $count = DB::table('users')->count();
        $userCount = UserType::count();
        $userTypes=UserType::all();
        
        return view('admin/dashboard', compact('count', 'userCount', 'userTypes'));
    }

    public function editorDashboard()
    {
        $count = DB::table('users')->count();
        $userCount = UserType::count();
        $userTypes=UserType::all();
        
        return view('editor/dashboard', compact('count', 'userCount', 'userTypes'));
    }

    public function users()
    {
        return view('users');
    }

    public function updatePassword(Request $request){
        # Validation
        $request->validate([
            'oldPassword'=> 'required',
            'new_password'=> 'required|confirmed'
        ]);

         $new_password= $request->new_password;

        # Match the old password

        if(!Hash::check($request->oldPassword, Auth()->user()->password)){
            return back()->with('error','Old password does not match!!');
        }
        elseif(Hash::check($request->new_password, Auth()->user()->password)){
            return back()->with('same_password','New Password cannot be the same as old password!!');
        } 
        # Update new password
        User::whereId(auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);

        return back()->with('update_password', 'Password Updated.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    //Setting-up functions for administrators
    //Users and User Types
    public function adminDashboard()
    {
        $count = User::count();
        
        //$mytime = Carbon::now();
         
        return view('admin/dashboard', compact('count'));
    }

    public function viewUsersAsGrid(){

        $userCount = User::count();
        $user = User::paginate(5);

        return view('admin/usersGrid', compact('userCount', 'user'));
    }
    //Search//

    public function search(Request $request){
        $search = $request->input('qry');
        //$search_text = $_GET[''];
        //$user = User::where('name', 'LIKE', '%'.$search_text.'%')->with('userType')->get();

        $user = User::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('userType', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->get();
        
        $userTypeCount = UserType::count();
        $userCount = User::count();
        $uTypes = UserType::orderBy('userType', 'ASC')->get();

        return view('admin.search', compact('user', 'userTypeCount', 'userCount', 'uTypes'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings(){
        return view('admin.settings');
    }

    public function updatePassword(Request $request){
        # Validation
        $request->validate([
            'oldPassword'=> 'required',
            'newPassword'=> 'required|confirmed'
        ]);


        # Match the old password

        if(!Hash::check($request->oldPassword, Auth()->user()->password)){
            dd("Old password does not match!!");
        }
        dd($request->all());
        # Update new password
    }

    //------ Start User Crud -------//
    //public function users()
    //{
    //    return view('admin/users');
    //}
    //Insert User-> RegisterController
    //View Users
    public function getUsers(){
        $uTypes = UserType::orderBy('userType', 'ASC')->get();
        $user = User::paginate(5);
        $userTypeCount = UserType::count();
        $userCount = User::count();

        return view('admin.users', compact('uTypes', 'user', 'userTypeCount', 'userCount'));
    }

    //Retrieve user for edit
    public function editUser($id)
    {
        $user = User::find($id);
        $uTypes = UserType::all();
        return view('users/editUser', compact('user', 'uTypes'));
    }

    //Update User
    public function updateUser(Request $request)
    {
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->userType = $request->userType;
        $user->nic = $request->nic;
        $user->email = $request->email;

        $user->save();
        return back()->with('user_updated', 'User updated successfully!');
    }
    
    //Remove User
    public function deleteUser($id){
        User::where('id', $id)->delete();
        return back()->with('user_removed', 'User removed successfully!');
    }
    //------ End User Crud -------//

    //------ Start User type Crud -----//


    //------ Start User type Crud -----//

    //Projects
}

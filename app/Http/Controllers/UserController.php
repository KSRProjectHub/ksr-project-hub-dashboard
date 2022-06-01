<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //------ User Type Crud -------//

    //View all job roles
    public function viewUserTypes(){
        $uTypes=UserType::all();
        $userTypeCount = UserType::count();
        return view('admin.userType', compact('uTypes', 'userTypeCount'));
    }

    //Insert User Type
    public function createUserType(Request $req){
        $this->validate($req,[
            'userType'=> 'required'
        ]);
        
        $userType = new UserType();
        $userType->userType =  Str::lower($req->userType);
        $userType->save();
        return back()->with('user_type_added', 'User Type added successfully!');
    }

    //View User Types
    public function getUserType(){
        $uTypes = UserType::orderBy('userType', 'ASC')->get();
        $user = User::orderBy('id', 'DESC')->get();
        $userTypeCount = UserType::count();
        $userCount = User::count();

        return view('admin.userType', compact('uTypes', 'user', 'userTypeCount', 'userCount'));
    }

    //Update user type
    public function editUserType($id){
        $userType = UserType::find($id);

        return view('admin.userType', compact('userType'));
    }

    public function updateUserType(Request $req){
        $userType = UserType::find($req->id);
        
        $userType->userType = Str::lower($req->userType);
        $userType->save();
    
        return back()->with('user_type_updated', 'User Type updated successfully!');
    }

    //Delete User types
    public function deleteUserType($id){
        UserType::where('id', $id)->delete();
        return back()->with('user_type_removed', 'User Type removed successfully!');
    }
    //------ End User Type Crud -------//

    //------ Start User Crud -------//
    //Insert User-> RegisterController
    //View Users
    public function getUsers(){
        $uTypes = UserType::orderBy('userType', 'ASC')->get();
        $user = User::paginate(5);
        $userTypeCount = UserType::count();
        $userCount = User::count();

        return view('users.users', compact('uTypes', 'user', 'userTypeCount', 'userCount'));
    }

    //Retrieve user for edit
    public function editUser($id)
    {
        $user = User::find($id);
        $uTypes = UserType::all();
        return view('users.editUser', compact('user', 'uTypes'));
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

        $this->authorize('delete_user');
        
        $user = User::find($id);

        $path = 'img/user-images/';
        $image = $user->profileimage;

        unlink($path.$image);
        $user->delete();

        //User::where('id', $id)->delete();
        return back()->with('user_removed', 'User removed successfully!');
    }

    //------ End User Crud -------//

}

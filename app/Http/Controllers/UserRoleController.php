<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserType;

class UserRoleController extends Controller
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use App\Models\LoginSession;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

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

    //-- Get Login Details --//
    public function viewLogginSessions(){

        $userLogin = LoginSession::paginate(10);

        return view('admin.loginDetails', compact('userLogin'));
    }

}

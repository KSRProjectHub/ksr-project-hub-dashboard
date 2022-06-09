<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use App\Models\LoginSession;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //------ Start User Crud -------//
    //Insert User-> RegisterController

    public function addUsers(){
        $userRole = UserType::find(Auth::user()->role_id)->userType;
        $userRoles = UserType::get();
        return view('users.addUsers', compact('userRole', 'userRoles'));
    }

    public function addNewUsers(Request $request){

        $this->validate($request,[
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
            'role_id' => ['required', 'int'],
        ]);

        $newUser = new User();
        $newUser->title = $request->title;
        $newUser->fname = $request->fname;
        $newUser->lname = $request->lname;
        $newUser->fullname = $request->fullname;
        $newUser->dob = $request->dob;
        $newUser->email = $request->email;
        $newUser->address = $request->address;
        $newUser->gender = $request->gender;
        $newUser->nic = $request->nic;
        $newUser->marital_status = $request->marital_status;
        $newUser->contactNo = $request->contactNo;
        $newUser->password = Hash::make($request->password);
        $newUser->role_id = $request->role_id;

        $newUser->save();

        $userCount = User::count();
        $user = User::all();


        return view('users.users', compact('userCount', 'user'))->with('add_new_user', 'Successfully added the user.');

    }

    //View Users
    public function getUsers(){
        $uTypes = UserType::orderBy('userType', 'ASC')->get();
        $user = User::select("*")
        //User::join('user_types', 'user_types.id', '=', 'users.role_id')
                ->orderBy('last_seen', 'DESC')
                ->paginate(5);
        //User::select("*")
                    //->whereNotNull('last_seen')  ->orderBy('last_seen', 'DESC') ->paginate(5);
        $userTypeCount = UserType::count();
        $userCount = User::count();
        $userRole = UserType::find(Auth::user()->role_id)->userType;

        return view('users.users', compact('uTypes', 'user', 'userTypeCount', 'userCount', 'userRole'));
    }

    //Retrieve user for edit
    public function editUser($id)
    {
        $user = User::find($id);
        $userRoles = UserType::get();
        $uTypes = UserType::all();
        return view('users.editUser', compact('uTypes','user','userRoles'));
    }

    //Update User
    public function updateUser(Request $request,$id)
    {
        $edituser = User::find($id);

        $edituser->update($request->all());

        $userCount = User::count();
        $user = User::select("*")
                ->orderBy('last_seen', 'DESC')
                ->paginate(5);
        $userRole = UserType::find(Auth::user()->role_id)->userType;

        return view('users.users', compact('user','userRole', 'userCount'))->with('user_updated', 'User updated successfully!');
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
        $userRole = UserType::find(Auth::user()->role_id)->userType;

        return view('admin.loginDetails', compact('userLogin','userRole'));
    }

}

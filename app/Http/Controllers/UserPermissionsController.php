<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Schema;
use DB;

use Illuminate\Http\Request;

class UserPermissionsController extends Controller
{
    public function getUserPermissions(){
        $data = UserType::get();
        $uPermission = UserPermission::join('users', 'users.id', '=', 'user_permissions.user_id')
                        ->join('user_types', 'user_types.id', '=', 'user_permissions.role_id')
                        ->select(DB::raw(('CONCAT_WS(" ",`fname`, `lname`) AS full_name')), 'users.*', 'user_types.*', 'user_permissions.*')
                        //->get() 
                        ->paginate(5);
        $collection = DB::table('user_permissions')
                                    ->join('users', 'users.id', '=', 'user_permissions.user_id')
                                    ->join('user_types', 'user_types.id', '=', 'user_permissions.role_id')
                                    ->select('fname', 'user_permissions.*', 'userType')
                                    ->orderBy('user_permissions.role_id', 'ASC')
                                    ->get();
                                    //->paginate(5);                        

        $usersByRoleId = $collection->groupBy('userType');
        
        return view('admin.addUserPermissions', compact('uPermission', 'usersByRoleId', 'data'));
    }

    public function getUserRoles(){

        $data = UserType::get();
        
        return view('admin.addPerms', compact('data'));
    }

    public function getUsersByUserRoles($id){
        echo json_encode(User::where('role_id', $id)->whereNotIn('users.id', function($query){
                                $query->select('user_permissions.user_id')
                                ->from('user_permissions');
                            })->get());
    }

    public function addUserPermissions(Request $request){

        $request->validate([
            'user_id'=> ['required', 'unique:user_permissions']
        ]);

        $userPermissions = new UserPermission();

        $userPermissions->role_id = $request->role_id;
        $userPermissions->user_id = $request->user_id;
        $userPermissions->add = $request->has('add') ? '1' : '0';
        $userPermissions->update = $request->has('update') ? '1' : '0';
        $userPermissions->delete = $request->has('delete') ? '1' : '0';

        //dd($userPermissions);

        $userPermissions->save();

        return back();
    }

    public function getPermByUserId($id){

        $userPerm = UserPermission::find('id', $id);
        
        return view('admin.getPerms', compact('userPerm'));
    }

    public function updateUserPermission(Request $request){

        $userPerm = UserPermission::find($request->id);

        $userPerm->add = $request->has('add') ? '1' : '0';
        $userPerm->update = $request->has('update') ? '1' : '0';
        $userPerm->delete = $request->has('delete') ? '1' : '0';

        $userPerm->save();
        
        return redirect('admin/user-permissions')->with('update_permission', 'User Permission Updated Successfully..!');
    }

    public function destroy($id){
        UserPermission::destroy($id);

        return back()->with('delete_user_permission', 'Record Deleted..!');
    }
}

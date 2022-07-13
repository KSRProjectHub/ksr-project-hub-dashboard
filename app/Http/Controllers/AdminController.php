<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent;
use Carbon\Carbon;
use App\Models\LoginSession;
use Auth;
use Illuminate\Support\Facades\Session;
use Browser;

class AdminController extends Controller
{
    //Setting-up functions for administrators
    //Users and User Types
    public function adminDashboard()
    {
        $count = User::count();
        $userRole = UserType::find(Auth::user()->role_id)->userType;
        $browser = Browser::detect();

        //$mytime = Carbon::now();
         
        return view('admin.dashboard', compact('count', 'userRole', 'browser'));
    }
    //Search//

    public function search(Request $request){
        $search = $request->input('qry');
        //$search_text = $_GET[''];
        //$user = User::where('name', 'LIKE', '%'.$search_text.'%')->with('userType')->get();

        $user = User::query()
                ->where('fname', 'LIKE', "%{$search}%")
                ->orWhere('lname', 'LIKE', "%{$search}%")
                ->orWhere('fullname', 'LIKE', "%{$search}%")
                ->orWhere('contactNo', 'LIKE', "%{$search}%")
                ->orWhere('userType', 'LIKE', "%{$search}%")
                ->orWhere('nic', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->paginate(5);

        $userTypeCount = UserType::count();
        $userCount = User::count();
        $uTypes = UserType::orderBy('userType', 'ASC')->get();
        $recordCount= $user->count();


        return view('admin.search', compact('user', 'userTypeCount', 'userCount', 'uTypes', 'recordCount')); 
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings(){

        $userloginsessions = LoginSession::where('user_id','=', Auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.settings', compact('userloginsessions'));
    }

    public function getProfile(){
        return view('admin.profile');
    }

    function crop(Request $request){
        $path = 'img/user-images/';
        $file = $request->file('_userAvatarFile');
        $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';

        $upload = $file->move(public_path($path), $new_image_name);

        if(!$upload){
            return response()->json(['status'=>0, 'msg'=>'Something went wrong, try again later']);
            
        }else{

            $user_info=User::where('id','=', Auth()->user()->id)->first();
            $image = $user_info->profileimage;

            if($image != ''){
                unlink($path.$image);
            }
            
            User::where('id','=',  Auth()->user()->id)->update(['profileimage'=>$new_image_name]);

            return response()->json(['status'=>1, 'msg'=>'Image has been cropped successfully.', 'name'=>$new_image_name]);
        }
    }

    public function updateProfile(Request $request){
        $user = User::find(Auth()->user()->id);

        $user->update($request->all());

        $user->save();
        
        return back()->with('profile_updated', 'Your profile updated successfully!');
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

}

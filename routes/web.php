<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth/register');
});

/*Route::get('/add-new', function () {
    return view('auth/register');
});*/

Route::middleware(['middleware'=>'preventBackHistory'])->group(function () {
    Auth::routes();
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin

Route::group([
    'prefix'=>'admin', 
    'middleware'=> ['isAdmin', 'auth', 'preventBackHistory']], 
    function(){
    
    //administrator
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('profile', [App\Http\Controllers\AdminController::class, 'getProfile'])->name('admin.profile');
    Route::post('profile', [App\Http\Controllers\AdminController::class, 'updateProfile'])->name('admin.updateprofile');
    Route::post('crop', [App\Http\Controllers\AdminController::class, 'crop'])->name('admin.crop');
    Route::get('settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('admin.settings');
    Route::post('settings', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update.password');

    //Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'viewProjects'])->name('projects');
    
    //users -> user types crud
    Route::get('jobRoles', [App\Http\Controllers\UserController::class, 'viewUserTypes'])->name('admin.userTypes');
    Route::post('jobRoles', [App\Http\Controllers\UserController::class, 'createUserType'])->name('add.userTypes');
    //Route::get('jobRoles/{id}', [App\Http\Controllers\UserController::class, 'editUserType']);
    Route::post('update-userType', [App\Http\Controllers\UserController::class, 'updateUserType'])->name('update.userTypes');
    Route::get('deleteUserType/{id}', [App\Http\Controllers\UserController::class, 'deleteUserType']);
    
    Route::get('users/search', [App\Http\Controllers\AdminController::class, 'search'])->name('admin.search');
    //users->users crud
    //Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
    Route::get('users', [App\Http\Controllers\UserController::class, 'getUsers'])->name('users');
    Route::get('/users/viewUser/{id}', function ($id) {
        $user = User::find($id);
        return view('users.viewUser', compact('user'));
    });
    Route::get('users/addUser', [App\Http\Controllers\UserController::class, 'addUsers'])->name('users.addUser');
    Route::post('users/addNewUser', [App\Http\Controllers\UserController::class, 'addNewUsers'])->name('users.addnewuser');
    Route::get('users/edituser/{id}', [App\Http\Controllers\UserController::class, 'editUser']);
    Route::post('/update-user/{id}', [App\Http\Controllers\UserController::class, 'updateUser'])->name('update.user');
    Route::get('/deleteUser/{id}', [App\Http\Controllers\UserController::class, 'deleteUser']);
    Route::get('userLoginSessions', [App\Http\Controllers\UserController::class, 'viewLogginSessions'])->name('admin.loginsessions');
    

});

//editor
Route::group([
    'prefix'=>'editor', 
    'middleware'=> ['isEditor', 'auth','preventBackHistory']], 
    function(){
        Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'editorDashboard'])->name('editor.dashboard');
        Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('editors.users');
        //Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'viewProjects'])->name('projects');
 
});

//user
Route::group(['prefix'=>'u', 'middleware'=> ['isUser', 'auth','preventBackHistory']], function(){
    Route::get('/welcome', [App\Http\Controllers\UserController::class, 'home'])->name('users.home');
});


//projects->project category crud
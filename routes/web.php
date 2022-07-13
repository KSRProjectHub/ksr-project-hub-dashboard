<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\ProjCategoryController;
use App\Http\Controllers\TermsAndConditionsController;

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
Route::get('/ksr', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('fe.index');
});

Route::get('/contact', function () {
    return view('fe.contact');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/details', function () {
    return view('fe.userDetails');
});
Route::get('readterms', [App\Http\Controllers\UserController::class, 'getTerms'])->name('get.userterms');
/*Route::get('/add-new', function () {
    return view('auth/register');
});*/

Route::middleware(['middleware'=>'preventBackHistory'])->group(function () {
    Auth::routes();
});

Route::resource('userdetails', App\Http\Controllers\UserDetailsController::class);

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
    Route::get('jobRoles', [App\Http\Controllers\UserRoleController::class, 'viewUserTypes'])->name('admin.userTypes');
    Route::post('jobRoles', [App\Http\Controllers\UserRoleController::class, 'createUserType'])->name('add.userTypes');
    //Route::get('jobRoles/{id}', [App\Http\Controllers\UserController::class, 'editUserType']);
    Route::post('update-userType', [App\Http\Controllers\UserRoleController::class, 'updateUserType'])->name('update.userTypes');
    Route::get('deleteUserType/{id}', [App\Http\Controllers\UserRoleController::class, 'deleteUserType']);
    
    //User Permissions
    Route::get('add-user-permissions', [App\Http\Controllers\UserPermissionsController::class, 'getUserRoles']);
    Route::get('user-permissions', [App\Http\Controllers\UserPermissionsController::class, 'getUserPermissions'])->name('admin.add-permissions');
    Route::post('users/add', [App\Http\Controllers\UserPermissionsController::class, 'addUserPermissions'])->name('admin.addnewpermissions');
    Route::get('users/getUsersByUserRoles/{id}', [App\Http\Controllers\UserPermissionsController::class, 'getUsersByUserRoles']);
    Route::get('user-permission/{id}', [App\Http\Controllers\UserPermissionsController::class, 'getPermByUserId']);
    Route::post('update-user-permission/{id}', [App\Http\Controllers\UserPermissionsController::class, 'updateUserPermission'])->name('admin.updatePerm');
    Route::get('users/delete/{id}', [App\Http\Controllers\UserPermissionsController::class, 'destroy']);

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

    Route::resource('userterms', TermsAndConditionsController::class);
    Route::post('userterms/upload', [App\Http\Controllers\TermsAndConditionsController::class, 'upload'])->name('upload');
    Route::post('userterms/update/{id}', [App\Http\Controllers\TermsAndConditionsController::class, 'update'])->name('userterms.update');
    Route::get('userterms/delete/{id}', [App\Http\Controllers\TermsAndConditionsController::class, 'destroy']);
});

//editor
Route::group([
    'prefix'=>'editor', 
    'middleware'=> ['isEditor', 'auth','preventBackHistory']], 
    function(){
        Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'editorDashboard'])->name('editor.dashboard');
        Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('editors.users');
        //
});

//Pages can operate by editor and administrator
Route::group([
    'prefix'=>'u',
    'middleware'=> ['auth','preventBackHistory']],
    function (){
        //Topics
        Route::get('/topics', [App\Http\Controllers\TopicsController::class, 'indexFiltering'])->name('get.topics');
        Route::get('/get-topic/{id}', [App\Http\Controllers\TopicsController::class, 'getTopic'])->name('get.topic');
        //Route::get('/topic', [App\Http\Controllers\TopicsController::class, 'indexFiltering']);
        Route::post('/update-topic/{id}', [App\Http\Controllers\TopicsController::class, 'update'])->name('update.topic');
        Route::post('/add-topics', [App\Http\Controllers\TopicsController::class, 'add'])->name('topics.create');
        Route::get('/delete-topic/{id}', [App\Http\Controllers\TopicsController::class, 'destroy']);
        //Projects
        Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'viewProjects'])->name('projects');
        Route::get('/request-projects', [App\Http\Controllers\UserDetailsController::class, 'index'])->name('requestprojects');

        //Poject Categories
        Route::resource('projcategory', ProjCategoryController::class);
});

//user
Route::group(['prefix'=>'user', 'middleware'=> ['isUser', 'auth','preventBackHistory']], function(){
    Route::get('/welcome', [App\Http\Controllers\UserController::class, 'home'])->name('users.home');
    
});


//projects->project category crud
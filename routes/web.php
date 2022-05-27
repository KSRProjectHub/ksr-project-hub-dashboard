<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Route::get('/admin', function () {
    return view('auth/register');
});

/*Route::get('/add-new', function () {
    return view('auth/register');
});*/

Route::middleware(['middleware'=>'preventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin

Route::group(['prefix'=>'admin', 'middleware'=> ['isAdmin', 'auth', 'preventBackHistory']], function(){
    
    //administrator
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('admin.settings');
    Route::post('settings', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update.password');

    Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'viewProjects'])->name('projects');
    
    //users -> user types crud
    Route::get('users', [App\Http\Controllers\AdminController::class, 'getUsers'])->name('admin.users');
    Route::get('usersGrid', [App\Http\Controllers\AdminController::class, 'viewUsersAsGrid'])->name('admin.usersGrid');
    Route::get('jobRoles', [App\Http\Controllers\UserController::class, 'viewUserTypes'])->name('admin.userTypes');
    Route::post('jobRoles', [App\Http\Controllers\UserController::class, 'createUserType'])->name('add.userTypes');
    //Route::get('jobRoles/{id}', [App\Http\Controllers\UserController::class, 'editUserType']);
    Route::post('update-userType', [App\Http\Controllers\UserController::class, 'updateUserType'])->name('update.userTypes');
    Route::get('deleteUserType/{id}', [App\Http\Controllers\UserController::class, 'deleteUserType']);
    
    Route::get('users/search', [App\Http\Controllers\AdminController::class, 'search'])->name('admin.search');
    //users->users crud
    //Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
    Route::get('/users/editUser/{id}', [App\Http\Controllers\UserController::class, 'editUser']);
    Route::post('update-user', [App\Http\Controllers\UserController::class, 'updateUser'])->name('update.user');
    Route::get('/deleteUser/{id}', [App\Http\Controllers\UserController::class, 'deleteUser']);

});

//editor
Route::group(['prefix'=>'editor', 'middleware'=> ['isEditor', 'auth','preventBackHistory']], function(){
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'editorDashboard'])->name('editor.dashboard');
    Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('editors.users');
    Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'viewProjects'])->name('projects');

    //user roles
    Route::post('/add-user-type', [App\Http\Controllers\UserController::class, 'createUserType'])->name('add.userTypes');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'getUserType'])->name('users');
});

//user






//projects->project category crud
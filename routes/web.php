<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\{
    User,
    Role,
    Permission,
};

Route::get('/', function () {
    // $user = User::whereName('Admin')->with('roles')->first();
    // $user_role = Role::whereName('admin')->first();
    // $user->roles()->attach($user_role);

    // if ($user->hasRole('user')) {
    //     echo 'yes';
    // } else {
    //     echo 'no';
    // }

    // $admin_role = Role::whereName('admin')->with('permission')->first();

    // $admin_role->permission()->attach($view_user_permission);
    // dd($admin_role->toArray());
    // dd($add_user_permission->toArray());


    // $add_user_permission = Permission::where('name', 'add_user')->first();
    // $user_role = Role::whereName('Admin')->with('permission')->first();
    // $user_role->permission()->attach($add_user_permission);

    // dd($user_role->toArray());

    // $user = User::whereName('Admin')->first();
    //     $admin_role = Role::whereName('admin')->first();
    //     $user->roles()->attach($admin_role);


    $user = User::select('id','name', 'email')
        ->with(['roles:id', 'roles.permission:id,name,description'])
        ->get();
    dd($user[0]->roles->flatMap->permission->toArray());
});

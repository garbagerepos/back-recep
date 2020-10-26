<?php

use App\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    /*$user =User::find(1);
    $data = new \App\Post();
    $data->user_id = $user->id;
    $data->title = "thisi is title";
    $data->content = "thisi iscontent ";
    $data->save();*/
/*
    $another = new \App\Comment();
    $another->user_id  = \Illuminate\Support\Facades\Auth::user()->id;
    $another->post_id  = \App\Post::find(1)->id;
    $another->content ="this is my comment ";
    $another->save();*/

    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/new-user', function (){


        $user = User::create([
            'name' => 'Recep Gümüş',
            'email' => 'recep@recep.com',
            'password' => bcrypt('asdasd')
        ]);
        $role = Role::create(['name' => 'Co-Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    });
    Route::get('posts/{id}','PostController@index')->middleware('forTest');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::post('/file/upload','Deneme@fileUpload')->name('fileUpload');
    Route::get('/file/download','Deneme@fileDownload')->name('fileDownload');

});
;

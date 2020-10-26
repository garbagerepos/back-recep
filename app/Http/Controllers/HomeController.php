<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class HomeController extends Controller
{
//    use HasRoles;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        Role::create(['name' => 'writer']);
        /*$role = Role::where('name', 'writer')->first();
        $permission = Permission::create(['name' => 'create post']);
        $role->givePermissionTo($permission);*//*
      auth()->user()->givePermissionTo('edit post');
        auth()->user()->assignRole('writer');*/
        $user = User::find(1);
        return view('home');
    }
}

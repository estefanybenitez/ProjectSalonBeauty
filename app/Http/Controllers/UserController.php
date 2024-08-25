<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::select(
            "users.id_user",
            "users.name",
            "users.email",
            "users.fk_role",
            
            "roles.id_role",
            "roles.role_name as role",
            
        )->join("roles", "roles.id_role", "=", "users.fk_role")->get();

        return view('/user/UserShow')->with(['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        $roles = Role::all();

        return view('/user/UserCreate')
        ->with([
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'name'=> 'required',
            'email'=> 'required',
            'fk_role'=> 'required',
        ]);
        
        // Set a default temporary password
        $data['password'] = bcrypt('FirstPassword2023');
        
        // save data
        User::create($data);
            
        return redirect('/user/show');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_user)
    {
        //
        $user = User::select(
            "users.id_user",
            "users.name",
            "users.email",
            "users.fk_role",
            
        )
        ->join("roles", "roles.id_role", "=", "users.fk_role")
        ->find($id_user);
        
        // $user = User::all();
        $roles = Role::all();

        return view('/user/UserUpdate')
        ->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $users)
    {
        //
        $data = request()->validate([
            'name'=> 'required',
            'email'=> 'required',
            'fk_role'=> 'required',
        ]);
        $users->name=$data['name'];
        $users->email=$data['email'];
        $users->fk_role=$data['fk_role'];

        $users->updated_at = now();
        $users->save();

        return redirect('/user/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::destroy($id);
        return response()->json(array('res' => true));
    }
}
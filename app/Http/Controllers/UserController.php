<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'permission:manage user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $roles = $request->input('roleUser');

        //dd($roles);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        if($user->exists) {
            $user->assignRole($roles);
            return redirect()->route('user.index');
        }else{
            abort(500, 'insert failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::find($user->id);
        $roles = $user->getRoleNames();
        return view('user.show', ['user' => $user, 'roles'=> $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::find($user->id);
        $roles = Role::all();
        return view('user.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $roles = $request->input('roleUser');

        $user = User::find($user->id);

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        if($user->save()) {
            $user->syncRoles($roles);
            return redirect()->route('user.index');
        }else{
            abort(500, 'edit failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete())
        {
            return redirect()->route('user.index');
        }else{
            abort(500, 'delete failed');
        }
    }
}

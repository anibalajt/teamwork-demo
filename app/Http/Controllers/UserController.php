<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(UserStoreRequest $request)
    {
        $validatedInput = $request->all();
        $validatedInput['password'] = Hash::make($validatedInput['password']);

        $user = User::create($validatedInput);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','successfully created a user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function show($id)
    {
        $user = User::find($id);
        $role = Role::all();
        $permission = Permission::all();

        return view('users.show', compact('user', 'role' ,'permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $validatedInput = $request->all();

        if(!empty($validatedInput['password'])) {
            $validatedInput['password'] = Hash::make($validatedInput['password']);
        } else {
            $validatedInput = Arr::except($validatedInput, array('password'));
        }

        $user = User::find($id);
        $user->update($validatedInput);

        DB::table('model_has_roles')
            ->where('model_id', $id)
            ->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'successfully updated a user. ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}

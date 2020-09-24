<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Container\BindingResolutionException;
use App\User;
use App\Role;
use Gate;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-users')){
            return \redirect(url('admin/users'));
        }
        $users = User::whereId($id)->firstOrFail();
        $roles = Role::all();

        return view('admin.users.edit')->with([
            'users' => $users,
            'roles' => $roles
            ]);
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::whereId($id)->firstOrFail();
        
        $users->roles()->sync($request->roles);

        $users->name = $request->name;
        $users->email = $request->email;

        if($users->save()){
            $request->session()->flash('success',$users->name.' has been updated successfully');
        }else{
            $request->session()->flash('danger',$users->name.' has not been updated');
        }
        
        return \redirect(url('admin/users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-users')){
            return \redirect(url('admin/users'));
        }
        $users = User::whereId($id)->firstOrFail();
        $users->roles()->detach();

        if($users->delete()){
            $request->session()->flash('success',$users->name.' has been deleted successfully');
        }else{
            $request->session()->flash('danger',$users->name.' has not been deleted');
        }
        
        return \redirect(url('admin/users'));
    }
}

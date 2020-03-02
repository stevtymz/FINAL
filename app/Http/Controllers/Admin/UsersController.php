<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvitationSend;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\Department;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $departments = Department::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles','departments'));
    }

    public function store(StoreUserRequest $request)
    { 
       
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'invitation_token' => substr(md5(rand(0,9).$request->email.time()), 0, 32)]); 
        $user->roles()->sync($request->input('roles', []));
        $user->departments()->sync($request->input('departments', []));
        //Send Invitation Email
        $user->notify(new InvitationSend());
        flash()->success('New Employee has been registered');
        
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $departments = Department::all()->pluck('title', 'id');

        $user->load('roles');

        $user->load('departments');

        return view('admin.users.edit', compact('roles', 'user', 'departments'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->departments()->sync($request->input('departments', []));
         
        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');
        $user->load('departments');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

     /**
     * Restore user account.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user =  User::onlyTrashed()->findOrFail($id);
        $user->restore();
        flash()->success('Account successfully restored');
        return redirect()->route('admin.users.index'); 
    }

    public function restoreUser()
    {
        $user =  User::onlyTrashed()->get();
        return view('admin.users.restore', compact('user')); 
    }
}

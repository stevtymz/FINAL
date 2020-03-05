<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProfileRequest;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Profile;
use App\Salary;
use App\User;
use App\Department;
use App\DepartmentUser;
use Gate;
use Auth;
use Image;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    

    public function index()
    {
        abort_if(Gate::denies('profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profiles = Profile::all();

        $head_of_departments = DepartmentUser::with('department')->get();

        return view('admin.profiles.index', compact('profiles','head_of_departments'));
    }
 
    public function create()
    {
        abort_if(Gate::denies('profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary_scales = Salary::all()->pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        $head =  Department::whereHas('departmentsUsers', function($query) {
            $query->where('id','>=',1);
        })
        ->pluck('title');
 
        $head_of_department =  User::whereHas('departments', function($query) {
            $query->where('id','>=',1);
        })
        ->pluck('name', 'id')->union($head)
        ->prepend(trans('global.pleaseSelect'), '');

        $head_of_departments = DepartmentUser::with('department')->get();

        //appraisers for academic staff
        $head =  User::whereHas('roles', function($query) {
            $query->whereId(3);
        })
        ->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');

        // appraisers for support heads
        $head_of_support =  User::whereHas('roles', function($query) {
            $query->whereId(6);
        })
        ->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');
 


        return view('admin.profiles.create', compact('salary_scales', 'head_of_departments','head','head_of_support'));
    }

    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::create($request->all());
       
        $this->validate($request, [
            'avator' => 'image|mimes:jpeg,png,jpg,gif,svg'
         ]);
        if ($request->hasFile('avator')) {
            $avator = $request->file('avator');
            $filename = time() . '.' . $avator->getClientOriginalExtension();
            Image::make($avator)->resize(300, 300)->save(public_path('/uploads/avators/'.$filename));
            
            $profile->avator = $filename;
            $profile->save(); 

        }
        flash()->success('Your profile has been created');
        return redirect()->route('admin.profiles.index');
    }

    public function edit(Profile $profile, User $user)
    {
        
        if(Auth::id() !== $profile->user_id){
            abort_if(Gate::denies('profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        else{
        $salary_scales = Salary::all()->pluck('job_title', 'id');

        $head_of_departments =  Department::all()->pluck('title', 'id');

        $profile->load('salary_scale', 'head_of_department');

         //appraisers for academic staff
         $head =  User::whereHas('roles', function($query) {
            $query->whereId(3);
        })
        ->pluck('name', 'id');

        // appraisers for support heads
        $head_of_support =  User::whereHas('roles', function($query) {
            $query->whereId(6);
        })
        ->pluck('name', 'id');
 

        return view('admin.profiles.edit', compact('salary_scales', 'head_of_departments', 'profile','head','head_of_support'));
             }
    }

    public function update(UpdateProfileRequest $request, Profile $profile)
    {
       
        $profile->update($request->all());

        if ($request->hasFile('avator')) {
            $avator = $request->file('avator');
            $filename = time() . '.' . $avator->getClientOriginalExtension();
            Image::make($avator)->resize(300, 300)->save(public_path('/uploads/avators/'.$filename));
            
            $profile->avator = $filename;
            $profile->save();

        }
        flash()->success('Your profile has been updated');
        return redirect()->route('admin.profiles.index');
    }

    public function show(Profile $profile)
    {
        abort_if(Gate::denies('profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->load('salary_scale', 'user', 'head_of_department');

        return view('admin.profiles.show', compact('profile'));
    }

    public function destroy(Profile $profile)
    {
        abort_if(Gate::denies('profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->delete();

        return back();
    }

    public function massDestroy(MassDestroyProfileRequest $request)
    {
        Profile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    
}

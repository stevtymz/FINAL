<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerformanceRequest;
use App\Http\Requests\StorePerformanceRequest;
use App\Http\Requests\UpdatePerformanceRequest;
use App\Performance;
use App\Profile;
use App\User;
use Carbon\Carbon; 
use App\Appraisal_period;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Notifications\NotifySenoirstaff;
use App\Notifications\NotifySenoirstaffHead;

class PerformanceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('performance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $performances = Performance::all();
        $dat = Appraisal_period::all();

        return view('admin.performances.index', compact('performances','dat'));
    }

    public function create()
    {
        abort_if(Gate::denies('performance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profiles = Profile::all()->pluck('full_name', 'id');

        return view('admin.performances.create', compact('profiles'));
    }

    public function store(StorePerformanceRequest $request)
    {
        $performance = Performance::create($request->all());
        
        //notifications to the head
        User::find($performance->head_of_department->id)->notify(new NotifySenoirstaffHead($performance));
        flash()->success('Your Evaluation rating and other information has been submitted');
        return redirect()->route('admin.performances.index');
    } 

    public function edit(Performance $performance)
    {
        abort_if(Gate::denies('performance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profiles = Profile::all()->pluck('full_name', 'id');

        $performance->load('profile');
        $head_of_departments =  User::whereHas('roles', function($query) {
            $query->whereId(3);
        })
        ->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');

        return view('admin.performances.edit', compact('profiles', 'performance', 'head_of_departments' ));
    }

    public function update(UpdatePerformanceRequest $request, Performance $performance)
    {
        $performance->update($request->all());
        //notifications to the head
        User::find($performance->user->id)->notify(new NotifySenoirstaff($performance));
        flash()->success('You have successfully evaluated the employee..');
        return redirect()->route('admin.performances.index');
    }

   
    public function show(Performance $performance)
    {   
        
             $performance->load('profile', 'head_of_department'); 

             foreach(auth()->user()->unreadNotifications as $notification) {
                if ($notification->read_at === null) {
                    $notification->read_at = Carbon::now();
                    $notification->save();
                }
            }

             return view('admin.performances.show', compact('performance'));
          
        
    }
    
    public function destroy(Performance $performance)
    {
        abort_if(Gate::denies('performance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $performance->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerformanceRequest $request)
    {
        Performance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

   

}

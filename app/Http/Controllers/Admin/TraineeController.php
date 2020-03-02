<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTraineeRequest;
use App\Http\Requests\StoreTraineeRequest;
use App\Http\Requests\UpdateTraineeRequest;
use App\Trainee;
use App\User;
use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Notifications\NotifyTrainingOwner;

class TraineeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trainee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainees = Trainee::all();

        return view('admin.trainees.index', compact('trainees'));
    }

    public function create()
    {
        abort_if(Gate::denies('trainee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trainees.create', compact('employee_names'));
    }

    public function store(StoreTraineeRequest $request)
    {
        $trainee = Trainee::create($request->all());
        //notifications to the user
        User::find($trainee->employee_name->id)->notify(new NotifyTrainingOwner($trainee));
        return redirect()->route('admin.trainees.index');
    }

    public function edit(Trainee $trainee)
    {
        abort_if(Gate::denies('trainee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trainee->load('employee_name');

        return view('admin.trainees.edit', compact('employee_names', 'trainee'));
    }

    public function update(UpdateTraineeRequest $request, Trainee $trainee)
    {
        $trainee->update($request->all());

        return redirect()->route('admin.trainees.index');
    }

    public function show(Trainee $trainee)
    {
        abort_if(Gate::denies('trainee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainee->load('employee_name');

        foreach(auth()->user()->unreadNotifications as $notification) {
            if ($notification->read_at === null) {
                $notification->read_at = Carbon::now();
                $notification->save();
            }
        }

        return view('admin.trainees.show', compact('trainee'));
    }

    public function destroy(Trainee $trainee)
    {
        abort_if(Gate::denies('trainee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainee->delete();

        return back();
    }

    public function massDestroy(MassDestroyTraineeRequest $request)
    {
        Trainee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

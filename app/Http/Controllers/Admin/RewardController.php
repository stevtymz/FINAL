<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRewardRequest;
use App\Http\Requests\StoreRewardRequest;
use App\Http\Requests\UpdateRewardRequest;
use App\Reward;
use App\User;
use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request; 
use Symfony\Component\HttpFoundation\Response;
use App\Notifications\NotifyRewardOwner;

class RewardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reward_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rewards = Reward::all();

        return view('admin.rewards.index', compact('rewards'));
    }

    public function create()
    {
        abort_if(Gate::denies('reward_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        return view('admin.rewards.create', compact('employee_names'));
    }

    public function store(StoreRewardRequest $request)
    {
        $reward = Reward::create($request->all());
        //notifications to the user
        User::find($reward->employee_name->id)->notify(new NotifyRewardOwner($reward));
        flash()->success('A reward has successfully be sent...');
        return redirect()->route('admin.rewards.index');
    }

    public function edit(Reward $reward)
    {
        abort_if(Gate::denies('reward_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reward->load('employee_name');

        return view('admin.rewards.edit', compact('employee_names', 'reward'));
    }

    public function update(UpdateRewardRequest $request, Reward $reward)
    {
        $reward->update($request->all());

        return redirect()->route('admin.rewards.index');
    }

    public function show(Reward $reward)
    {
        abort_if(Gate::denies('reward_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reward->load('employee_name');

        foreach(auth()->user()->unreadNotifications as $notification) {
            if ($notification->read_at === null) {
                $notification->read_at = Carbon::now();
                $notification->save();
            }
        }

        return view('admin.rewards.show', compact('reward'));
    }

    public function destroy(Reward $reward)
    {
        abort_if(Gate::denies('reward_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reward->delete();

        return back();
    }

    public function massDestroy(MassDestroyRewardRequest $request)
    {
        Reward::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

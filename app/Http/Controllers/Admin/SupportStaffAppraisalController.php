<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupportStaffAppraisalRequest;
use App\Http\Requests\StoreSupportStaffAppraisalRequest;
use App\Http\Requests\UpdateSupportStaffAppraisalRequest;
use App\Profile;
use App\SupportStaffAppraisal;
use App\User;
use Gate;
use Carbon\Carbon;
use App\Appraisal_period;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Notifications\NotifySupportheadOwner;
use App\Notifications\NotifySupportstaff;
class SupportStaffAppraisalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('support_staff_appraisal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supportStaffAppraisals = SupportStaffAppraisal::all();
        $dat = Appraisal_period::all();

        return view('admin.supportStaffAppraisals.index', compact('supportStaffAppraisals','dat'));
    }

    public function create()
    {
        abort_if(Gate::denies('support_staff_appraisal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profiles = Profile::all()->pluck('full_name', 'id');
       
        return view('admin.supportStaffAppraisals.create', compact('profiles'));
    }

    public function store(StoreSupportStaffAppraisalRequest $request)
    {
        $supportStaffAppraisal = SupportStaffAppraisal::create($request->all());
        //notifications to the head
        User::find($supportStaffAppraisal->head_of_department->id)->notify(new NotifySupportheadOwner($supportStaffAppraisal));
        flash()->success('Your Evaluation rating and other information has been submitted');
        return redirect()->route('admin.support-staff-appraisals.index');
    }

    public function edit(SupportStaffAppraisal $supportStaffAppraisal)
    {
        abort_if(Gate::denies('support_staff_appraisal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profiles = Profile::all()->pluck('full_name', 'id');

        $head_of_departments =  User::whereHas('roles', function($query) {
            $query->whereId(6);
        })
        ->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');

        $supportStaffAppraisal->load('profile', 'head_of_department');

        return view('admin.supportStaffAppraisals.edit', compact('profiles', 'head_of_departments', 'supportStaffAppraisal'));
    }

    public function update(UpdateSupportStaffAppraisalRequest $request, SupportStaffAppraisal $supportStaffAppraisal)
    {
        $supportStaffAppraisal->update($request->all());
        //notifications to the employee
        User::find($supportStaffAppraisal->user->id)->notify(new NotifySupportstaff($supportStaffAppraisal));
        flash()->success('You have successfully evaluated the employee..');
        return redirect()->route('admin.support-staff-appraisals.index');
    }

    public function show(SupportStaffAppraisal $supportStaffAppraisal)
    {
        abort_if(Gate::denies('support_staff_appraisal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supportStaffAppraisal->load('profile', 'head_of_department');

        foreach(auth()->user()->unreadNotifications as $notification) {
            if ($notification->read_at === null) {
                $notification->read_at = Carbon::now();
                $notification->save();
            }
        }

        return view('admin.supportStaffAppraisals.show', compact('supportStaffAppraisal'));
    }

    public function destroy(SupportStaffAppraisal $supportStaffAppraisal)
    {
        abort_if(Gate::denies('support_staff_appraisal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supportStaffAppraisal->delete();

        return back();
    }

    public function massDestroy(MassDestroySupportStaffAppraisalRequest $request)
    {
        SupportStaffAppraisal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

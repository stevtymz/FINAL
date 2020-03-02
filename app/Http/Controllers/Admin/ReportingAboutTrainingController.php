<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportingAboutTrainingRequest;
use App\Http\Requests\StoreReportingAboutTrainingRequest;
use App\Http\Requests\UpdateReportingAboutTrainingRequest;
use App\ReportingAboutTraining;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportingAboutTrainingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reporting_about_training_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportingAboutTrainings = ReportingAboutTraining::all();

        return view('admin.reportingAboutTrainings.index', compact('reportingAboutTrainings'));
    }

    public function create()
    {
        abort_if(Gate::denies('reporting_about_training_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportingAboutTrainings.create');
    }

    public function store(StoreReportingAboutTrainingRequest $request)
    {
        $reportingAboutTraining = ReportingAboutTraining::create($request->all());
        flash()->success('Your Training Report has been successfully submitted');
        return redirect()->route('admin.reporting-about-trainings.index');
    }

    public function edit(ReportingAboutTraining $reportingAboutTraining)
    {
        abort_if(Gate::denies('reporting_about_training_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportingAboutTrainings.edit', compact('reportingAboutTraining'));
    }

    public function update(UpdateReportingAboutTrainingRequest $request, ReportingAboutTraining $reportingAboutTraining)
    {
        $reportingAboutTraining->update($request->all());

        return redirect()->route('admin.reporting-about-trainings.index');
    }

    public function show(ReportingAboutTraining $reportingAboutTraining)
    {
        abort_if(Gate::denies('reporting_about_training_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportingAboutTrainings.show', compact('reportingAboutTraining'));
    }

    public function destroy(ReportingAboutTraining $reportingAboutTraining)
    {
        abort_if(Gate::denies('reporting_about_training_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportingAboutTraining->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportingAboutTrainingRequest $request)
    {
        ReportingAboutTraining::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

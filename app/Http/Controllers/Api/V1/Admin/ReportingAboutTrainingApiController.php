<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportingAboutTrainingRequest;
use App\Http\Requests\UpdateReportingAboutTrainingRequest;
use App\Http\Resources\Admin\ReportingAboutTrainingResource;
use App\ReportingAboutTraining;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportingAboutTrainingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reporting_about_training_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportingAboutTrainingResource(ReportingAboutTraining::all());
    }

    public function store(StoreReportingAboutTrainingRequest $request)
    {
        $reportingAboutTraining = ReportingAboutTraining::create($request->all());

        return (new ReportingAboutTrainingResource($reportingAboutTraining))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportingAboutTraining $reportingAboutTraining)
    {
        abort_if(Gate::denies('reporting_about_training_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportingAboutTrainingResource($reportingAboutTraining);
    }

    public function update(UpdateReportingAboutTrainingRequest $request, ReportingAboutTraining $reportingAboutTraining)
    {
        $reportingAboutTraining->update($request->all());

        return (new ReportingAboutTrainingResource($reportingAboutTraining))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportingAboutTraining $reportingAboutTraining)
    {
        abort_if(Gate::denies('reporting_about_training_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportingAboutTraining->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

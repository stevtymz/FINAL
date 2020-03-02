<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportStaffAppraisalRequest;
use App\Http\Requests\UpdateSupportStaffAppraisalRequest;
use App\Http\Resources\Admin\SupportStaffAppraisalResource;
use App\SupportStaffAppraisal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupportStaffAppraisalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('support_staff_appraisal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SupportStaffAppraisalResource(SupportStaffAppraisal::with(['profile', 'head_of_department'])->get());
    }

    public function store(StoreSupportStaffAppraisalRequest $request)
    {
        $supportStaffAppraisal = SupportStaffAppraisal::create($request->all());

        return (new SupportStaffAppraisalResource($supportStaffAppraisal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SupportStaffAppraisal $supportStaffAppraisal)
    {
        abort_if(Gate::denies('support_staff_appraisal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SupportStaffAppraisalResource($supportStaffAppraisal->load(['profile', 'head_of_department']));
    }

    public function update(UpdateSupportStaffAppraisalRequest $request, SupportStaffAppraisal $supportStaffAppraisal)
    {
        $supportStaffAppraisal->update($request->all());

        return (new SupportStaffAppraisalResource($supportStaffAppraisal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SupportStaffAppraisal $supportStaffAppraisal)
    {
        abort_if(Gate::denies('support_staff_appraisal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supportStaffAppraisal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

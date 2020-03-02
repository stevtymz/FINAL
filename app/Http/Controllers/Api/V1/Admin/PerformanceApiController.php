<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerformanceRequest;
use App\Http\Requests\UpdatePerformanceRequest;
use App\Http\Resources\Admin\PerformanceResource;
use App\Performance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerformanceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('performance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerformanceResource(Performance::with(['profile', 'head_of_department'])->get());
    }

    public function store(StorePerformanceRequest $request)
    {
        $performance = Performance::create($request->all());

        return (new PerformanceResource($performance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Performance $performance)
    {
        abort_if(Gate::denies('performance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerformanceResource($performance->load(['profile', 'head_of_department']));
    }

    public function update(UpdatePerformanceRequest $request, Performance $performance)
    {
        $performance->update($request->all());

        return (new PerformanceResource($performance))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Performance $performance)
    {
        abort_if(Gate::denies('performance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $performance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
   
}

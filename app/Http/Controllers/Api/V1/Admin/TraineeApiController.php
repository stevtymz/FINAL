<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTraineeRequest;
use App\Http\Requests\UpdateTraineeRequest;
use App\Http\Resources\Admin\TraineeResource;
use App\Trainee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TraineeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trainee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TraineeResource(Trainee::with(['employee_name'])->get());
    }

    public function store(StoreTraineeRequest $request)
    {
        $trainee = Trainee::create($request->all());

        return (new TraineeResource($trainee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Trainee $trainee)
    {
        abort_if(Gate::denies('trainee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TraineeResource($trainee->load(['employee_name']));
    }

    public function update(UpdateTraineeRequest $request, Trainee $trainee)
    {
        $trainee->update($request->all());

        return (new TraineeResource($trainee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Trainee $trainee)
    {
        abort_if(Gate::denies('trainee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainee->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

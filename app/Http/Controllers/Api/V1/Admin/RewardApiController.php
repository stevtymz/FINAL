<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRewardRequest;
use App\Http\Requests\UpdateRewardRequest;
use App\Http\Resources\Admin\RewardResource;
use App\Reward;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RewardApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reward_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RewardResource(Reward::with(['employee_name'])->get());
    }

    public function store(StoreRewardRequest $request)
    {
        $reward = Reward::create($request->all());

        return (new RewardResource($reward))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Reward $reward)
    {
        abort_if(Gate::denies('reward_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RewardResource($reward->load(['employee_name']));
    }

    public function update(UpdateRewardRequest $request, Reward $reward)
    {
        $reward->update($request->all());

        return (new RewardResource($reward))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Reward $reward)
    {
        abort_if(Gate::denies('reward_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reward->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

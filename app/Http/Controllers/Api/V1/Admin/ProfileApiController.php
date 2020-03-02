<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\Admin\ProfileResource;
use App\Profile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfileResource(Profile::with(['salary_scale', 'user', 'head_of_department'])->get());
    }

    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::create($request->all());

        if ($request->hasFile('avator')) {
            $avator = $request->file('avator');
            $filename = time() . '.' . $avator->getClientOriginalExtension();
            Image::make($avator)->resize(300, 300)->save(public_path('/uploads/avators/'.$filename));
            
            $profile->avator = $filename;
            $profile->save();

        }

        return (new ProfileResource($profile)) 
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Profile $profile)
    {
        abort_if(Gate::denies('profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfileResource($profile->load(['salary_scale', 'user', 'head_of_department']));
    }

    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $profile->update($request->all());

        if ($request->input('profile_image', false)) {
            if (!$profile->profile_image || $request->input('profile_image') !== $profile->profile_image->file_name) {
                $profile->addMedia(storage_path('tmp/uploads/' . $request->input('profile_image')))->toMediaCollection('profile_image');
            }
        } elseif ($profile->profile_image) {
            $profile->profile_image->delete();
        }

        return (new ProfileResource($profile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Profile $profile)
    {
        abort_if(Gate::denies('profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

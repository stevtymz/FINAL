<?php

namespace App\Http\Requests;

use App\Profile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'first_name'        => [
                'required',
            ],
            'last_name'         => [
                'required',
            ],
            'date_of_birth'     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'current_education' => [
                'required',
            ],
            'current_job_title' => [
                'required',
            ],
            'head_of_department_id'        => [
                'required',
            ],
           
            'salary_scale_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}

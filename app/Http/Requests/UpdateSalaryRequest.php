<?php

namespace App\Http\Requests;

use App\Salary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSalaryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('salary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'job_title'    => [
                'required',
            ],
            'salary_scale' => [
                'required',
                'unique:salaries,salary_scale,' . request()->route('salary')->id,
            ],
            'ammount'      => [
                'required',
            ],
            'year'         => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}

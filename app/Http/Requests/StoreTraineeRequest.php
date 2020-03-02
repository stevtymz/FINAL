<?php

namespace App\Http\Requests;

use App\Trainee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTraineeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trainee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'employee_name_id' => [
                'required',
                'integer',
            ],
            'programme_name'   => [
                'required',
            ],
            'venue'            => [
                'required',
            ],
            'time_date'        => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}

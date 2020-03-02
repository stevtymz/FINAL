<?php

namespace App\Http\Requests;

use App\ReportingAboutTraining;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreReportingAboutTrainingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reporting_about_training_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'training'          => [
                'required',
            ],
            'venue'             => [
                'required',
            ],
            'date'              => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'employee_feedback' => [
                'required',
            ],
        ];
    }
}

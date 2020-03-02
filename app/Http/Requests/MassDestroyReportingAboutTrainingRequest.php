<?php

namespace App\Http\Requests;

use App\ReportingAboutTraining;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReportingAboutTrainingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reporting_about_training_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reporting_about_trainings,id',
        ];
    }
}

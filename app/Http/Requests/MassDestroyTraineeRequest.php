<?php

namespace App\Http\Requests;

use App\Trainee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTraineeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trainee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:trainees,id',
        ];
    }
}

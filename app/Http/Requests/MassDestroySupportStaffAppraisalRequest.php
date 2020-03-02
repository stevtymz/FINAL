<?php

namespace App\Http\Requests;

use App\SupportStaffAppraisal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySupportStaffAppraisalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('support_staff_appraisal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:support_staff_appraisals,id',
        ];
    }
}

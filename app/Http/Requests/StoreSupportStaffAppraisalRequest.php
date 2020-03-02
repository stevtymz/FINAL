<?php

namespace App\Http\Requests;

use App\SupportStaffAppraisal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSupportStaffAppraisalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('support_staff_appraisal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'profile_id'            => [
                'required',
                'integer',
            ],

            'emp_rating1'            => [
                'required',
            ],
            'emp_comment1'           => [
                'required',
            ],
            'emp_rating2'            => [
                'required',
            ],
            'emp_comment2'           => [
                'required',
            ],
            'emp_rating3'            => [
                'required',
            ],
            'emp_comment3'           => [
                'required',
            ],
            'emp_rating4'            => [
                'required',
            ],
            'emp_comment4'           => [
                'required',
            ],
            'emp_rating5'            => [
                'required',
            ],
            'emp_comment5'           => [
                'required',
            ],
            'emp_rating6'            => [
                'required',
            ],
            'emp_comment6'           => [
                'required',
            ],
            'emp_rating7'            => [
                'required',
            ],
            'emp_comment7'           => [
                'required',
            ],
            'emp_rating8'            => [
                'required',
            ],
            'emp_comment8'           => [
                'required',
            ],
            'head_of_department_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

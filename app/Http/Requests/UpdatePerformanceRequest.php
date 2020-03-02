<?php

namespace App\Http\Requests;

use App\Performance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePerformanceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('performance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'profile_id'            => [
                'required',
                'integer',
            ],
            'hod_rating1'            => [
                'required',
            ],
            'hod_comment1'           => [
                'required',
            ],
            'hod_rating2'            => [
                'required',
            ],
            'hod_comment2'           => [
                'required',
            ],
            'hod_rating3'            => [
                'required',
            ],
            'hod_comment3'           => [
                'required',
            ],
            'hod_rating4'            => [
                'required',
            ],
            'hod_comment4'           => [
                'required',
            ],
            'hod_rating5'            => [
                'required',
            ],
            'hod_comment5'           => [
                'required',
            ],
            'hod_rating6'            => [
                'required',
            ],
            'hod_comment6'           => [
                'required',
            ],
            'hod_rating7'            => [
                'required',
            ],
            'hod_comment7'           => [
                'required',
            ],
            'hod_rating8'            => [
                'required',
            ],
            'hod_comment8'           => [
                'required',
            ],
            'hod_rating9'            => [
                'required',
            ],
            'hod_comment9'           => [
                'required',
            ],
            'hod_rating10'            => [
                'required',
            ],
            'hod_comment10'           => [
                'required',
            ],
            'hod_rating11'            => [
                'required',
            ],
            'hod_comment11'           => [
                'required',
            ],
            'hod_rating12'            => [
                'required',
            ],
            'hod_comment12'           => [
                'required',
            ],
            'hod_rating13'            => [
                'required',
            ],
            'hod_comment13'           => [
                'required',
            ],
            'hod_rating14'            => [
                'required',
            ],
            'hod_comment14'           => [
                'required',
            ],
            'hod_rating15'            => [
                'required',
            ],
            'hod_comment15'           => [
                'required',
            ],

        ];
    }
}

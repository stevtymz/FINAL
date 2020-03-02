<?php

namespace App\Http\Requests;

use App\Performance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePerformanceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('performance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'profile_id'            => [
                'required', 
                'integer',
            ],
            'head_of_department_id'        => [
                'required',
            ],

            'qualifications'          => [
                'required',
            ],

            'refereed_journal'          => [
                'required',
            ],
            
            'other_publications'          => [
                'required',
            ],

            'teaching_experience'          => [
                'required',
            ],

            'research_grants'          => [
                'required',
            ],

            'supervision'          => [
                'required',
            ],

            'other_activities'          => [
                'required',
            ],

            'community_service'          => [
                'required',
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
            'emp_rating9'            => [
                'required',
            ],
            'emp_comment9'           => [
                'required',
            ],
            'emp_rating10'            => [
                'required',
            ],
            'emp_comment10'           => [
                'required',
            ],
            'emp_rating11'            => [
                'required',
            ],
            'emp_comment11'           => [
                'required',
            ],
            'emp_rating12'            => [
                'required',
            ],
            'emp_comment12'           => [
                'required',
            ],
            'emp_rating13'            => [
                'required',
            ],
            'emp_comment13'           => [
                'required',
            ],
            'emp_rating14'            => [
                'required',
            ],
            'emp_comment14'           => [
                'required',
            ],
            'emp_rating15'            => [
                'required',
            ],
            'emp_comment15'           => [
                'required',
            ],
            
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Reward;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreRewardRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reward_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'employee_name_id' => [
                'required',
                'integer',
            ],
            'reward'           => [
                'required',
            ],
        ];
    }
}

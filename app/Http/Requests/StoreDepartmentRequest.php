<?php

namespace App\Http\Requests;

use App\Department;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize() 
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'         => [
                'required',
            ],
            
        ];
    }
}

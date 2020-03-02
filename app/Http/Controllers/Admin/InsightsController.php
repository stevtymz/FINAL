<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request; 
use Symfony\Component\HttpFoundation\Response;
use App\User;
use App\Performance;
use App\SupportStaffAppraisal;

class InsightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {   
        abort_if(Gate::denies('Insights_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // number of senoir staff 
        $roles =  User::whereHas('roles', function($query) {
            $query->whereId(2)->orWhere(function ($query) {
                $query->whereId(3);
            }); 
        })->count();

        // senoir staff performance above 50%
        $performances = Performance::where('percentage', '>=', 50)->count();

        //Number of appraised senoir staff
        $appraised = Performance::where('percentage', '>', 0)->count();


        //support staff section
        
        // number of support staff
        $roles2 =  User::whereHas('roles', function($query) {
            $query->whereId(5)->orWhere(function ($query) {
                $query->whereId(6);
            }); 
        })->count(); 

        // support staff performance above 50%
        $performances2 = SupportStaffAppraisal::where('percentage', '>=', 50)->count();

        //Number of appraised support staff
        $appraised2 = SupportStaffAppraisal::where('percentage', '>', 0)->count();

        return view('admin.insights.insight', compact('roles','performances','appraised','roles2','performances2','appraised2'));
    }
 
}

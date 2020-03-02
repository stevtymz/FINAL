<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupportStaffAppraisalRequest;
use App\Http\Requests\StoreSupportStaffAppraisalRequest;
use App\Http\Requests\UpdateSupportStaffAppraisalRequest;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Profile;
use App\SupportStaffAppraisal;
use App\User;
use Charts;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowSupportStaffAppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SupportStaffAppraisal $supportStaffAppraisal)
    {   
        $chart = Charts::create('bar', 'highcharts')
        ->title("Appraisal Results")
        ->labels([$supportStaffAppraisal->criteria1,$supportStaffAppraisal->criteria2,$supportStaffAppraisal->criteria3,$supportStaffAppraisal->criteria4,
        $supportStaffAppraisal->criteria5,$supportStaffAppraisal->criteria6,$supportStaffAppraisal->criteria7,$supportStaffAppraisal->criteria8])
        ->values([$supportStaffAppraisal->average1,$supportStaffAppraisal->average2,$supportStaffAppraisal->average3,$supportStaffAppraisal->average4,
        $supportStaffAppraisal->average5,$supportStaffAppraisal->average6,$supportStaffAppraisal->average7,$supportStaffAppraisal->average8])
        ->dimensions(1000, 500) 
        ->responsive(false)
        ->colors(['#e65100','#1b5e20','#0d47a1']); 

         //trends graph

         $chart_options = [
            'chart_title' => 'Performance Trend',
            'report_type' => 'group_by_date',
            'model' => 'App\SupportStaffAppraisal',
            'group_by_field' => 'created_at',
            'group_by_period' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percentage',
            ];
            $chart1 = new LaravelChart($chart_options);
    
        return view('admin.graphs.show', compact('chart','chart1')); 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

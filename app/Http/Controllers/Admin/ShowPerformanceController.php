<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerformanceRequest;
use App\Http\Requests\StorePerformanceRequest;
use App\Http\Requests\UpdatePerformanceRequest;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Performance;
use App\Profile;
use App\User;
use Charts;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowPerformanceController extends Controller
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
    public function show(Performance $performance)
    {   
        $chart = Charts::create('bar', 'highcharts')
        ->title("Appraisal Results")
        ->labels(['Qualifications','Refereed journal','Other publications','Teaching experience','Research grants','Supervisions','Other activities',
        'Community service',$performance->criteria1,$performance->criteria2,$performance->criteria3,$performance->criteria4,
        $performance->criteria5,$performance->criteria6,$performance->criteria7,$performance->criteria8,
        $performance->criteria9,$performance->criteria10,$performance->criteria11,$performance->criteria12,
        $performance->criteria13,$performance->criteria14,$performance->criteria15])
        ->values([$performance->qualifications,$performance->refereed_journal,$performance->other_publications,$performance->teaching_experience,
        $performance->research_grants,$performance->supervision,$performance->other_activities,$performance->community_service,$performance->average1,
        $performance->average2,$performance->average3,$performance->average4,
        $performance->average5,$performance->average6,$performance->average7,$performance->average8,$performance->average9,
        $performance->average10,$performance->average11,$performance->average12,$performance->average13,
        $performance->average14,$performance->average15])
        ->dimensions(1000, 500) 
        ->responsive(true)
        ->colors(['#e65100','#1b5e20','#0d47a1']); 


        //trends graph

        $chart_options = [
            'chart_title' => 'Performance Trend',
            'report_type' => 'group_by_date',
            'model' => 'App\Performance',
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

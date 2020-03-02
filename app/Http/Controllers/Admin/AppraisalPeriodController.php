<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppraisalPeriodRequest;
use Illuminate\Http\Request;
use App\Appraisal_period;
use App\User;
use Carbon\Carbon; 

class AppraisalPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeEntries = Appraisal_period::all();

        return view('admin.appraisal-period.index', compact('timeEntries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appraisal-period.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppraisalPeriodRequest $request)
    {
        $appraisal_period = Appraisal_period::create($request->all());

        return redirect()->route('admin.time-entry.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appraisal_period $timeEntry)
    {

        return view('admin.appraisal-period.edit', compact('timeEntry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appraisal_period $timeEntry)
    {
        $timeEntry->update($request->all());

        return redirect()->route('admin.time-entry.index');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerformanceRequest;
use App\Http\Requests\StorePerformanceRequest;
use App\Http\Requests\UpdatePerformanceRequest;
use App\Performance;
use App\Profile;
use App\DepartmentUser;
use App\User;
use Carbon\Carbon; 
use App\Appraisal_period;
use Gate;
use PDF;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Notifications\NotifySenoirstaff;
use App\Notifications\NotifySenoirstaffHead;

class ReportController extends Controller
{
    
   
    public function show($reports)
    {   
        
             $report = Performance::find($reports); 

             foreach(auth()->user()->unreadNotifications as $notification) {
                if ($notification->read_at === null) {
                    $notification->read_at = Carbon::now();
                    $notification->save();
                } 
            }

            return view('admin.reports.show', compact('report'));
            

    }

    public function index(Performance $report, Request $request)
    {
        $report->load('profile', 'head_of_department'); 
        if($request->has('download')){
            $pdf = PDF::loadView('admin.reports.show');
            return $pdf->download('show.pdf');
        }
        return view('admin.reports.show', compact('report'));
    }
    
}

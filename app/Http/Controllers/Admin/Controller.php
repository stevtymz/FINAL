<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Performance;
use App\SupportStaffAppraisal;
class HomeController
{
      
    public function index()
    { 
        
        return view('home');
    }

}

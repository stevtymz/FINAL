<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Performance;
use App\SupportStaffAppraisal;
use App\Role;
use Symfony\Component\HttpFoundation\Response;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $roles = Role::all();
        return view('home', compact('roles'));
    }

 
}

@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="card-body">
                            <h3>Appraisal Process Insights..</h3>
                                        <br>
                                <!-- Icon Cards-->
                                <div class="row">
                                <div class="col-xl-3 col-sm-6 mb-3">
                                    <div class="card text-white bg-primary o-hidden h-100">
                                    <div class="card-body"> 
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-list"></i>
                                        </div>
                                     
                                        <div class="mr-5"><h6>{{ $appraised }} out of {{ $roles}} employees</h6></div> 
                                      
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="#">
                                        <span class="float-left">Number of Appraised Senior Staff</span>
                                        <span class="float-right">
                                        
                                        </span>
                                    </a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-3">
                                    <div class="card text-white bg-warning o-hidden h-100">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-list"></i>
                                        </div>
                                        <div class="mr-5">{{ $appraised2 }} out of {{ $roles2}} employees</div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="#">
                                        <span class="float-left">Number of Appraised Support Staff</span>
                                        <span class="float-right">
                                        
                                        </span>
                                    </a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-3">
                                    <div class="card text-white bg-primary o-hidden h-100">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-list"></i>
                                        </div>
                                        <div class="mr-5">{{ $performances }} employees scored 50% and a bove</div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="#">
                                        <span class="float-left">Senior Staff General Performance</span>
                                        
                                    </a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-3">
                                    <div class="card text-white bg-warning o-hidden h-100">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-list"></i>
                                        </div>
                                        <div class="mr-5">{{ $performances2 }} employees scored 50% and a bove</div>
                                        
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="#">
                                        <span class="float-left">Support Staff General Performance</span>
                                       
                                    </a>
                                    </div>
                                </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

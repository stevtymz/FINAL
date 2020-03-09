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
                            <h3>User's System Guide</h3>
                            
                            <h5>Step 1:</h5>
                            <h5>Step 2:</h5>
                           
                            <h5>Step 3:</h5>



                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Individual Results
    </div> 

    <div class="card-body">
    <h3>Graphical Analysis</h3>
    {!! $chart->render() !!} 
    </div>

    <br>
    <div class="card-body">
    <h3>{{ $chart1->options['chart_title'] }}</h3>
    {!! $chart1->renderHtml() !!}
    </div>
</div>
@endsection
@section('scripts')
<script>
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart1->renderJs() !!}
@endsection
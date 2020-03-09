@extends('layouts.admin')
@section('content')

<div class="card">
   
    <div class="card-body">
        <style type="text/css" media="screen">
            * {
                font-family: "DejaVu Sans";
            }
            
           
            body {
                font-size: 18px;
                margin: 15pt;
                
            }
            tr.noBorder td{
                border: 0;
            }

            @media print{
                @page {
                margin: 0;
              
                }
              
            }
        
        </style>
        
       <style type="text/css" media="print">
            * {
                font-family: "DejaVu Sans";
            }
            
           
            body {
                
                font-size: 18px;
                width: 210mm;
                height: 297mm;
                
            }
            tr.noBorder td{
                border: 0;
            }

        
                @page {
                size: A4;
                margin: 0;
                
                
                }
              input{
                  display:none;
              }
            
            footer {
                    display: none;
                   
                }
        </style>
     
    <body >
   
           <table>
            <img src="/uploads/logo/logo.jpg" style=" width:100px; height:100px; border-radius:150%; margin-left:420px; margin-top:50px;">
       
        <table class="table mt-5" id="results">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%" >
                        <h4 class="text-uppercase">
                            <strong style=" margin-left:190px; margin-top:50px;">MUST ANNUAL PERFORMANCE APPRAISAL REPORT</strong>
                        </h4>
                    </td>
                    
                </tr>
            </tbody>
        </table>
        <br>
        <h6 style="margin-left:700px"><strong>Appraised on:</strong> {{ $report->updated_at}}</h6>
        <br>

        <table class="table" style="margin-left:20px;">
            <thead>
                <tr>
               
                   <img src="{{url('uploads/avators/'.Auth::user()->profile->avator) }}" style=" width:100px; height:100px; border-radius:4px; border: 1px solid #ddd; margin-left:18px;">
                  
                
                    <th class="border-0 pl-0" width="48.5%">
                        <strong>Employee Profile</strong>
                       
                    </th>
                  
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-0">
                        @if( $report->profile->first_name)
                            <p class="seller-name">
                                <strong>Name: {{  $report->profile->first_name }} {{  $report->profile->last_name }}</strong>
                            </p>
                        @endif

                        @if($report->profile->date_of_birth)
                             
                               <p class="seller-phone">
                               Date of birth: {{ $report->profile->date_of_birth }}
                             </p>
                        @endif

                        @if($report->head_of_department_id)
                            <p class="seller-address">
                                Department: ''pending''
                            </p>
                        @endif

                        @if($report->profile->current_education)
                            <p class="seller-code">
                                Current level of education: {{ $report->profile->current_education }}
                            </p>
                        @endif

                        @if($report->profile->current_job_title)
                            <p class="seller-vat">
                                Current job title: {{ $report->profile->current_job_title }}
                            </p>
                        @endif
                    </td>
                   
                </tr>
            </tbody>
        </table>


        <table class="table" style="margin-left:20px;">
            <thead>
                <tr>
              
                    <th class="border-0 pl-0" width="48.5%">
                        <strong>A. Personal Achievements</strong>
                       
                    </th>
                  
                </tr>
            </thead>

            <thead>
                <tr>
                    <th scope="col" class="border-0 pl-0">Performance Criteria</th>
                    @if($report->criteria1)
                        <th scope="col" class="text-center border-0">Scores</th>
                    @endif
                </tr>
                    
            </thead>
            
            <tbody>
                
                <tr>
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria1 }}</td>
                    <!-- scores-->
                    <td class="text-center"> {{ $report->qualifications }} </td>
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria1 }}</td>
                    <td class="text-center"> {{ $report->refereed_journal }} </td>
                </tr>
                <tr class="noBorder">
                     <!-- criteria-->
                     <td class="pl-0"> {{ $report->criteria1 }}</td>
                    <!-- scores-->
                    <td class="text-center"> {{ $report->other_publications }} </td>
                </tr>
                <tr class="noBorder">
                     <!-- criteria-->
                     <td class="pl-0"> {{ $report->criteria1 }}</td>
                    <!-- scores-->
                    <td class="text-center"> {{ $report->teaching_experience }} </td>
                </tr>
                <tr class="noBorder">
                      <!-- criteria-->
                      <td class="pl-0"> {{ $report->criteria1 }}</td>
                    <!-- scores-->
                    <td class="text-center"> {{ $report->research_grants }} </td>
                </tr>
                <tr class="noBorder">
                     <!-- criteria-->
                     <td class="pl-0"> {{ $report->criteria1 }}</td>
                    <!-- scores-->
                    <td class="text-center"> {{ $report->supervision }} </td>
                </tr>
                <tr class="noBorder">
                     <!-- criteria-->
                     <td class="pl-0"> {{ $report->criteria1 }}</td>
                    <!-- scores-->
                    <td class="text-center"> {{ $report->other_activities }} </td>
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria1 }}</td>
                    <!-- scores-->
                    <td class="text-center"> {{ $report->community_service }} </td>
                   
                </tr> 
                <br>    
            </tbody>

        </table>
        <br>
        <br>

        {{-- Table --}}
        <table class="table" style="margin-left:20px;">
            
            <tbody>
                
            <tr>
            <thead>
            <tr>
                <th class="border-0 pl-0" width="48.5%">
                    <strong>B. Professional Ethics</strong>
                    
                </th>
            </tr>
                <tr>
                    <th scope="col" class="border-0 pl-0">Performance Criteria</th>
                    @if($report->criteria1)
                        <th scope="col" class=" border-0">Scores</th>
                    @endif
                    <th scope="col" class="text-center border-0">Superior's Comments</th>
                </tr>  
            </thead>
            <tbody>
                
                <tr>
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria1 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average1 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment1 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria2 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average2 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment2 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria3 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average3 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment3 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria4 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average4 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment4 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria5 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average5 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment5 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria6 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average6 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment6 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria7 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average7 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment7 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria8 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average8 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment8 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria9 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average9 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment9 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria10 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average10 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment10 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria11 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average11 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment11 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria12 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average12 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment12 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria13 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average13 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment13 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria14 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average14 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment14 }} </td>
                    
                </tr>
                <tr class="noBorder">
                    <!-- criteria-->
                    <td class="pl-0"> {{ $report->criteria15 }}</td>
                    <!-- scores-->
                    <td > {{ $report->average15 }} </td>
                    <!-- comments-->
                    <td class="text-center"> {{ $report->hod_comment15 }} </td>
                    
                </tr>
                @if($report->percentage)
                    <tr>
                        <td colspan="{{ $report->table_columns - 1 }}" class="border-0 "></td>
                        <td  >General Score: {{ $report->percentage}} %</td>
                        
                    </tr>
                @endif
               
            </tbody>
        </table>
        <br>
        <br>
        <input type="button" class="btn btn-primary" value="Print" onclick="window.print()"/>
       </body> 
    </div>
</div>

@endsection




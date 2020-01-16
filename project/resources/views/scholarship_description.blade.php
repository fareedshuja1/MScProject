@extends('layouts.master')

@section('title')
{{$sch_title}}
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>{{$sch_title}}</h5>
        </div>
    </div>
@endsection



@section('main_content')

	<div class="row">
            
                            
                  <div class="col-md-8">
                      
                      <span class="btn btn-warning btn-sm" onclick="window.history.go(-1); return false;"> <i class="fa fa-arrow-left"></i> <b>PREVIOUS PAGE</b></span>
                      
                      <span class="btn btn-success btn-sm print" onclick="printDiv('printableArea')"> <i class="fa fa-print"></i> <b>PRINT</b></span>
                      
                      <br><br>
                      
                      <hr class="hrtag">
                      <br>
                  <div id="printableArea">
                  
                      <div class="row">
                          <div class="col-md-2">
                              <span class="blue" style="font-size: 16px">Title : </span>
                          </div>
                          <div class="col-md-10">
                           <span style="font-size: 18px; text-align: left">{{$sch_title}}</span> 
                          </div>
                      </div>       
              

               <div class="row">
                          <div class="col-md-2">
                              <span class="blue" style="font-size: 16px">Institute : </span>
                          </div>
                          <div class="col-md-10">
                           <span style="font-size: 18px; text-align: left">{{$institute_name}}</span> 
                          </div>
                      </div>       
              
            
                      <br>
               <span class="blue" style="font-size: 16px">Other Details</span>
               <table class="table table-bordered table-condensed table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Study in</th>
                                        <td>{{$country_name}}</td>                                         
                                        
                                        <th>Start Date</th>
                                        <td>{{$start_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Deadline</th>
                                        <td>{{$closing_date}}</td>
                                    
                                        <th>No. of Awards</th>
                                        <td>{{$no_of_scholarships}}</td>
                                    </tr>
                                    <tr>
                                        <th>Degree Level</th>
                                        <td>{{$degree_level}}</td>
                                   
                                        <th>Target Audience.</th>
                                        <td>{!!$target_audience!!}</td>
                                       
                                    </tr>
                                    
                                    </tbody>
                                </table>
                                
               
               @if($sch_description!='')
               <span class="blue" style="font-size: 16px">Brief Description</span>
               <p style="text-align:justify">{!!$sch_description!!}</p>
               @endif
               
               @if($field_of_study!='')
               <span class="blue" style="font-size: 16px">Field of Study</span>
               <p style="text-align:justify">{!!$field_of_study!!}</p>
               @endif
               
               @if($eligibility!='')
               <span class="blue" style="font-size: 16px">Eligibility</span>
               <p style="text-align:justify">{!!$eligibility!!}</p>
               @endif
               
               @if($how_to_apply!='')
              <span class="blue" style="font-size: 16px">Submission Guideline</span>
               <p style="text-align:justify">{!!$how_to_apply!!}</p>
               @endif
               
               @if($original_source!='')
               <span class="blue" style="font-size: 16px">Original Source</span>
               <p style="text-align:justify">{!!$original_source!!}</p>
               @endif
          
	       </div>
                  
                  <hr class="colorgraph">
                    
                      
                  </div>
            
            
            	<div class="col-md-4 hidden-xs hidden-sm">
      @include('layouts.adverts')
                </div>
			
	</div>



@endsection
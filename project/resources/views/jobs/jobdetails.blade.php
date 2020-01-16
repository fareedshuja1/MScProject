@extends('layouts.master')

@section('title')
{{$job_title}}
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>{{$job_title}}</h5>
        </div>
    </div>
@endsection



@section('main_content')

	<div class="row">
            
                            
                  <div class="col-md-8">
                      
                      @if(!session('success'))
                      <span class="btn btn-warning btn-sm" onclick="window.history.go(-1); return false;"> <i class="fa fa-arrow-left"></i> <b>PREVIOUS PAGE</b></span>
                      @endif
                      
                      <span class="btn btn-success btn-sm print" onclick="printDiv('printableArea')"> <i class="fa fa-print"></i> <b>PRINT</b></span>
                      
                      @if(!Session::has('company_id'))
                            @if($count<1 && $is_verified=='YES')
                            <a href="{{URL::to('applynow/'.$job_id.'/'.str_replace(' ', '_', $job_title))}}" style="color:#fff" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o"></i> <b>APPLY NOW</b></a>
                            @endif                     
                      @endif                     
                      
                      @if(Session::has('jobseeker_id'))
                        <span class="btn btn-danger btn-sm"> <i class="fa fa-exclamation-triangle"></i><b> REPORT</b></span>
                      @endif                      
                      <br><br>
                      
                      <hr class="hrtag">
                      
                        @if(session('success'))
                        <br>
                        <div class="alert alert-success fade in">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <i class=""></i> <strong align="center">{{session('success')}}</strong>
                        </div>
                        @endif
                        
                        
                      @if($count>0 && !session('success'))
                      <br>
                      <div class="alert alert-success fade in">
                              <i class=""></i> <strong align="center">YOU HAVE ALREADY APPLIED FOR THIS JOB</strong>
                        </div>
                      @endif 
                      
                      
		
                  <div id="printableArea">
                  
               <h4><span class="blue">About {{$company_name}}</span></h4>
               <p style="text-align:justify"><?php echo $company_details; ?></p>

               @if($job_details!='')
               <h4><span class="blue">Job Summary</span></h4>
               <p style="text-align:justify">{!!$job_details!!}</p>
               @endif
               
               
               <h4><span class="blue">Other Details</span></h4>
               <table class="table table-bordered table-condensed table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{$category_title}}</td>                                         
                                        
                                        <th>City</th>
                                        <td>{{$city_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Posted</th>
                                        <td>{{$date_posted}}</td>
                                    
                                        <th>Closing Date</th>
                                        <td>{{$date_expiry}}</td>
                                    </tr>
                                    <tr>
                                        <th>Work Type</th>
                                        <td>{{$job_type_title}}</td>
                                   
                                        <th>Reference No.</th>
                                        <td>{{$vacancy_no}}</td>
                                       
                                    </tr>
                                    <tr>
                                        <th>Salary</th>
                                        <td>{{$job_salary}}</td>
                                        
                                        <th>No. of Vacancies</th>
                                        <td>{{$no_vacancy}}</td>
                                    </tr>
                                    <tr>                                   
                                        <th>Travel required?</th>
                                        <td>{{$travel_required}}</td>
                                        
                                        <th>Other locations</th>
                                        <td colspan="3">{{$other_locations}}</td>
                                    </tr>
                                 
                                    </tbody>
                                </table>
                                
               
               @if($duty_responsibilities!='')
               <h4><span class="blue">Roles & Responsibilities</span></h4>
               <p style="text-align:justify">{!!$duty_responsibilities!!}</p>
               @endif
               
               @if($skills_required!='')
               <h4><span class="blue">Required Skills</span></h4>
               <p style="text-align:justify">{!!$skills_required!!}</p>
               @endif
               
               @if($experience_required!='')
               <h4><span class="blue">Experience Requirements</span></h4>
               <p style="text-align:justify">{!!$experience_required!!}</p>
               @endif
               
               @if($qualification_required!='')
               <h4><span class="blue">Education Requirements</span></h4>
               <p style="text-align:justify">{!!$qualification_required!!}</p>
               @endif
               
               @if($apply_guidance!='')
               <h4><span class="blue">Submission Guideline</span></h4>
               <p style="text-align:justify">{!!$apply_guidance!!}</p>
               @endif
          
	       </div>
                  
                  <hr class="colorgraph">
                    
                      
                  </div>
            
            
            	<div class="col-md-4 hidden-xs hidden-sm">
                    
                    @include('layouts.adverts')
                    @include('layouts.registernow_widget')

                </div>
			
	</div>



@endsection
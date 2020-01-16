@extends('layouts.master')

@section('title')
{{$jobseeker_name}} - Findajob.af | Find jobs in Afghanistan
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>{{$jobseeker_name}}</h5>
        </div>
    </div>
@endsection

@section('main_content')

	<div class="col-md-4">
	    <div class="col-md-12">
		<img src="<?=asset('project/storage');?>/app/jobseekers_image/{{$jobseeker_image}}" style="" class="center-block img-responsive img-thumbnail">
		<br>
		<hr class="colorgraph">
	    </div>	
            
            <div class="col-md-12">
		@include('layouts.registernow_widget')
	    </div>	
	</div>


        <div class="col-md-8">
            <span class="btn btn-warning btn-sm" onclick="window.history.go(-1); return false;"> <i class="fa fa-arrow-left"></i> <b>PREVIOUS PAGE</b></span>
            
            <span class="btn btn-success btn-sm print" onclick="printDiv('printProfile')"> <i class="fa fa-print"></i> <b>PRINT</b></span>
           
            @if($jobseeker_cv != '')
            <a href="<?=asset('project/storage');?>/app/jobseekers_cvs/{{$jobseeker_cv}}" style="color:#fff" class="btn btn-danger btn-sm">
                <i class="fa fa-check-square-o"></i><b>&nbsp;DOWNLOAD CV</b>
            </a>
            @endif
            
            <div id="printProfile">
            
          <div class="col-md-12">
       
       <div class="table-responsive">
            <table class="table  table-condensed table-responsive table-user-information" >
                <tbody>
                    <tr>
                        <td style="text-align: left"><span class="text-danger" style="text-transform: uppercase;"><b>full name</b></span></td>
                            <td style="text-align: left">{{$jobseeker_name}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><span class="text-danger" style="text-transform: uppercase;"><b>Email Address</b></span></td>
                            <td style="text-align: left">{{$jobseeker_email}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><span class="text-danger" style="text-transform: uppercase;"><b>Phone No.</b></span></td>
                        @if($jobseeker_phone != '')
                            <td style="text-align: left">{{$jobseeker_phone}}</td>
                        @else
                            <td style="text-align: left">Phone number not provided.</td>
                        @endif
                    </tr>
                    <tr>
                        <td style="text-align: left"><span class="text-danger" style="text-transform: uppercase;"><b>LinkedIn Profile</b></span></td>
                        @if($jobseeker_linkedin != '')
                            <td style="text-align: left">{{$jobseeker_linkedin}}</td>
                        @else
                            <td style="text-align: left">LinkedIn profile not provided.</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
              
                       
        <h4><span class="blue2" style="text-transform: uppercase;">Personal Statement</span></h4>
        <p style="text-align:justify"><?php echo $jobseeker_coverletter; ?></p>
        
        
        <br>
               <hr class="hrtag">
        
        </div>
            
            

          <div class="col-md-12">
               <h4><span class="blue2" style="text-transform: uppercase;">Degree / Certificates</span></h4>
               
                <div class="table-responsive">
                    <table class="table  table-condensed table-responsive table-user-information" >
                        <tbody>
                
                @foreach($education as $e)
                  
                <tr>
                    <td class="text-success" style="text-align: left"><strong>Level</strong></td>
                    <td style="text-align: left">{{$e->degree_level}}</td>
                    <td class="text-success" style="text-align: left"><strong>Course Title</strong></td>
                    <td style="text-align: left">{{$e->course_title}}</td>
                </tr>
                
                <tr>
                    <td class="text-success" style="text-align: left"><strong>Institute</strong></td>
                    <td colspan="3" style="text-align: left">{{$e->institute_name}}</td>
                    
                </tr>
                <tr>
                    <td class="text-success" style="text-align: left"><strong>Start Date</strong></td>
                    <td style="text-align: left">{{$e->start_date}}</td>
                     <td class="text-success" style="text-align: left"><strong>End Date</strong></td>
                    <td style="text-align: left">{{$e->end_date}}</td>
                </tr>
                
                <tr>
                    <td class="text-success" style="text-align: left"><strong>Result</strong></td>
                    <td style="text-align: left">{{$e->final_grade}}</td>
                    <td class="text-success" style="text-align: left"><strong>Institute Location</strong></td>
                    <td style="text-align: left">{{$e->institute_location}}</td>
                </tr>
                
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                   
                @endforeach 
                
                        </tbody>
                    </table>
                </div>
                           
          </div>          
               
                <div class="col-md-12">
               <h4><span class="blue2" style="text-transform: uppercase;">Work Experience</span></h4>
               
                <div class="table-responsive">
                    <table class="table  table-condensed table-responsive table-user-information" >
                        <tbody>
                
                @foreach($experience as $ee)
                  
                <tr>
                    <td class="text-success" style="text-align: left"><strong>Designation</strong></td>
                    <td style="text-align: left">{{$ee->designation}}</td>
                    <td class="text-success" style="text-align: left"><strong>Organization</strong></td>
                    <td style="text-align: left">{{$ee->organization}}</td>
                </tr>
                
                <tr>
                    <td class="text-success" style="text-align: left"><strong>Work Type</strong></td>
                    <td style="text-align: left">{{$ee->job_type_title}}</td>
                     <td class="text-success" style="text-align: left"><strong>Job Category</strong></td>
                    <td style="text-align: left">{{$ee->category_title}}</td>
                </tr>
                
                <tr>
                    <td class="text-success" style="text-align: left"><strong>Start Date</strong></td>
                    <td style="text-align: left">{{$ee->start_date}}</td>
                    <td class="text-success" style="text-align: left"><strong>End Date</strong></td>
                    <td style="text-align: left">{{$ee->end_date}}</td>
                </tr>
                <tr>
                    <td class="text-success" style="text-align: left">
                        <strong>Responsibilities</strong>
                    </td>
                    <td style="text-align: left" colspan="3">{!!$ee->duty!!}</td>
                </tr>
                
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                   
                @endforeach 
                
                        </tbody>
                    </table>
                </div>
                
               
               
               
        </div>
                
            </div>
        </div>

@endsection

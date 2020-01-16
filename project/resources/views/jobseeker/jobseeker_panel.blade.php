@extends('layouts.master')

@section('title')
{{Session::get('jobseeker_name')}} -  Findajob.af
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>{{Session::get('jobseeker_name')}}</h5>
        </div>
    </div>
@endsection

@section('main_content')
    

        <div class="col-md-12">
            @if (session('success'))
                 <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center">{{session('success')}}</strong>
                 </div>
             @endif
        </div>

	<div class="col-md-3">
	 <!--widget start-->
           @include('layouts.jobseeker_sidebar')
         <!--widget end-->
	</div>


        <div class="col-md-9">
          
            <div class="col-md-12">
                <h4 class="text-primary">Personal Statement</h4>
                <p style="text-align:justify" >{!!$jobseeker_coverletter!!}</p> 
                                        <div class="table-responsive">
                                                <table class="table  table-condensed table-responsive table-user-information" >
                                                        <tbody>
                                                                <tr>
                                                                    <td class="text-success" style="text-align: left"><strong>CV/Resume</strong></td>
                                                                     @if($jobseeker_cv == '')
                                                                        <td style="text-align: left">CV/Resume not uploaded.</td>  
                                                                     @else
                                                                       <td style="text-align: left"><a href='<?=asset('project/storage');?>/app/jobseekers_cvs/{{$jobseeker_cv}}' class="label label-danger" target='_blank'>DOWNLOAD CV</a></td> 
                                                                     @endif
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-success" style="text-align: left"><strong>Phone No.</strong></td>
                                                                @if($jobseeker_phone == '')
                                                                <td style="text-align: left">Phone number not added.</td>
                                                                @else
                                                                <td style="text-align: left">{{$jobseeker_phone}}</td>     
                                                                @endif
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-success" style="text-align: left"><strong>LinkedIn Profile</strong></td>
                                                                @if($jobseeker_linkedin == '')
                                                                <td style="text-align: left">LinkedIn profile not added.</td>
                                                                @else
                                                                <td style="text-align: left"><a href='{{$jobseeker_linkedin}}' target='_blank'>{{$jobseeker_linkedin}}</a></td>                                                                
                                                                @endif
                                                                </tr>

                                                        </tbody>
                                                </table>
                                        </div>
                            
                <h4 class="text-primary" style="margin-top: -10px">Degree / Certificates</h4>
                
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
                    <td colspan="4" style="text-align: left">
                        <a class="btn btn-primary" href="{{URL::to('edit_education/'.$e->jq_id)}}">EDIT</a>
                        &nbsp;
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');" href="{{URL::to('delete_education/'.$e->jq_id)}}">DELETE</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                   
                @endforeach 
                
                        </tbody>
                    </table>
                </div>
                
                <h4 class="text-primary" style="margin-top: -15px">Work Experience</h4>
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
                    <td colspan="4" style="text-align: left">
                        <a class="btn btn-primary" href="{{URL::to('edit_experience/'.$ee->je_id)}}">EDIT</a>
                        &nbsp;
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');" href="{{URL::to('delete_experience/'.$ee->je_id)}}">DELETE</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                   
                @endforeach 
                
                        </tbody>
                    </table>
                </div>
                
                
            </div>
			
	   
           <div class="col-md-12 hidden-sm hidden-xs">
                                                   @include('layouts.contactus_bar')

                                      <br>
                                  </div>
			
        </div>

@endsection

@extends('layouts.master')

@section('title')
{{$job_title}} | findajob.af | Find jobs in Afghanistan
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>{{$title}}</h5>
        </div>
    </div>
@endsection



@section('main_content')

	<div class="row">
                            
                  <div class="col-md-8">
           
                      <span class="btn btn-warning btn-sm" onclick="window.history.go(-1); return false;"> <i class="fa fa-arrow-left"></i> <b>PREVIOUS PAGE</b></span>                      

                      <br>
                      <div class="spc"></div>
                      <br>
                        @if (session('warning'))
                        <div class="alert alert-danger fade in">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <i class=""></i> <strong align="center">{{session('warning')}}</strong>
                        </div>
                        @endif
                        
                        @if(session('success'))
                        <div class="alert alert-success fade in">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <i class=""></i> <strong align="center">{{session('success')}}</strong>
                        </div>
                        @endif

                                     <h4><span class="blue">JOB DETAILS</span></h4>
                                     

               <table class="table table-bordered table-condensed table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Job Title</th>
                                        <td style="text-align: left"><span>{{$title}}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Employer</th>
                                        <td style="text-align: left"><span>{{$company_name}}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td style="text-align: left"><span>{{$category_title}}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Work Type</th>
                                        <td style="text-align: left"><span>{{$job_type_title}}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Main City</th>
                                        <td style="text-align: left"><span>{{$city_name}}</span></td>                                        
                                    </tr>
                                    <tr>
                                        <th>Reference No.</th>
                                        <td style="text-align: left"><span>{{$vacancy_no}}</span></td>
                                    </tr>
                                 
                                    </tbody>
                                </table>
                                
                      <hr class="hrtag">

               <h4><span class="blue">YOUR DETAILS</span></h4>
               
               
                <form action="{{URL::to('applying_for_job')}}" method="post" enctype="multipart/form-data">
                                                
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    
                    <input type="hidden" name="jobseeker_name" value="{{$jobseeker_name}}">
                    <input type="hidden" name="job_id" value="{{$job_id}}">
                    <input type="hidden" name="job_title" value="{{$title}}">

               <table class="table table-bordered table-condensed table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Full Name</th>
                                        <td style="text-align: left"><span>{{$jobseeker_name}}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Previous CV</th>
                                             @if($jobseeker_cv == '')
                                             <td style="text-align: left">No CV / Resume found. Please upload a CV.</td> 
                                             <input type="hidden" name="old_cv" value="not_set">
                                             @else
                                             <td style="text-align: left"><a href='<?=asset('project/storage');?>/app/jobseekers_cvs/{{$jobseeker_cv}}' class="label label-danger" target='_blank'>VIEW CV/RESUME</a></td> 
                                             <input type="hidden" name="old_cv" value="{{$jobseeker_cv}}">
                                             @endif
                                    </tr>
                                    <tr>
                                        <th>Upload New CV</th>
                                        <td style="text-align: left; color: red">
                                            <input type="file" name="jobseeker_cv" id="jobseeker_cv" class="form-control">
                                            <span>Please note this will replace your previous CV on our system.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cover Letter</th>
                                        <td>
                                            <textarea  class="form-control ckeditor" name="cover_letter" rows="10" id="job_details"><?php echo $jobseeker_coverletter; ?></textarea></td>
                                    </tr>
                                    
                                    <tr>
                                        @if($count>0)
                                        <td colspan="2"><span class="text-danger"><b>YOU HAVE ALREADY APPLIED FOR THIS JOB.</b></span></td>
                                        @else
                                        <td colspan="2"><button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; APPLY NOW</button></td>
                                        @endif
                                    </tr>
                                   
                                 
                                    </tbody>
                                </table>
                </form>
               
               
                                
               
                  </div>
				
			<div class="col-md-4">
                           @include('layouts.adverts')
			</div>
	</div>



@endsection
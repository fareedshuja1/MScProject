@extends('layouts.master')

@section('title')
{{Session::get('jobseeker_name')}} -  Add Work Experience Details | Findajob.af
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Add Work Experience</h5>
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
                <form action="{{URL::to('experience_query')}}" class="cmxform" style="color:#EB9316;" id="add_experience" role="form" method="post">
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Job Title <span style="color:red">*</span></label>
                        <input type="text" name="designation" placeholder="Project Manager, Web Developer" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Organization / Company <span style="color:red">*</span></label>
                        <input type="text" name="organization" placeholder="Enter Organization Name" class="form-control">
                        </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Work Type</label>
                        <select class="form-control" style="text-transform: uppercase;" name="job_type_id" id="job_type_id">
                            @foreach($job_type as $job_type)
                                <option value="{{$job_type->job_type_id}}">{{$job_type->job_type_title}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Job Category</label>
                        <select class="form-control" style="text-transform: uppercase;" name="category_id" id="category_id">
                            @foreach($categories as $categories)
                                <option value="{{$categories->category_id}}">{{$categories->category_title}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Start Date <span style="color:red">*</span></label>
                        <div class="row">
                        <div class="col-md-6">
                        <select name="start_date_month" class="form-control">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        </div>
                        <div class="col-md-6">
                        <input name="start_date_year" type="text" class="form-control" placeholder="2015">
                        </div>
		    </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>End Date</label>
                        <div class="row">
                        <div class="col-md-6">
                        <select name="end_date_month" class="form-control">
                            <option value="In Progress">In Progress</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        </div>
                        <div class="col-md-6">
                        <input name="end_date_year" type="text" class="form-control" placeholder="Enter Year">
                        </div>
		    </div>
                        </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                        <label>Job Description <span style="color:red">*</span></label>
                        <textarea class="form-control ckeditor" name="duty">Tell us about your role and responsibilities</textarea>
                        </div>
                        </div>
                       
                    </div>
                    
                    
		    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp; Save Record</button>
		    </div>
                    
                </form>
                
            </div>
			
	<div class="col-md-12 hidden-sm hidden-xs">
                                                   @include('layouts.contactus_bar')

                                      <br>
                                  </div>
			
        </div>

@endsection

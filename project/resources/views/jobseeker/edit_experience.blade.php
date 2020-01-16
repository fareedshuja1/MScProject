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
                <form action="{{URL::to('edit_experience_query')}}" class="cmxform" style="color:#EB9316;" id="edit_experience" role="form" method="post">
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    
                    <input type = "hidden" name = "je_id" value = "{{$je_id}}">

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Job Title <span style="color:red">*</span></label>
                        <input type="text" name="designation" value="{{$designation}}" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Organization / Company <span style="color:red">*</span></label>
                        <input type="text" name="organization" value="{{$organization}}" class="form-control">
                        </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Work Type</label>
                        <select class="form-control" style="text-transform: uppercase;" name="job_type_id" id="job_type_id">
                             <option value="{{$job_type_id}}">{{$job_type_title}}</option>
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
                            <option value="{{$category_id}}">{{$category_title}}</option>
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
                        <label>Start Date (Month, Year)<span style="color:red">*</span></label>
                        
                        <input name="start_date" type="text" class="form-control" value="{{$start_date}}">
                        
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>End Date (Month, Year)</label>
                        
                        <input name="end_date" type="text" class="form-control" value="{{$end_date}}">
                        </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                        <label>Job Description <span style="color:red">*</span></label>
                        <textarea class="form-control ckeditor" name="duty">{{$duty}}</textarea>
                        </div>
                        </div>
                       
                    </div>
                    
                    
		    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp; Save Changes</button>
		    </div>
                    
                </form>
                    </div>
                    
                    
                
                <div class="col-md-12 hidden-sm hidden-xs">
                                                   @include('layouts.contactus_bar')

                                      <br>
                                  </div>
			
            </div>

			
	
        </div>

@endsection

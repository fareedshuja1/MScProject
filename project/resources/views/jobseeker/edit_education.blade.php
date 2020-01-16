@extends('layouts.master')

@section('title')
{{Session::get('jobseeker_name')}} -  Add Education Details | Findajob.af
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Edit Course Details</h5>
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
                <form style="color:#EB9316;" action="{{URL::to('edit_education_query')}}" class="cmxform" id="editeducationForm" role="form" method="post">
                    <div class="row">
                    <div class="col-md-6">
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <input type = "hidden" name = "jq_id" value = "{{$jq_id}}">
                    
                    <div class="form-group">
                        <label>Course Level</label>
                        <select name="degree_level" class="form-control">
                            <option value="{{$degree_level}}">{{$degree_level}}</option>
                            <option value="Diploma / Certificate">Diploma / Certificate</option>
                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                            <option value="Master's Degree">Master's Degree</option>
                            <option value="Doctoral's Degree">Doctoral's Degree</option>
                        </select>
                        
		    </div>
                    
                    <div class="form-group">
                        <label>Course Title <span style="color:red">*</span></label>
                        <input type="text" name="course_title" value="{{$course_title}}" class="form-control" id="">
                        
		    </div>
                              
                                      
                   <div class="form-group">
                        <label>Start Date (Month, Year)<span style="color:red">*</span></label>
                        <input name="start_date" type="text" class="form-control" value="{{$start_date}}">
		    </div>                    
                    </div>
                    
                    <div class="col-md-6">
		                      
                        <div class="form-group">
                        <label>Result / Grade (if achieved)</label>
                        <input type="text" name="final_grade" class="form-control" value="{{$final_grade}}" id="">
                        
		        </div>
                        
                        <div class="form-group">
                        <label>Institute / University <span style="color:red">*</span></label>
                        <input type="text" name="institute_name" value="{{$institute_name}}" class="form-control" id="">
                        
		    </div>
                        
                                               
                    <div class="form-group">
                        <label>End Date (Month, Year)</label>
                        <input name="end_date" type="text" class="form-control" value="{{$end_date}}">
                    </div>
                        
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                        <label>Institute Location (City and Country)</label>
                        <input type="text" name="institute_location" value="{{$institute_location}}" class="form-control">
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

@endsection

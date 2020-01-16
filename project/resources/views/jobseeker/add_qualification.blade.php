@extends('layouts.master')

@section('title')
{{Session::get('jobseeker_name')}} -  Add Education Details | Findajob.af
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Add Education Details</h5>
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
                <form style="color:#EB9316;" action="{{URL::to('qualification_query')}}" class="cmxform" id="educationForm" role="form" method="post">
                    <div class="row">
                    <div class="col-md-6">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    
                    <div class="form-group">
                        <label>Course Level</label>
                        <select name="degree_level" class="form-control">
                            <option value="Diploma / Certificate">Diploma / Certificate</option>
                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                            <option value="Master's Degree">Master's Degree</option>
                            <option value="Doctoral's Degree">Doctoral's Degree</option>
                        </select>
                        
		    </div>
                    
                    <div class="form-group">
                        <label>Course Title <span style="color:red">*</span></label>
                        <input type="text" name="course_title" placeholder="Computer Science, Business Administration" class="form-control" id="degree_title">
                        
		    </div>
                              
                                      
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
                        <label>Result / Grade (if achieved)</label>
                        <input type="text" name="final_grade" class="form-control" placeholder="3.55 CGPA / Merit / 80%" id="final_grade">
                        
		        </div>
                        
                        <div class="form-group">
                        <label>Institute / University <span style="color:red">*</span></label>
                        <input type="text" name="institute_name" placeholder="Enter institute / university name" class="form-control" id="institute_name">
                        
		    </div>
                        
                                               
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
                        <input name="end_date_year" type="text" class="form-control" placeholder="2015">
                        </div>
		    </div>
                    </div>
                        
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                        <label>Institute Location (City and Country)</label>
                        <input type="text" name="institute_location" placeholder="London, United Kingdom" class="form-control">
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

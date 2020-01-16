@extends('layouts.master')

@section('title')
{{Session::get('company_name')}}
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>EDIT JOB VACANCY.</h5>
        </div>
    </div>
@endsection

@section('main_content')

  

        <div class="col-md-12">
            
            <div class="col-md-12">
               
                <span class="btn btn-warning btn-sm" onclick="window.history.go(-1); return false;"> <i class="fa fa-arrow-left"></i> <b>PREVIOUS PAGE</b></span>

              <article class="grid_8">
	    <div class="note-container">
		<div class="note-content clearfix">
			<div class="bignote">
                            <p class="service-note" style="font-size: 14px">PLEASE NOTE</p>
                        <span style="font-size: 13px">Any information you modify / change here will be thoroughly checked for reliability. It shall be visible on site once we verify its genuineness. The process takes 24 hours max.</span>
                        
                        </div>
		</div>
	    </div>
	</article>  
                <br>
            </div>

          
       <form style="color:#EB9316;" action="{{URL::to('editjob_query')}}" class="cmxform" id="editjobb" method="post" role="form">

            <div class="col-md-12">
                
                 <div class="col-md-12">
                    @if (session('success'))
                         <div class="alert alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class=""></i> <strong align="center">{{session('success')}}</strong>
                         </div>
                     @endif
                 </div>

                

                			<div class="col-md-6 form-line">
                                            
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                            
                            <input type = "hidden" name = "job_id" value = "<?php echo $job_id; ?>">


			  			<div class="form-group">
                                                    <label for="job_title">Job Title </label>
                                                    <input type="text" class="form-control" id="job_title" name="job_title" value="{{$job_title}}" required="required">
				  		</div>
                                                <div class="form-group">
                                                    <label for="job_title">Vacancy / Reference No.</label>
                                                    <input type="text" class="form-control" id="vacancy_no" name="vacancy_no" value="{{$vacancy_no}}">
				  		</div>
				  		<div class="form-group">
                                                    <label for="category_id"> Job Category</label>
                                                    <select class="form-control" style="text-transform: uppercase;" name="category_id" id="category_id">
                                                        <option value="{{$category_id}}">{{$category_title}}</option>
                                                        @foreach($categories as $categories)
                                                        <option value="{{$categories->category_id}}">{{$categories->category_title}}</option>
                                                        @endforeach
                                                    </select>
					  	</div>
                                                <div class="form-group">
                                                    <label for="job_type_id"> Job Type</label>
                                                    <select class="form-control" style="text-transform: uppercase;" name="job_type_id" id="job_type_id">
                                                        <option value="{{$job_type_id}}">{{$job_type_title}}</option>
                                                        @foreach($job_type as $job_type)
                                                        <option value="{{$job_type->job_type_id}}">{{$job_type->job_type_title}}</option>
                                                        @endforeach
                                                    </select>
					  	</div>
					  	<div class="form-group">
                                                    <label for="city_id">Main City</label>
                                                    <select class="form-control" style="text-transform: uppercase;" name="city_id" id="city_id">
                                                        <option value="{{$city_id}}">{{$city_name}}</option>
                                                        @foreach($cities as $city)
                                                        <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                                        @endforeach
                                                    </select>
			  			</div>
                                                <div class="form-group">
                                                    <label for="travel_required">Travel to other cities?</label>
                                                    <select class="form-control" style="text-transform: uppercase;" name="travel_required" id="travel_required">
                                                        <option value="{{$travel_required}}">{{$travel_required}}</option>
                                                        <option value="NO">NO</option>
                                                        <option value="YES">YES</option>
                                                    </select>
			  			</div>
						<div class="form-group">
                                                    <label for="other_locations">Other Cities</label>
                                                    <input type="text" class="form-control" id="other_locations" name="other_locations" value="{{$other_locations}}">
			  			</div>
                                            
                                                <div class="form-group">
                                                    <label for="no_vacancy">No. of Vacancies</label>
                                                    <input type="text" class="form-control" id="no_vacancy" name="no_vacancy" value="{{$no_vacancy}}"  required="required" onkeypress='return isNumberKey(event)' >
			  			</div>
                                                <div class="form-group">
                                                    <label for="job_salary">Salary Details</label>
                                                    <input type="text" class="form-control" id="job_salary" name="job_salary" value="{{$job_salary}}">
			  			</div>
                                                <div class="form-group">
                                                    <label for="date_expiry">Closing Date</label>
                                                    <input type="text" class="form-control" id="datepicker" name="date_expiry" value="{{$date_expiry}}"  required="required">
			  			</div>
                                                
                                                <div class="form-group">
					    	<label for="job_details">Job Description / Summary</label>
                                                <textarea  class="form-control ckeditor" name="job_details" id="job_details">{!!$job_details!!}</textarea>
			  			</div>
                            
                                                <div class="form-group">
					    	<label for="duty_responsibilities">Duty / Responsibilities</label>
                                                <textarea  class="form-control ckeditor" name="duty_responsibilities" id="duty_responsibilities">{!!$duty_responsibilities!!}</textarea>
			  			</div>
                            
                                                
                                                
			</div>
			  		<div class="col-md-6">
                                            
                                            <div class="form-group">
                                                    <label for="qualification_required">Education Requirement</label>
                                                    <textarea  class="form-control ckeditor" name="qualification_required" id="qualification_required">{!!$qualification_required!!}</textarea>
			  			</div>
                                            
                                           	<div class="form-group">
                                                    <label for="experience_required">Experience Requirement</label>
                                                    <textarea  class="form-control ckeditor" name="experience_required" id="experience_required">{!!$experience_required!!}</textarea>
			  			</div>
                                                
                                            <div class="form-group">
                                                    <label for="skills_required">Skills Requirement</label>
                                                    <textarea  class="form-control ckeditor" name="skills_required" id="skills_required">{!!$skills_required!!}</textarea>
			  			</div>
                                            
                                                <div class="form-group">
                                                    <label for="apply_guidance">Submission Guideline</label>
                                                    <textarea  class="form-control ckeditor" name="apply_guidance" id="apply_guidance">{!!$apply_guidance!!}</textarea>
			  			</div>
			  			
					</div>
                     
            </div>
                                 
            <div class="col-md-12">
	       <div class="col-md-12">
                   <input type="checkbox" name="agree" required="required"> <span class="text-danger" style="color:#a94442">I hereby confirm that the information given in this form is true, complete, accurate and this job vacancy is fully genuine. </span>
               </div>
                                                <br><br>
                                                <div class="col-md-12">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; SAVE CHANGES</button>
                                                </div>
                <br><br><br>

                     </div>

         </form>
            
	
            <div class="col-md-12">
                             @include('layouts.contactus_bar')
                <br>
            </div>
            
			
        </div>

@endsection

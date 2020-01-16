@extends('layouts.master')

@section('title')
{{Session::get('company_name')}} - ADD NEW VACANCY
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>ADD NEW JOB VACANCY. &nbsp; اعلان وظیفه جدید را نشر کنید</h5>
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
			<p class="service-note">PLEASE NOTE</p>
                        <span style="font-size:14px">Every job vacancy you post here will be thoroughly checked for reliability. It shall be visible on site once we verify its genuineness. The process takes 24 hours max.</span>
                        <br>
                        <span style="font-size:14px">
						تاسې چې دلته هره دنده اعلانوی د کره توب په اړه به یې پلټنه کېږي. یو ځل چې زموږ لخوا تظمین شي، پر وېبپاڼه به یې اعلان را څرګند شي. دا پروسه ۲۴ ساعته یا کم وخت نیسي
                        </span>
                        </div>
		</div>
	    </div>
	</article>  
                <br>
            </div>

          
       <form style="color:#EB9316;" action="{{URL::to('add_job_query')}}" class="cmxform" id="addjob" method="post" role="form">

            <div class="col-md-12">
                			<div class="col-md-6 form-line">
                                            
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

			  			<div class="form-group">
                                                    <label for="job_title">Job Title </label>
                                                    <input type="text" class="form-control" id="job_title" name="job_title" placeholder=" Enter Job Title">
				  		</div>
                                                <div class="form-group">
                                                    <label for="job_title">Vacancy / Reference No.</label>
                                                    <input type="text" class="form-control" id="vacancy_no" name="vacancy_no" placeholder=" Enter vacancy / reference number, if known.">
				  		</div>
				  		<div class="form-group">
                                                    <label for="category_id"> Job Category</label>
                                                    <select class="form-control" style="text-transform: uppercase;" name="category_id" id="category_id">
                                                        @foreach($categories as $categories)
                                                        <option value="{{$categories->category_id}}">{{$categories->category_title}}</option>
                                                        @endforeach
                                                    </select>
					  	</div>
                                                <div class="form-group">
                                                    <label for="job_type_id"> Job Type</label>
                                                    <select class="form-control" style="text-transform: uppercase;" name="job_type_id" id="job_type_id">
                                                        @foreach($job_type as $job_type)
                                                        <option value="{{$job_type->job_type_id}}">{{$job_type->job_type_title}}</option>
                                                        @endforeach
                                                    </select>
					  	</div>
					  	<div class="form-group">
                                                    <label for="city_id">Main City</label>
                                                    <select class="form-control" style="text-transform: uppercase;" name="city_id" id="city_id">
                                                        @foreach($cities as $city)
                                                        <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                                        @endforeach
                                                    </select>
			  			</div>
                                                <div class="form-group">
                                                    <label for="travel_required">Travel to other cities?</label>
                                                    <select class="form-control" style="text-transform: uppercase;" name="travel_required" id="travel_required">
                                                        <option value="NO">NO</option>
                                                        <option value="YES">YES</option>
                                                    </select>
			  			</div>
						<div class="form-group">
                                                    <label for="other_locations">Other Cities</label>
                                                    <input type="text" class="form-control" id="other_locations" name="other_locations" placeholder="Kabul, Kandahar, Khost, Balkh">
			  			</div>
                                            
                                                <div class="form-group">
                                                    <label for="no_vacancy">No. of Vacancies</label>
                                                    <input type="text" class="form-control" id="no_vacancy" name="no_vacancy" value="1" onkeypress='return isNumberKey(event)' >
			  			</div>
                                                <div class="form-group">
                                                    <label for="job_salary">Salary Details</label>
                                                    <input type="text" class="form-control" id="job_salary" name="job_salary" value="As per company salary scale">
			  			</div>
                                                <div class="form-group">
                                                    <label for="date_expiry">Closing Date</label>
                                                    <input type="text" class="form-control" id="datepicker" name="date_expiry">
			  			</div>
                                                
                                                <div class="form-group">
					    	<label for="job_details">Job Description / Summary</label>
                                                <textarea  class="form-control ckeditor" name="job_details" id="job_details"></textarea>
			  			</div>
                            
                                                <div class="form-group">
					    	<label for="duty_responsibilities">Duty / Responsibilities</label>
                                                <textarea  class="form-control ckeditor" name="duty_responsibilities" id="duty_responsibilities"></textarea>
			  			</div>
                            
                                                
                                                
			</div>
			  		<div class="col-md-6">
                                            
                                            <div class="form-group">
                                                    <label for="qualification_required">Education Requirement</label>
                                                    <textarea  class="form-control ckeditor" name="qualification_required" id="qualification_required"></textarea>
			  			</div>
                                            
                                           	<div class="form-group">
                                                    <label for="experience_required">Experience Requirement</label>
                                                    <textarea  class="form-control ckeditor" name="experience_required" id="experience_required"></textarea>
			  			</div>
                                                
                                            <div class="form-group">
                                                    <label for="skills_required">Skills Requirement</label>
                                                    <textarea  class="form-control ckeditor" name="skills_required" id="skills_required"></textarea>
			  			</div>
                                            
                                                <div class="form-group">
                                                    <label for="apply_guidance">Submission Guideline</label>
                                                    <textarea  class="form-control ckeditor" name="apply_guidance" id="apply_guidance"></textarea>
			  			</div>
			  			
					</div>
                     
            </div>
                                 
            <div class="col-md-12">
	       <div class="col-md-12">
                   <input type="checkbox" name="agree" required="required"> <span class="text-danger" style="color:#a94442">I hereby confirm that the information given in this form is true, complete, accurate and this job vacancy is fully genuine. </span>
                                                </div>
                                                <br><br>
                                                <div class="col-md-12">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; ADD JOB VACANCY</button>
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

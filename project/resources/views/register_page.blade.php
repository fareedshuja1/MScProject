@extends('layouts.master')

@section('title')
Create New Account
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Create New Account / اکاونت جدید بسازید</h5>
        </div>
    </div>
@endsection

@section('main_content')
	<div class="tabbable-panel">
            
         @if (session('warning'))
         <div class="alert alert-danger fade in">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <i class=""></i> <strong align="center">{{session('warning')}}</strong>
         </div>
         @endif
         
          @if (session('success'))
         <div class="alert alert-success fade in">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <i class=""></i> <strong align="center">{{session('success')}}</strong>
         </div>
         @endif
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" class="blue" data-toggle="tab"><b>Register As Company</b></a>
						</li>
						<li>
							<a href="#tab_default_2" class="blue" data-toggle="tab"><b>Register As Jobseeker</b></a>
						</li>
						
					</ul>
					<div class="tab-content">
		<div class="tab-pane active" id="tab_default_1">
		    <p> &nbsp;</p>
			<div class="container">
                            <form style="color:#EB9316;" action="register_company" class="cmxform" id="signupForm" method="post" role="form" enctype="multipart/form-data">
				    <div class="col-md-6 form-line">
                                            
                                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

			  			<div class="form-group">
                                                    <label for="company_name">Company Name <span style="color:red">*</span></label>
                                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder=" Enter Company Full Name">
				  		</div>
				  		<div class="form-group">
                                                    <label for="email"> Email Address <span style="color:red">*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder=" Enter Email Address">
					  	</div>	
					  	<div class="form-group">
                                                    <label for="password">Choose Password <span style="color:red">*</span></label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Minimum 8 Characters">
			  			</div>
						<div class="form-group">
                                                    <label for="confirm_password">Confirm Password <span style="color:red">*</span></label>
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
			  			</div>
                                            
                                                <div class="form-group">
                                                    <label for="company_website">Company Website</label>
                                                    <input type="text" class="form-control" id="company_website" name="company_website">
			  			</div>
			  	    </div>
			  		<div class="col-md-6">
					    <div class="form-group">
					    	<label for="">Industry Type <span style="color:red">*</span></label>
                                                <select class="form-control" style="text-transform: uppercase;" name="company_type_id">
                                                  
                                                    @foreach($data as $data)
                                                    <option value="{{$data->company_type_id}}">{{$data->company_type_title}}</option>
                                                    @endforeach
                                                    
                                                    
                                                </select> 
			  			</div>
                                                <div class="form-group">
                                                    <label for="phone_number">Phone Number</label>
                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="0093 020 1234567">
			  			</div>
						<div class="form-group">
                                                    <label for="">Company Logo (jpg, jpeg, png files only)</label>
                                                    <input type="file" class="form-control" name="company_logo">
			  			</div>
			  			<div class="form-group">
                                                    <label for="company_details">About Company <span style="color:red">*</span></label>
                                                    <textarea  class="form-control" name="company_details" id="company_details" placeholder="Please write company details here."></textarea>
			  			</div>
			  			<div class="form-group">
                                                    <button type="submit" class="btn btn-warning"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Register</button>
			  			</div>
			  			
					</div>
				</form>
			</div>
			<p> &nbsp;</p>
		</div>
				<div class="tab-pane" id="tab_default_2">
							<p> &nbsp;</p>
                            <form style="color:#EB9316;" action="register_jobseeker" class="cmxform" id="register_jobseeker" method="post" role="form" enctype="multipart/form-data">
					<div class="col-md-6 form-line">
                                            
                                                                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                                                                    
			  			<div class="form-group">
                                                    <label for="jobseeker_name">Full Name <span style="color:red">*</span></label>
                                                    <input type="text" class="form-control" id="jobseeker_name" name="jobseeker_name" placeholder="Enter Your Full Name">
				  		</div>
				  		<div class="form-group">
                                                    <label for="login_email"> Email Address <span style="color:red">*</span></label>
                                                    <input type="email" class="form-control" id="login_email" name="login_email" placeholder=" Enter Email Address">
					  	</div>	
					  	<div class="form-group">
                                                    <label for="loginn_password">Choose Password <span style="color:red">*</span></label>
                                                    <input type="password" class="form-control" id="loginn_password" name="loginn_password" placeholder="Minimum 8 Characters">
			  			</div>
						<div class="form-group">
                                                    <label for="confirm_password">Confirm Password <span style="color:red">*</span></label>
                                                    <input type="password" class="form-control" id="confirm_password2" name="confirm_password2">
			  			</div>
			  		</div>
			  		<div class="col-md-6">
					        <div class="form-group">
                                                    <label for="jobseeker_coverletter">Personal Statement</label>
                                                    <textarea  class="form-control" id="jobseeker_coverletter" name="jobseeker_coverletter" placeholder="Please tell us more about yourself. Like your core skills, education and work experience."></textarea>
			  			</div>
                                                <div class="form-group">
                                                    <label for="confirm_password">Phone No.</label>
                                                    <input type="text" class="form-control" id="jobseeker_phone" name="jobseeker_phone" placeholder="0093123456789">
			  			</div>
						<div class="form-group">
                                                    <label for="jobseeker_cv">Resume / CV  (MS Word, Pdf files only)</label>
                                                    <input type="file" name="jobseeker_cv" id="jobseeker_cv" class="form-control">
			  			</div> 
			  			
			  			<div class="form-group">
                                                    <button type="submit" class="btn btn-warning"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Register</button>
			  			</div>
			  			
					</div>
				    </form>
				    <p> &nbsp;</p>
				</div>
						
					</div>
				</div>
			</div>
@endsection
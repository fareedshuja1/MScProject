@extends('layouts.master')

@section('title')
Find a Job - Login
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Please login to continue / برای ادامه دادن لطفاً ایمیل و شفر تان درج کنید</h5>
        </div>
    </div>
@endsection

@section('main_content')
	
    <div class="col-md-4">
					
	<div class="job-side-wrap col-md-12">
		
            <h4>New to Findajob.af</h4>
	        <div class="centering">
                    <p>In order to apply for a job or post a new job vacancy, you must first create an account with us. Click on the link below to get started.
                    <a class="btn btn-default btn-blue" href="{{URL::to('register')}}">REGISTER NOW</a>
		</div>
	</div>
    </div>


    <div class="col-md-8">
    
        <div class="col-md-12">
            
            <div class="tabbable-panel">
            
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
				
	    <div class='panel-container'>
                
                <form style="color:#EB9316;" action="auth_login" method="post" class="cmxform" id="loginForm" role="form">
                    <div class="row">
                            <div class="col-md-12 form-line">

                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                               
                                
                                @if(session('job_id') && session('job_title'))
                                <input type="hidden" name="job_id" value="{{session('job_id')}}">
                                <input type="hidden" name="job_title" value="{{session('job_title')}}">
                                @else
                                <input type="hidden" name="job_id" value="not_set">
                                <input type="hidden" name="job_title" value="not_set">
                                @endif
                                
                                 @if(session('jobseeker_id') && session('jobseeker_name'))
                                <input type="hidden" name="jobseeker_id" value="{{session('jobseeker_id')}}">
                                <input type="hidden" name="jobseeker_name" value="{{session('jobseeker_name')}}">
                                @else
                                <input type="hidden" name="jobseeker_id" value="not_set">
                                <input type="hidden" name="jobseeker_name" value="not_set">
                                @endif
                                
                                <div class="form-group">
                                    <label for="email"> Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>	

                                <div class="form-group">
                                    <label for="login_password">Password</label>
                                    <input type="password" class="form-control" id="login_password" name="login_password">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="password">Login As</label>
                                    <select class="form-control selectpicker" data-live-search="true" name="login_type">
                                        <option value="JOBSEEKER">Login As Jobseeker</option>
                                        <option value="COMPANY">Login As Company</option>
                                    </select>
                                </div>
                                
                                 <div class="form-group">
                                <button type="submit" class="btn btn-warning">LOGIN</button> 
                                </div>
                                
                                <div class="form-group">
                                <a href="{{URL::to('reset_password')}}" class="label label-danger">Forget Password</a>
                                </div>   

                            </div>
                    </div>
                    
                   
                </form>
                
            </div>				    
                                            
	</div>
				
            
        </div>
    
    </div>


@endsection
@extends('layouts.master')

@section('title')
Find a Job - Login
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Please login to continue</h5>
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
         
          @if (session('success'))
         <div class="alert alert-success fade in">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <i class=""></i> <strong align="center">{{session('success')}}</strong>
         </div>
         @endif
				
	    <div class='panel-container'>
                
                <form style="color:#EB9316;" action="{{URL::to('jobseeker_login')}}" method="post" class="cmxform" id="loginForm" role="form">
                    <div class="row">
                            <div class="col-md-12 form-line">

                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                
                                <input type="hidden" name="login_type" value="JOBSEEKER">

                                <div class="form-group">
                                    <label for="email"> Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>	

                                <div class="form-group">
                                    <label for="login_password">Password</label>
                                    <input type="password" class="form-control" id="login_password" name="login_password">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="password">Login As : Job Seeker / Applicant</label>
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
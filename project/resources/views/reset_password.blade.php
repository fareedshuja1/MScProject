@extends('layouts.master')

@section('title')
Reset Password - Findajob.af | Find jobs in Afghanistan
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Reset Password</h5>
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
                
                <form style="color:#EB9316;" action="reset_password_link" method="post" class="cmxform" id="reset_password_query" role="form">
                    <div class="row">
                            <div class="col-md-12 form-line">

                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                                <div class="form-group">
                                    <label for="email"> Enter Email Address</label>
                                    <br>
                                    <span style="color:#999">A password reset link will be sent to the email address you provide.</span>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>	
                                
                                 <div class="form-group">
                                <button type="submit" class="btn btn-warning">Reset Password</button> 
                                </div>
                                
                            </div>
                    </div>
                    
                   
                </form>
                
            </div>				    
                                            
	</div>
				
            
        </div>
    
    </div>


@endsection
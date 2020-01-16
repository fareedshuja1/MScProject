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
                
                <form action="{{URL::to('change_passwordquery')}}" class="cmxform" method="post" id="reset_change_password" role='form'>
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    
                    <input type = "hidden" name = "encrypt_email" value = "<?php echo $encrypt_email; ?>">

                                <div class="form-group">
                                    <label class="text-danger"><strong>New Password</strong></label>
                                    <input type="password" name="new_password" placeholder="Please enter a new password" id="new_password" class="form-control">
                                </div>
                    
                                <div class="form-group">
                                    <label class="text-danger"><strong>Confirm New Password</strong></label>
                                    <input type="password" name="confirm_new_password" placeholder="Please confirm a new password" id="confirm_new_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Change Password</button>
			        </div>
                </form>
                
            </div>				    
                                            
	</div>
				
            
        </div>
    
    </div>


@endsection
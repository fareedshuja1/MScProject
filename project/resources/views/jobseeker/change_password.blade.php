@extends('layouts.master')

@section('title')
{{Session::get('jobseeker_name')}} -  Change Password | Findajob.af
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Change Password</h5>
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
             
              @if (session('warning'))
                 <div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center">{{session('warning')}}</strong>
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
                
                <form action="change_password_query" class="cmxform" method="post" id="jobs_change_password" role='form'>
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
               
                                <div class="form-group">
                                    <label class="text-danger"><strong>Old Password</strong></label>
                                    <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Please enter your previous password.">
                                </div>
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

@endsection

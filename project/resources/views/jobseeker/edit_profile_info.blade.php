@extends('layouts.master')

@section('title')
{{Session::get('jobseeker_name')}} -  Edit Profile | Findajob.af
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Edit Profile Information</h5>
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
                
                <form action="edit_profile_query" class="cmxform" method="post" id="jobseeker_edit_profile" role='form'>
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
               
                                <div class="form-group">
                                    <label class="text-danger"><strong>Full Name</strong></label>
                                    <input type="text" name="jobseeker_name" id="jobseeker_name" value="{{$jobseeker_name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-danger"><strong>Phone No.</strong></label>
                                    <input type="text" name="jobseeker_phone" placeholder="0093123456789" id="jobseeker_phone" value="{{$jobseeker_phone}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-danger"><strong>Copy & Paste LinkedIn Profile URL</strong></label>
                                    <input type="text" placeholder="https://linkedin.com/yourprofileid-123456" name="jobseeker_linkedin" id="jobseeker_linkedin" value="{{$jobseeker_linkedin}}" class="form-control">  
                                </div>
                                <div class="form-group">
                                    <label class="text-danger"><strong>Personal Statement</strong></label>
                                    <textarea  class="form-control ckeditor" name="jobseeker_coverletter" id="jobseeker_coverletter">
                                    {{$jobseeker_coverletter}}
                                    </textarea>                                
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Save Changes</button>
			        </div>
                </form>
            </div>
            
            
			
	   
           <div class="col-md-12">
                                                   @include('layouts.contactus_bar')

                                      <br>
                                  </div>
			
        </div>

@endsection

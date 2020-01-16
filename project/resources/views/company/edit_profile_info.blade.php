@extends('layouts.master')

@section('title')
{{Session::get('company_name')}} | Edit Profile | Findajob.af | Find jobs in Afghanistan
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
             
             @if (session('warning'))
                 <div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center">{{session('warning')}}</strong>
                 </div>
             @endif
        </div>

	<div class="col-md-3">
	 <!--widget start-->
           @include('layouts.company_sidebar')
         <!--widget end-->
	</div>


        <div class="col-md-9">
          
            <div class="col-md-12">
                
                <form action="cedit_profile_query" class="cmxform" method="post" id="company_edit_profile" role='form'>
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
               
                                <div class="form-group">
                                    <label class="text-danger"><strong>Company Name</strong></label>
                                    <input type="text" name="company_name" id="company_name" value="{{$company_name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-danger"><strong>Phone No.</strong></label>
                                    <input type="text" name="phone_number" placeholder="0093 020 1234567" id="jobseeker_phone" value="{{$phone_number}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-danger"><strong>Website (Copy & Paste the URL)</strong></label>
                                    <input type="text" placeholder="https://example.com" name="company_website" id="company_website" value="{{$company_website}}" class="form-control">  
                                </div>
                                <div class="form-group">
                                    <label class="text-danger"><strong>Office Address</strong></label>
                                    <input type="text" placeholder="Please enter full address" name="company_address" id="company_address" value="{{$company_address}}" class="form-control">  
                                </div>
                                <div class="form-group">
                                    <label class="text-danger"><strong>Industry Type</strong></label>
                                    <select class="form-control" style="text-transform: uppercase;" name="company_type_id">
                                                    <option value="{{$company_type_id}}">{{$company_type_title}}</option>
                                                      @foreach($types as $types)
                                                    <option value="{{$types->company_type_id}}">{{$types->company_type_title}}</option>
                                                    @endforeach                                                   
                                    </select>                                 
                                </div>
                                <div class="form-group">
                                    <label class="text-danger"><strong>About Company</strong></label>
                                    <textarea  class="form-control ckeditor" name="company_details" id="company_details">
                                    {{$company_details}}
                                    </textarea>                                
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Save Changes</button>
			        </div>
                </form>
            </div>
			
	   
          
        </div>

@endsection

@extends('layouts.master')

@section('title')
Contact Us - Findajob.af | Find jobs in Afghanistan
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Contact Us</h5>
        </div>
    </div>
@endsection

@section('main_content')
	
    <div class="col-md-4">
      @include('layouts.adverts')
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
                
                <form style="color:#EB9316;" action="{{URL::to('contact_us_query')}}" method="post" class="cmxform" id="contact_us_query" role="form">
                    <div class="row">
                            <div class="col-md-12 form-line">

                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                
                                 <div class="form-group">
                                     <label for="email"> Your Name</label> <span style="color: red"> *</span>
                                    <input type="text" class="form-control" id="full_name" placeholder="Enter your full name" name="full_name">
                                </div>	

                                <div class="form-group">
                                    <label for="email"> Email Address</label> <span style="color: red"> *</span>
                                    <input type="email" class="form-control" id="email_address" placeholder="Enter your email address" name="email_address">
                                </div>	

                                <div class="form-group">
                                    <label for="login_password">Subject</label> <span style="color: red"> *</span>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="password">Your Message</label> <span style="color: red"> *</span>
                                    <textarea class="form-control" rows="7" name="message" placeholder="Write your message here."></textarea>
                                </div>
                                
                                <div class="form-group">
                                <button type="submit" class="btn btn-warning"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp;Sent Message</button> 
                                </div>
                                
                            </div>
                    </div>
                    
                   
                </form>
                
            </div>				    
                                            
	</div>
				
            
        </div>
    
    </div>


@endsection
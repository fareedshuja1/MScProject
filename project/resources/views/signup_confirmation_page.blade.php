@extends('layouts.master')

@section('title')
Find a Job - Login
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Thank you for creating an account with us.</h5>
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
               @include('layouts.contactus_bar')
            </div>				    
                                            
	</div>
				
            
        </div>
    
    </div>


@endsection
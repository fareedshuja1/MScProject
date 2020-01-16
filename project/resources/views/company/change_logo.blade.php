@extends('layouts.master')

@section('title')
{{Session::get('company_name')}} | Change Logo | Findajob.af | Find jobs in Afghanistan
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Change Logo</h5>
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
                
                <form action="change_logo_query" class="cmxform" method="post" id="change_logo" role='form' enctype="multipart/form-data">
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    
                    <input type="hidden" name="old_logo" value="<?php echo $old_logo; ?>">
                                   
                                <div class="form-group">
                                    <label class="text-danger"><strong>JPG, JPEG, & PNG FILES ONLY</strong></label><br>
                                    <label>If you upload a new logo, it will replace your existing logo in our system.</label>
                                    <input type="file" name="company_logo" id="company_logo" class="form-control">
                                </div>
                              
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Change Logo</button>
			        </div>
                </form>
                
                <hr><br>
                
                <div class="form-group">
                    <img src="<?=asset('project/storage');?>/app/company_logo/{{$old_logo}}" alt="Logo" style="width: 60%; height: auto" class="center-block img-responsive img-thumbnail">
                </div>
                
               
                
            </div>

			
        </div>

@endsection

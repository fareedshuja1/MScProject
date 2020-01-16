@extends('layouts.master')

@section('title')
{{Session::get('jobseeker_name')}} -  Change CV | Findajob.af
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Change CV / Resume</h5>
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
                
                <form action="change_cv_query" class="cmxform" method="post" id="change_cv" role='form' enctype="multipart/form-data">
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    
                    <input type="hidden" name="old_cv" value="{{$jobseeker_cv}}">
               
                                <div class="form-group">
                                    <label class="text-danger"><strong>DOC, DOCX, PDF FILES ONLY</strong></label><br>
                                    <label>If you upload a new resume, it will replace your existing resume in our system.</label>
                                    <input type="file" name="jobseeker_cv" id="jobseeker_cv" class="form-control">
                                </div>
                              
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Upload CV</button>
			        </div>
                </form>
                
                                @if($jobseeker_cv == '')
                                <span class="text-danger">You have not uploaded any resume yet.</span>
                                @else
                                <a href='<?=asset('project/storage');?>/app/jobseekers_cvs/{{$jobseeker_cv}}' class="btn btn-info" target='_blank'>VIEW EXISTING CV/RESUME</a>

                                @endif
                    
                
            </div>

			
        </div>

@endsection

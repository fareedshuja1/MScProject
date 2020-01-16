@extends('layouts.master')

@section('title')
{{Session::get('jobseeker_name')}} -  Findajob.af
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>{{Session::get('jobseeker_name')}} -  Jobs History</h5>
        </div>
    </div>
@endsection

@section('main_content')
    

       

	<div class="col-md-3">
	 <!--widget start-->
           @include('layouts.jobseeker_sidebar')
         <!--widget end-->
	</div>


        <div class="col-md-9">
            
             <div class="col-md-12">
                 <div class="alert alert-success fade in">
                    <i class=""></i> <strong align="center">You have previously applied for following positions.</strong>
                 </div>
        </div>
          
            <div class="col-md-12">
                @foreach($sql as $sql)                                    

            <div class="recent-job-list-home">
		<div class="col-md-7 job-list-desc">
                    <h6 style="margin-bottom: 3px">
                        <strong>
                            <a href="{{URL::to('jobdetails/'.$sql->job_id.'/'.str_replace(' ', '_', $sql->job_title))}}">{{$sql->job_title}}</a>
                        </strong>
                    </h6>
                    <p><i style="color:#27a2f8" class="fa fa-tags"></i>&nbsp;{{$sql->category_title}}</p>
		</div>
						
                <div class="col-md-5 full">
			<div class="row">
                            <div class="job-list-location col-md-6">
			        <h6 title="Job location"><i class="fa fa-map-marker"></i>{{$sql->city_name}}</h6>
			    </div>
								
                            <div class="job-list-type col-md-6">
                                <h6 title="Date applied for this job"><i style="color:#27a2f8" class="fa fa-calendar"></i>{{$sql->exd}}</h6>
			    </div>
			</div>
		</div>
						
                <div class="clearfix"></div>
            </div>
        
        @endforeach
            </div>
			
	   
           <div class="col-md-12">
            @include('layouts.contactus_bar')
              <br>
           </div>
			
        </div>

@endsection

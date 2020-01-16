@extends('layouts.master')

@section('title')
{{Session::get('company_name')}}
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>UNVERIFIED JOB VACANCIES</h5>
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
           @include('layouts.company_sidebar')
         <!--widget end-->
	</div>


        <div class="col-md-9">
            
            <div class="col-md-12">
                @if($total > 0)
                 <div class="alert alert-danger fade in">
                    <i class=""></i> <strong align="center">Following job vacancies are currently under review by team Findajob.af. It shall be visible on the site for jobseekers once we verify its genuineness. The process takes maximum 24 hours.</strong>
                 </div>
                @else 
                <div class="alert alert-success fade in">
                    <i class=""></i> <strong align="center">You currently do not have any unverified job vacancies.</strong>
                 </div>
                @endif
           </div>
          
             @foreach($sql as $sql)                                    

           <div class="recent-job-list-home">
		<div class="col-md-6 job-list-desc">
                    <h6 style="margin-bottom: 4px">
                        <strong>
                            <a href="{{URL::to('jobdetails/'.$sql->job_id.'/'.str_replace(' ', '_', $sql->job_title))}}">{{$sql->job_title}}</a>
                        </strong>
                    </h6>
                    <p><i style="color:#27a2f8" class="fa fa-tags"></i>&nbsp;{{$sql->category_title}}</p>
		</div>
						
                <div class="col-md-6 full">
			<div class="row">
                            				
                            <div class="job-list-location col-md-8" style="border-right:1px solid #e3e3e3;">
				<h6><i style="color:#27a2f8" class="fa fa-map-marker"></i>&nbsp;{{$sql->city_name}}</h6>
			    </div>
                            
                            <div class="job-list-type col-md-4" >
                                &nbsp;&nbsp;<a class="btn btn-danger" href="{{URL::to('editjob/'.$sql->job_id.'/'.str_replace(' ', '_', $sql->job_title))}}">EDIT</a>
			    </div>
				
			</div>
		</div>
						
                <div class="clearfix"></div>
            </div>
        
        @endforeach
        
        <div class="col-md-12">
                @include('layouts.contactus_bar')
           <br>
           </div>

            </div>
			
	   
           
			
        </div>

@endsection

@extends('layouts.master')

@section('title')
{{$company_name}} - Findajob.af | Find jobs in Afghanistan
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>All jobs by {{$company_name}}</h5>
        </div>
    </div>
@endsection

@section('main_content')

	<div class="col-md-4">
	    
            <div class="col-md-12">
		@include('layouts.registernow_widget')
	    </div>	
	</div>


        <div class="col-md-8">
          <div class="col-md-12">
        <span class="btn btn-warning btn-sm" onclick="window.history.go(-1); return false;"> <i class="fa fa-arrow-left"></i> <b>&nbsp;PREVIOUS PAGE</b></span>
        <div class="spc"></div>
        
        @foreach($sql as $sql)                                    

           <div class="recent-job-list-home">
		<div class="col-md-7 job-list-desc">
                    <h6 style="margin-bottom: 3px">
                        <strong>
                            <a href="{{URL::to('jobdetails/'.$sql->job_id.'/'.str_replace(' ', '_', $sql->job_title))}}">{{$sql->job_title}}</a>
                        </strong>
                    </h6>
                    <p title="Job Category"><i style="color:#27a2f8" class="fa fa-tags"></i>&nbsp;{{$sql->category_title}}</p>
		</div>
						
                <div class="col-md-5 full">
			<div class="row">
                            <div class="job-list-location col-md-6">
                                <h6 title="Job Location / City"><i class="fa fa-map-marker"></i>{{$sql->city_name}}</h6>
			    </div>
								
                            <div class="job-list-type col-md-6">
                                <h6 title="Expiry / Closing Date"><i class="fa fa-calendar"></i>{{$sql->exd}}</h6>
			    </div>
			</div>
		</div>
						
                <div class="clearfix"></div>
            </div>
        
        @endforeach

        </div>
            

        </div>

@endsection

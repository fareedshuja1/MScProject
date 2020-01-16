@extends('layouts.master')

@section('title')
Find a job in Afghanistan. 
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>
                <span>Find your dream job with us.</span>
                <span> وظیفه مورد پسند تان را با ما دریافت کنید</span>
            </h5>
                 @include('layouts.search_form')
        </div>
    </div>
@endsection


@section('main_content')

                <div class="row">
                    
                    <div class="col-md-4 hidden-xs hidden-sm">
                        @include('layouts.category_panel')
                    </div>
                    
                    <div class="col-md-8">

                           <blockquote style="margin-top: 20px;border-left: 4px solid #EB9316;"> 
                                <p style="color:#eda847; font-size: 16px;"><b>{{$count}} JOBS AVAILABLE</b></p> 
	                        
                            </blockquote>
       						
				<div class='panel-container'>
				<div id="all">
					
                                    @foreach($data as $sql)                                    
                                    
                                    <div class="recent-job-list-home">
						
                                                <div class="col-md-6 job-list-desc">
                                                    <h6 style="margin-bottom: 3px">
                                                        <b>
                                                            <a href="{{URL::to('jobdetails/'.$sql->job_id.'/'.str_replace(' ', '_', $sql->job_title))}}">{{$sql->job_title}}
                                                            </a>
                                                        </b>
                                                    </h6>
                                                    <h6 title="EMPLOYER / COMPANY"><u><a href="{{URL::to('cdetails/'.$sql->company_id.'/'.str_replace(' ', '_', $sql->company_name))}}">{{$sql->company_name}}</a></u></h6>
						</div>
						
                                                <div class="col-md-6 full">
							<div class="row">
                                                            <div class="job-list-location col-md-6">
                                                                <h6 title="Job Location"><i class="fa fa-map-marker"></i>{{$sql->city_name}}</h6>
								</div>
								
                                                                <div class="job-list-type col-md-6">
                                                                    <h6 title="Expiry / Closing Date"><i class="fa fa-calendar"></i>{{$sql->exd}}</h6>
								</div>
							</div>
						</div>
						
                                            <div class="clearfix"></div>
                                                
			            </div>
                                    
                                    @endforeach
						
						<!-- Start Pagination -->
								  <nav>
								  <ul class="pagination">
									<li>
									  <a href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									  </a>
									</li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li>
									  <a href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									  </a>
									</li>
								  </ul>
								</nav>
                                		<!-- End Pagination -->                                           
				    </div>
				</div>
                    </div>
                </div>
@endsection
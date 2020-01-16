@extends('layouts.master')

@section('title')
Contact Us - Findajob.af | Find jobs in Afghanistan
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>{{$count}} scholarships found !</h5>
             
        </div>
    </div>
@endsection

@section('main_content')
	
    
    <div class="col-md-12">
        
                            <blockquote style="margin-top: 20px;border-left: 4px solid #EB9316;"> 
                                <p style="color:#9e805d; font-size: 20px;"><b>Education is the key to success</b></p> 
	                        <small> Apply for a scholarship today, and secure a bright future.</small>
                            </blockquote>
            				
	    <div class='panel-container'>
                <div id="all">
                 @foreach($sql as $sql)                                    
                   
                    <div class="recent-job-list-home">
						
                                                <div class="col-md-6 job-list-desc">
                                                    <h6 style="margin-bottom: 10px;font-size: 16px;">
                                                        <b>
                                                            <a href="{{URL::to('scholarship/'.$sql->sch_id)}}">{{$sql->sch_title}}
                                                            </a>
                                                        </b>
                                                    </h6>
                                                    <h6 title="INSTITUTE / UNIVERSITY"><i class="fa fa-university" style="color:#449a44"></i> &nbsp;{{$sql->institute_name}}</h6>
						</div>
						
                                                <div class="col-md-6 full">
							<div class="row">
                                                            
								<div class="job-list-location col-md-6">
                                                                    <h6 title="Degree Level"><i class="fa fa-graduation-cap" style="color:#449a44"></i> &nbsp;{{$sql->degree_level}}</h6>
								</div>
                                                                <div class="job-list-type col-md-6">
                                                                    <h6 title="Country"><i class="fa fa-globe" style="color:#5bc0de"></i>{{$sql->country_name}}</h6>
								</div>
							</div>
						</div>
						
                                            <div class="clearfix"></div>
                                                
			            </div>
                                    
                 @endforeach
                </div>
            </div>				    
    
    </div>


@endsection
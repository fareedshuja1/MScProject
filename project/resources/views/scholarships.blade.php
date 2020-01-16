@extends('layouts.master')

@section('title')
Contact Us - Findajob.af | Find jobs in Afghanistan
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Find a Scholarship with us !</h5>
             <form class="form-inline" role="form" action="{{URL::to('scholarship_search')}}" method="post">                        
                        
                        <div class="form-group cols-md-4 group-1">
                            <div class="input-group">
                                <span class="label-info input-group-addon"><span class="glyphicon glyphicon-search form-icon"></span></span>
                                <input type="text" class="form-control" name="keyword" id="keyword"  placeholder="ENTER TITLE OR KEYWORD"  style="min-width:240px; max-width: 100%" />
                            </div>
			</div>
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                    
                        <div class="form-group cols-md-3 group-1 ">
                                <div class="input-group">
                                  <span class="label-info input-group-addon"><span class="glyphicon glyphicon-globe form-icon"></span></span>
                                  <select class="form-control" name="country_id"  style="min-width:200px; max-width: 100%; text-transform: uppercase;" >
                                         <option value="0">CHOOSE COUNTRY</option>
                                        @foreach($countries as $country)
                                         <option value='{{$country->country_id}}'>{{$country->country_name}}</option>
                                        @endforeach
                                    </select>  
                                </div>
			</div>
						
			<div class="form-group cols-md-3 group-1 ">
                                <div class="input-group">
                                  <span class="label-info input-group-addon"><span class="fa fa-graduation-cap form-icon"></span></span> 
                                  <select class="form-control" name="degree_level" style="min-width:200px; max-width: 100%">
                                        <option value="0">CHOOSE DEGREE LEVEL</option>
                                        <option value="Diploma / Certificate">Diploma / Certificate</option>
                                        <option value="Bachelors Degree">Bachelors Degree</option>
                                        <option value="Masters Degree">Masters Degree</option>
                                        <option value="PhD">PhD</option>
                                    </select>
                                </div>
			</div>			
						
                        <div class="form-group cols-md-1">                       
                            <input type="submit" value="SEARCH" class="btn btn-warning form-top" style="margin-top: -1px">
                        </div>
                                            
		</form>
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
@extends('layouts.master')

@section('title')
{{Session::get('company_name')}}
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>{{Session::get('company_name')}}</h5>
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

	<div class="col-md-4">
	    <div class="col-md-12">
		<img src="<?=asset('project/storage');?>/app/company_logo/{{$company_logo}}" style="" class="center-block img-responsive">
		<br>
		<hr class="colorgraph">
	    </div>	
            
             <div class="job-side-wrap col-md-12">
		
            <h4>MANAGE JOB VACANCIES</h4>
            <p>You can post unlimited job vacancies for free.</p>
	        <div class="centering">
                    <a class="btn btn-default btn-blue" href="{{URL::to('add_vacancy')}}">POST A NEW JOB</a>
		</div>
                <div class="centering">
                    <a class="btn btn-default btn-blue2 btn-blue" href="{{URL::to('add_vacancy')}}">MANAGE PREVIOUS JOBS</a>
		</div>
            </div>
            
	</div>


        <div class="col-md-8">
          
            <div class="col-md-12">
		   
		<div class="tabbable-panel">
		        
                    <div class="tabbable-line">
					
                        <ul class="nav nav-tabs ">
                            
				<li class="active"><a href="#tab_default_1" class="blue" data-toggle="tab"><b>Company Profile</b></a></li>
				                                
				<li><a href="#tab_default_2" class="blue" data-toggle="tab"><b>Manage Jobs</b></a></li>
				
                                <li><a href="#tab_default_3" class="blue" data-toggle="tab"><b>General Settings</b></a></li>
						
			</ul>
                        
                        
			<div class="tab-content">
                            
			    <div class="tab-pane active" id="tab_default_1">
			    <p> &nbsp;</p>
			    <p style="text-align:justify">{{$company_details}}</p> 
			    <p> &nbsp;</p>
                             <div class="col-md-12">
                                        <div class="table-responsive">
                                                <table class="table  table-condensed table-responsive table-user-information" >
                                                        <tbody>
                                                                <tr>
                                                                <td><strong>Website</strong></td>
                                                                <td>{{$company_website}}</td>

                                                                <td><strong>Phone No.</strong></td>
                                                                <td>{{$phone_number}}</td>
                                                                </tr>

                                                        </tbody>
                                                </table>
                                        </div>
                                   </div>
                            
                             <div class="col-md-12">
                                    <article class="grid_8">
                                  <div class="note-container">
                                      <div class="note-content clearfix">
                                              <div class="bignote">
                                              <p class="service-note">Need a service? Just drop us a note!</p>
                                              <span>If you have any question regarding our services or need a custom service, please contact us.</span>
                                              </div>

                                          <div class="note-btnnn">
                                               <a href="#" class="btn btn-warning btn-md" target="_BLANK">CONTACT US</a>
                                          </div>
                                      </div>
                                  </div>
                              </article>  
                                      <br>
                                  </div>
			    </div>
			    
                            <div class="tab-pane" id="tab_default_2">
				<p> &nbsp;</p>
				
                                <table class="table table-responsive">
                                    
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>City</th>
                                            <th>Category</th>
                                            <th>Date Posted</th>
                                            <th>Expiry Date</th>
                                            <th>Is Verified</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td>Human Resource Officer</td>
                                            <td>Kabul</td>
                                            <td>Human Resource</td>
                                            <td>29/06/2017</td>
                                            <td>30/07/2017</td>
                                            <td>NO</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Human Resource Officer</td>
                                            <td>Kabul</td>
                                            <td>Human Resource</td>
                                            <td>29/06/2017</td>
                                            <td>30/07/2017</td>
                                            <td>NO</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Human Resource Officer</td>
                                            <td>Kabul</td>
                                            <td>Human Resource</td>
                                            <td>29/06/2017</td>
                                            <td>30/07/2017</td>
                                            <td>NO</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Human Resource Officer</td>
                                            <td>Kabul</td>
                                            <td>Human Resource</td>
                                            <td>29/06/2017</td>
                                            <td>30/07/2017</td>
                                            <td>NO</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                                
                                
				<p> &nbsp;</p>
			    </div>
			
                            <div class="tab-pane" id="tab_default_3">
				<p> &nbsp;</p>
				<p>General Settings</p>
				<p> &nbsp;</p>
			    </div>
						
			</div>
		    </div>
                </div>
	    </div>
			
	   
           
			
        </div>

@endsection

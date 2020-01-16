			    <div class="container">
                                <div class="media-top-right">
                                    
                                    
				<!--<ul class="media-top clearfix">
				<li class="item"><a href="#" target="blank"><i class="fa fa-twitter"></i></a></li>
				<li class="item"><a href="#" target="blank"><i class="fa fa-facebook"></i></a></li>
				<li class="item"><a href="#" target="blank"><i class="fa fa-linkedin"></i></a></li>
				</ul>-->
						
				<ul class="media-top-2 clearfix">
                                    
                                    <li style="margin-top: 5px;margin-bottom: 5px;">
                                        <a class="btn btn-success btn-sm"  href="{{URL::to('register')}}">REGISTER</a>
                                    </li>
				
                                <li style="margin-top: 5px;margin-bottom: 5px;">
                                <a class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#exampleModal1" data-whatever="@twbootstrap">LOGIN</a>


			        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			            <div class="modal-dialog">
					<div class="modal-content">
					    <div class="modal-body">
                                                <div class="row">
						    <div class="col-md-12">
                                                      <form action="{{URL::to('auth_login')}}" method="post" class="cmxform" role="form">
							<fieldset>
                                                            <h5>Please Login</h5>
				                        <hr class="colorgraph">
                                                        
                                                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                                        
                                                        @if(session('job_id') && session('job_title'))
                                                        <input type="hidden" name="job_id" value="{{session('job_id')}}">
                                                        <input type="hidden" name="job_title" value="{{session('job_title')}}">
                                                        @else
                                                        <input type="hidden" name="job_id" value="not_set">
                                                        <input type="hidden" name="job_title" value="not_set">
                                                        @endif
                                                        
                                                         @if(session('jobseeker_id') && session('jobseeker_id'))
                                                        <input type="hidden" name="jobseeker_id" value="{{session('jobseeker_id')}}">
                                                        <input type="hidden" name="jobseeker_id" value="{{session('jobseeker_id')}}">
                                                        @else
                                                        <input type="hidden" name="jobseeker_id" value="not_set">
                                                        <input type="hidden" name="jobseeker_id" value="not_set">
                                                        @endif
                                                        
							<div class="form-group group-1">
							    <div class="input-group">
                                                            <span class="btn-success input-group-addon form-icon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                                            <input type="email" class="form-control" id="email" name="email" required="required">
                                                            </div>
							</div>
                                                        
                                                        
							<div class="form-group group-1">
							<div class="input-group">
                                                            <span class="btn-success input-group-addon form-icon"><i class="fa fa-key fa-fw"></i> </span>
                                                         <input type="password" class="form-control" id="login_password" name="login_password"  required="required">
                                                        </div>
							</div>
                                                        
                                                        <div class="form-group group-1">
							<div class="input-group">
                                                            <span class="btn-success input-group-addon form-icon"><i class="fa fa-user fa-fw"></i> </span>
	                                                    <select class="form-control selectpicker" data-live-search="true" name="login_type">
                                                                <option value="JOBSEEKER">Login As Jobseeker</option>
                                                                <option value="COMPANY">Login As Company</option>
                                                            </select>
                                                        </div>
							</div>
                                                        
                                                        	
										
							<div class="row">
							    <div class="col-md-12">
	                                                    <p>
                                                             &nbsp; <button type="submit" class="btn btn-primary">Login</button> 
							    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
							    </p>
							    </div>
							</div>
							</fieldset>
						     </form>
						    </div>
						</div>
					    </div>					  
					</div>
				    </div>
				</div>
                                </li>

                                </ul>
				<div class="clearfix"></div>
				</div>
			    </div>
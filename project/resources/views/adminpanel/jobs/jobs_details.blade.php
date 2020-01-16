@extends('adminpanel.template.master')

@section('main_content')

 
              <div class="row">
                 
                  <div class="col-lg-12">
                      
                       @if (session('status'))
                            <div class="alert alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class=""></i> <strong align="center">{{session('status')}}</strong>
                            </div>
                       @endif
                      
                  <section class="panel">
                    
                                  <header class="panel-heading tab-bg-dark-navy-blue">
                                      <ul class="nav nav-tabs nav-justified ">
                                          <li class="active">
                                              <a href="#details" data-toggle="tab">
                                                  JOB DETAILS
                                              </a>
                                          </li>
                                         
                                          <li class="">
                                              <a href="#role" data-toggle="tab">
                                                  ROLE & RESPONSIBILITIES
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="#skills" data-toggle="tab">
                                                  SKILLS REQUIREMENTS
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="#education" data-toggle="tab">
                                                  EDUCATION REQUIREMENTS
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="#experience" data-toggle="tab">
                                                  EXPERIENCE REQUIREMENTS
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="#submission" data-toggle="tab">
                                                  SUBMISSION GUIDELINE
                                              </a>
                                          </li>
                                      </ul>
                                  </header>
                                  <div class="panel-body">
                                      <div class="tab-content tasi-tab">
                                          
                                          
                                          
                                          <div class="tab-pane active" id="details">
                                          
                                             <table class="table table-responsive">
                                  
                                  <tbody>
                                       <tr>
                                          <th> <b> Job ID: </b></th><td> {{$job_id}} </td>
                                          <th> <b> Job Title: </b></th><td> {{$job_title}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> Company: </b></th><td><a href="{{URL::to('company_details/'.$company_id)}}"> {{$company_name}} </a></td>
                                          <th> <b> City : </b></th><td> {{$city_name}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> Date_Posted: </b></th><td> {{$date_posted}} </td>
                                          <th> <b> Closing_Date: </b></th><td> {{$date_expiry}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> Category: </b></th><td> {{$category_title}} </td>
                                          <th> <b> Job_Type: </b></th><td> {{$job_type_title}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> Is_travel_required?: </b></th><td> {{$travel_required}} </td>
                                          <th> <b> Other_locations: </b></th><td> {{$other_locations}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> Salary: </b></th><td> {{$job_salary}}  </td>
                                          <th> <b> No. of Vacancies: </b></th><td> {{$no_vacancy}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> Is_Verified?: </b></th><td> {{$is_verified}} </td>
                                          <th> <b> Is_Active?:  </b></th><td> {{$is_active}}  </td>
                                      </tr>
                                       <tr style="text-align: justify">
                                           <th> <b> Job Summary: </b></th><td colspan="3"> {!!$job_details!!} </td>
                                      </tr>
                                      <tr>
                                          <td colspan="4">
                                              @if($is_verified == 'NO')
                                              <a data-toggle="modal" href="#myModal2" class="btn btn-success">VERIFY THIS JOB</a>
                                              @else
                                              <span class="btn btn-info">This job is verified.</span>
                                              @endif
                                              
                                               @if($is_active == 'YES')
                                              <a data-toggle="modal" href="#myModal1" class="btn btn-danger">BLOCK THIS JOB</a>
                                              @else
                                              <a data-toggle="modal" href="#myModal3" class="btn btn-info">UNBLOCK THIS JOB</a>
                                              @endif
                                          </td>
                                      </tr>
                                      
                                  </tbody>
                                  
                              </table>
                                              
                                          </div>
                                          
                                          
                          
                            
                            <!-- Modal -->
                              <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">BLOCK JOB</h4>
                                          </div>
                                          <div class="modal-body">
                                             <h5>Are you sure you want to block this job vacancy? </h5> 
                                             
                                             <form action="{{URL::to('block_job')}}" method="post">
                                                 
                                             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                             
                                             <input type="hidden" name="job_id" value="{{$job_id}}">
                                             <input type="hidden" name="login_email" value="{{$login_email}}">
                                             <input type="hidden" name="job_title" value="{{$job_title}}">
                                             <input type="hidden" name="company_name" value="{{$company_name}}">
                                                 <div class="modal-footer">
                                                     <button type="submit" name="submit" class="btn btn-success">YES</button>
                                             <button data-dismiss="modal" class="btn btn-default" type="button">NO</button>
                                                 </div>
                                             </form>

                                          </div>
                                      </div>
                                  </div>
                              </div>
                            <!-- Modal -->
                             
                              <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">VERIFY JOB</h4>
                                          </div>
                                          <div class="modal-body">
                                             <h5>Are you sure you want to verify this job vacancy? </h5> 
                                             
                                             <form action="{{URL::to('verifyjob')}}" method="post">
                                                 
                                             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                             
                                             <input type="hidden" name="job_id" value="{{$job_id}}">
                                             <input type="hidden" name="login_email" value="{{$login_email}}">
                                             <input type="hidden" name="job_title" value="{{$job_title}}">
                                             <input type="hidden" name="company_name" value="{{$company_name}}">
                                                 <div class="modal-footer">
                                                     <button type="submit" name="submit" class="btn btn-success">YES</button>
                                             <button data-dismiss="modal" class="btn btn-default" type="button">NO</button>
                                                 </div>
                                             </form>

                                          </div>
                                      </div>
                                  </div>
                              </div>
                            <!-- Modal -->
                            
                              <!-- Modal -->
                              <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">UNBLOCK JOB</h4>
                                          </div>
                                          <div class="modal-body">
                                             <h5>Are you sure you want to unblock this job vacancy? </h5> 
                                             
                                             <form action="{{URL::to('unblock_job')}}" method="post">
                                                 
                                             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                             
                                             <input type="hidden" name="job_id" value="{{$job_id}}">
                                             <input type="hidden" name="login_email" value="{{$login_email}}">
                                             <input type="hidden" name="job_title" value="{{$job_title}}">
                                             <input type="hidden" name="company_name" value="{{$company_name}}">
                                                 <div class="modal-footer">
                                                     <button type="submit" name="submit" class="btn btn-success">YES</button>
                                             <button data-dismiss="modal" class="btn btn-default" type="button">NO</button>
                                                 </div>
                                             </form>

                                          </div>
                                      </div>
                                  </div>
                              </div>
                            <!-- Modal -->
                                          
                                          
                                          
                                          <div class="tab-pane ullist" id="role">
                                              <?php echo $duty_responsibilities; ?>
                                              
                                          </div>
                                          <div class="tab-pane ullist" id="skills">
                                                    {!!$skills_required!!}                                          
                                          </div>
                                          <div class="tab-pane ullist" id="education">
                                                    {!!$qualification_required!!}                                          
                                          </div>
                                          <div class="tab-pane ullist" id="experience">
                                                    {!!$experience_required!!}                                          
                                          </div>
                                          <div class="tab-pane ullist" id="submission">
                                                    {!!$apply_guidance!!}                                          
                                          </div>
                                      </div>
                                  </div>
                              </section>
                  </div>
              </div>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">

                            <header class="panel-heading"><b>JOBS POSTED BY THIS COMPANY <span class="label label-warning r-activity">{{$total_jobs}}</span></b></header>
                                <div class="panel-body">
                                <table class="table table-striped border-top" id="sample_1">
                                    <thead>
                                        <tr> 
                                        <th>JOB_ID</th>
                                        <th>TITLE</th>
                                        <th>CATEGORY</th>
                                        <th>DATE_POSTED</th>
                                        <th>CLOSING_DATE</th>
                                        <th>Is_Verified</th>
                                        <th> &nbsp; </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($other_jobs as $oj)
                                        
                                        <tr>
                                            <td>{{$oj->job_id}}</td>
                                            <td><a href="{{URL::to('jobs_details/'.$oj->job_id)}}">{{$oj->job_title}}</a></td>
                                            <td>{{$oj->category_title}}</td>
                                            <td><?php echo date("d M - Y", strtotime($oj->date_posted)); ?></td>
                                            <td><?php echo date("d M - Y", strtotime($oj->date_expiry)); ?></td>
                                            <td>{{$oj->is_verified}}</td>
                                            <th><a href="{{URL::to('jobs_details/'.$oj->job_id)}}" class="btn btn-info">DETAILS</a></th>
                                        </tr>
                                        
                                        @endforeach

                                    </tbody>
                                </table>  
                                </div>

                        </section>
                    </div>  
                </div>



  
@endsection
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
                                                  COMPANY DETAILS
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="#jobs" data-toggle="tab">
                                                  JOBS BY COMPANY
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
                                          <th> <b> COMPANY ID: </b></th><td> {{$company_id}} </td>
                                          <th> <b> NAME: </b></th><td> {{$company_name}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> EMAIL: </b></th><td> {{$login_email}} </td>
                                          <th> <b> WEBSITE: </b></th><td>{{$company_website}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> PHONE : </b></th><td> {{$phone_number}} </td>
                                          <th> <b> REGISTRATION DATE: </b></th><td> {{$date_created}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> TYPE: </b></th><td> {{$company_type_title}} </td>
                                          <th> <b> IS BLOCKED? </b></th><td> {{$is_blocked}} </td>
                                      </tr>
                                     
                                       <tr style="text-align: justify">
                                           <th> <b> ADRESS: </b></th><td colspan="3"> {!!$company_address!!} </td>
                                      </tr>
                                       <tr style="text-align: justify">
                                           <th> <b> DETAILS: </b></th><td colspan="3"> {!!$company_details!!} </td>
                                      </tr>
                                       <tr style="text-align: justify">
                                           <th> <b> LOGO: </b></th>
                                           <td colspan="3">
   <img src="<?=asset('project/storage');?>/app/company_logo/{{$company_logo}}" alt="Logo" style="width:20%; height: auto" class="center-block img-responsive img-thumbnail">
                                           </td>
                                      </tr>
                                      <tr>
                                          <td colspan="4">
                                              @if($is_blocked == 'YES')
                                              <a data-toggle="modal" href="#myModal1" class="btn btn-success">UNBLOCK COMPANY</a>
                                              @else
                                              <a data-toggle="modal" href="#myModal2" class="btn btn-danger">BLOCK COMPANY</a>
                                              @endif
                                          </td>
                                      </tr>
                                      
                                  </tbody>
                                  
                              </table>
                                              
                                          </div>
                                          
                                           
                            <!-- Modal 2 -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">BLOCK COMPANY</h4>
                                          </div>
                                          <div class="modal-body">
                                             <h5>Are you sure you want to block this company? </h5> 
                                             
                                             <form action="{{URL::to('block_company')}}" method="post">
                                                 
                                             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                             
                                             <input type="hidden" name="company_id" value="{{$company_id}}">
                                             <input type="hidden" name="login_email" value="{{$login_email}}">
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
                             
                            <!-- Modal 1 -->
                              <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">UNBLOCK COMPANY</h4>
                                          </div>
                                          <div class="modal-body">
                                             <h5>Are you sure you want to unblock this company? </h5> 
                                             
                                             <form action="{{URL::to('unblock_company')}}" method="post">
                                                 
                                             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                             
                                             <input type="hidden" name="company_id" value="{{$company_id}}">
                                             <input type="hidden" name="login_email" value="{{$login_email}}">
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
                            
                            <div class="tab-pane ullist" id="jobs">
<section class="panel">

                            <header class="panel-heading"><b>TOTAL JOBS POSTED BY THIS COMPANY <span class="label label-warning r-activity">{{$total_jobs}}</span></b></header>
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
                                  </div>
                              </section>
                  </div>
              </div>

              


  
@endsection
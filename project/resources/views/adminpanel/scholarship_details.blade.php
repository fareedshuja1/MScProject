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
                                                  SCHOLARSHIP DETAILS
                                              </a>
                                          </li>
                                         
                                          <li class="">
                                              <a href="#sch_value" data-toggle="tab">
                                                  SCHOLARSHIP VALUE
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="#eligibility" data-toggle="tab">
                                                  ELIGIBILITY
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="#how_to_apply" data-toggle="tab">
                                                  HOW TO APPLY
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
                                          <th> <b> Scholarship ID: </b></th><td> {{$sch_id}} </td>
                                          <th> <b> Title: </b></th><td> {{$sch_title}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> Institute: </b></th><td>{{$institute_name}}</td>
                                          <th> <b> Country : </b></th><td> {{$country_name}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> Appl. Start Date: </b></th><td> {{$start_date}} </td>
                                          <th> <b> Deadline: </b></th><td> {{$closing_date}} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> Degree Level: </b></th><td> {{$degree_level}} </td>
                                          <th> <b> Target Audience: </b></th><td> {!!$target_audience!!} </td>
                                      </tr>
                                      <tr>
                                          <th> <b> No. of Awards: </b></th><td> {!!$no_of_scholarships!!} </td>
                                          <th> <b> Field of Study: </b></th><td> {!!$field_of_study!!} </td>
                                      </tr>
                                     <tr style="text-align: justify">
                                           <th> <b>Original Source: </b></th><td colspan="3"> {{$original_source}} </td>
                                      </tr>
                                       <tr style="text-align: justify">
                                           <th> <b>Description: </b></th><td colspan="3"> {!!$sch_description!!} </td>
                                      </tr>
                                      <tr style="text-align: justify">
                                          <td colspan="4"> 
                                       <a href="{{URL::to('edit_scholarship/'.$sch_id)}}" class="btn btn-success">EDIT</a>
                                       <a href="{{URL::to('delete_scholarship/'.$sch_id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this scholarship?');">DELETE</a>
                                          </td>
                                      </tr>
                                  </tbody>
                                  
                              </table>
                                              
                                          </div>
                                      
                                          <div class="tab-pane ullist" id="sch_value">
                                              <?php echo $sch_value; ?>
                                              
                                          </div>
                                          <div class="tab-pane ullist" id="eligibility">
                                                    {!!$eligibility!!}                                          
                                          </div>
                                          <div class="tab-pane ullist" id="how_to_apply">
                                                    {!!$how_to_apply!!}                                          
                                          </div>
                                          
                                      </div>
                     
                                  </div>
                      
                              </section>
                  </div>
              </div>

    
@endsection
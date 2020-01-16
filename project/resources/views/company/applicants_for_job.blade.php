@extends('layouts.master')

@section('title')
{{Session::get('company_name')}}
@endsection


@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>Total Applicants : {{$total}}</h5>
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
                
          <span class="btn btn-warning btn-sm" style="margin-bottom:12px" onclick="window.history.go(-1); return false;"> 
              <i class="fa fa-arrow-left"></i> <b>PREVIOUS PAGE</b>
          </span>
          <span class="btn btn-success btn-sm print" style="margin-bottom:12px" onclick="printDiv('printlist')"> 
              <i class="fa fa-print"></i> <b>PRINT</b>
          </span>
                                                    
          <div class="table-responsive">
            <div id="printlist">

                <table class="table table-responsive table-striped" border="1">
                    <thead>
                        <tr class="bg-primary">
                            <th>&nbsp;</th>
                            <th><i class="fa fa-user"></i>&nbsp;&nbsp;FULL NAME</th>
                            <th><i class="fa fa-phone"></i>&nbsp;&nbsp;PHONE NO.</th>
                            <th><i class="fa fa-envelope"></i>&nbsp;&nbsp;EMAIL</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php  $i=1; ?>

                    @foreach($sql as $sql)    

                    <tr>
                    <td>{{$i++}}</td>
                    <td>
                        <u>
                            <a href="{{URL::to('applicant_profile/'.$sql->jobseeker_id.'/'.str_replace(' ','_',$sql->jobseeker_name))}}">{{$sql->jobseeker_name}}</a>
                        </u>
                    </td>
                        @if($sql->jobseeker_phone =='')
                         <td>Not Given</td>
                        @else 
                         <td>{{$sql->jobseeker_phone}}</td>
                        @endif
                    <td>{{$sql->login_email}}</td>
                    </tr>

                    @endforeach
                </tbody>
    
                </table>
            </div>
                </div>
    
        
        <div class="col-md-12">
                @include('layouts.contactus_bar')
           <br>
           </div>

            </div>
			
	   
           
			
        </div>

@endsection

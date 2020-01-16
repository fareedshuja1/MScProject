@extends('layouts.master')

@section('title')
{{$company_name}} - Findajob.af | Find jobs in Afghanistan
@endsection



@section('info_panel')
    <div class="alert alert-info" style="border-radius: 0px;">
        <div class="container">
            <h5>{{$company_name}}</h5>
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
        
        <a href="{{URL::to('alljobs/'.$company_id.'/'.str_replace(' ', '_', $company_name))}}" class="btn btn-success btn-sm"> <i class="fa fa-briefcase"></i> <b>&nbsp;JOBS BY THIS COMPANY</b></a>
        <div class="spc"></div>
        
        <h4><span class="blue2" style="text-transform: uppercase;">About {{$company_name}}</span></h4>
        <p style="text-align:justify"><?php echo $company_details; ?></p>
        
       <div class="table-responsive">
                                                <table class="table  table-condensed table-responsive table-user-information" >
                                                        <tbody>
                                                             <tr>
                                                                 <td style="text-align: left"><span class="text-danger" style="text-transform: uppercase;"><b>Industry Type</b></span></td>
                                                                <td style="text-align: left">{{$company_type_title}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left"><span class="text-danger" style="text-transform: uppercase;"><b>Website</b></span></td>
                                                                @if($company_website != '')
                                                                <td style="text-align: left">{{$company_website}}</td>
                                                                @else
                                                                <td style="text-align: left">Website not given.</td>
                                                                @endif
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left"><span class="text-danger" style="text-transform: uppercase;"><b>Phone No.</b></span></td>
                                                                @if($phone_number != '')
                                                                <td style="text-align: left">{{$phone_number}}</td>
                                                                @else
                                                                <td style="text-align: left">Phone number not given.</td>
                                                                @endif
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left"><span class="text-danger" style="text-transform: uppercase;"><b>Address</b></span></td>
                                                                @if($company_address != '')
                                                                <td style="text-align: left">{{$company_address}}</td>
                                                                @else
                                                                <td style="text-align: left">Address not given.</td>
                                                                @endif
                                                                </tr>

                                                        </tbody>
                                                </table>
                                        </div>
        
        </div>
            

        </div>

@endsection

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

	<div class="col-md-3">
	 <!--widget start-->
           @include('layouts.company_sidebar')
         <!--widget end-->
	</div>


        <div class="col-md-9">
          
            <div class="col-md-12">
                
                <p style="text-align:justify">{!!$company_details!!}</p> 
			    <p> &nbsp;</p>
                             <div class="col-md-12">
                                        <div class="table-responsive">
                                                <table class="table  table-condensed table-responsive table-user-information" >
                                                        <tbody>
                                                                <tr>
                                                                <td><strong>Website</strong></td>
                                                                @if($company_website != '')
                                                                <td>{{$company_website}}</td>
                                                                @else
                                                                <td>Website not added.</td>
                                                                @endif
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Phone No.</strong></td>
                                                                @if($phone_number != '')
                                                                <td>{{$phone_number}}</td>
                                                                @else
                                                                <td>Phone number not added.</td>
                                                                @endif
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Address</strong></td>
                                                                @if($company_address != '')
                                                                <td>{{$company_address}}</td>
                                                                @else
                                                                <td>Address not added.</td>
                                                                @endif
                                                                </tr>

                                                        </tbody>
                                                </table>
                                        </div>
                                   </div>
            </div>
			
	   
           <div class="col-md-12">
                @include('layouts.contactus_bar')
           <br>
           </div>
			
        </div>

@endsection

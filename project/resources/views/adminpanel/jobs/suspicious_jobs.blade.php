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
                <header class="panel-heading">LIST OF ALL SUSPICIOUS JOBS &nbsp; <span class="label label-success r-activity">{{$count}}</span></header>
                <div class="panel-body">
                <table class="table table-striped border-top" id="sample_1">
                    <thead>
                        <tr> 
                        <th>ID </th>
                        <th>TITLE</th>
                        <th>COMPANY</th>
                        <th>CITY</th>
                        <th>CATEGORY</th>
                        <th>DATE POSTED</th>
                        <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                       @foreach($data as $d)
                       
                       <tr>
                       <td>{{$d->job_id}}</td>
                       <td><a href="{{URL::to('jobs_details/'.$d->job_id)}}">{{$d->job_title}}</a></td>
                       <td>{{$d->company_name}}</td>
                       <td>{{$d->city_name}}</td>
                       <td>{{$d->category_title}}</td>
                       <td>{{$d->psd}}</td>
                        <td><a class='btn btn-info' href="{{URL::to('clear_job/'.$d->job_id)}}">CLEAR</a> <a class='btn btn-danger' href='#'>DELETE</a></td>
                       </tr>
                       
                       @endforeach
                    </tbody>
                </table>  
                </div>
            </section>
        </div>  
    </div>

@endsection

  
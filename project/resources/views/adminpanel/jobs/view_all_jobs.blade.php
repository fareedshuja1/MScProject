@extends('adminpanel.template.master')

@section('main_content')

    <div class="row">
        <div class="col-lg-12">
          
            <section class="panel">
                <header class="panel-heading"><b>LIST OF ALL JOBS &nbsp; <span class="label label-success r-activity">{{$total_jobs}}</span></b></header>
                <div class="panel-body">
                <table class="table table-striped border-top" id="sample_1">
                    <thead>
                        <tr> 
                        <th>ID </th>
                        <th>TITLE</th>
                        <th>COMPANY</th>
                        <th>CITY</th>
                        <th>CATEGORY</th>
                        <th>DATE_POSTED</th>
                        <th>IS_VERIFIED</th>
                        <th>IS_ACTIVE</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                       @foreach($sql as $d)
                       
                       <tr>
                       <td>{{$d->job_id}}</td>
                       <td><a href="{{URL::to('jobs_details/'.$d->job_id)}}">{{$d->job_title}}</a></td>
                       <td>{{$d->company_name}}</td>
                       <td>{{$d->city_name}}</td>
                       <td>{{$d->category_title}}</td>
                       <td>{{$d->psd}}</td>
                       <td>{{$d->is_verified}}</td>
                       <td>{{$d->is_active}}</td>
                       </tr>
                       
                       @endforeach
                    </tbody>
                </table>  
                </div>
            </section>
        </div>  
    </div>

@endsection

  
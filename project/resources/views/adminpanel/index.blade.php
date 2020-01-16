@extends('adminpanel.template.master')

@section('main_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
        
            <header class="panel-heading"><b>LIST OF ALL UNVERIFIED JOB VACANCIES</b></header>
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
                        <th>CLOSING_DATE</th>
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
                       <td>{{$d->exd}}</td>
                       </tr>
                       
                       @endforeach
                    </tbody>
                </table>  
                </div>
        
        </section>
    </div>  
</div>


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
        
            <header class="panel-heading"><b>LIST OF ALL COMPANIES / EMPLOYERS &nbsp; <span class="label label-success r-activity">{{$count}}</span></b></header>
                <div class="panel-body">
                <table class="table table-striped border-top" id="sample_1">
                    <thead>
                        <tr> 
                            <th>ID </th>
                        <th>NAME</th>
                        <th>TYPE</th>
                        <th>WEBSITE</th>
                        <th>REGISTER DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($companies as $companies)
                       
                       <tr>
                       <td>{{$companies->company_id}}</td>
                       <td><a href="{{URL::to('company_details/'.$companies->company_id)}}">{{$companies->company_name}}</a></td>
                       <td>{{$companies->company_type_title}}</td>
                       <td>{{$companies->company_website}}</td>
                       <td>{{$companies->date_created}}</td>
                       </tr>
                       
                       @endforeach
                    </tbody>
                </table>  
                </div>
        
        </section>
    </div>  
</div>


@endsection
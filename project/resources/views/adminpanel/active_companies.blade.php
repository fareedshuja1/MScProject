@extends('adminpanel.template.master')

@section('main_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
        
            <header class="panel-heading"><b>LIST OF ALL ACTIVE COMPANIES &nbsp; <span class="label label-success r-activity">{{$count}}</span></b></header>
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
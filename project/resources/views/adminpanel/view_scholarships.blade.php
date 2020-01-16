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
                <header class="panel-heading">LIST OF ALL SCHOLARSHIPS &nbsp; <span class="label label-success r-activity">{{$count}}</span></header>
                <div class="panel-body">
                <table class="table table-striped border-top" id="sample_1">
                    <thead>
                        <tr> 
                        <th>ID </th>
                        <th>TITLE</th>
                        <th>INSTITUTE</th>
                        <th>COUNTRY</th>
                        <td>DEGREE</td>
                        <th> </th>
                        <th> </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sql as $sql)
                        <tr>
                            <td>{{$sql->sch_id}}</td>
                            <td><a href="scholarship_details/{{$sql->sch_id}}">{{$sql->sch_title}}</a></td>
                            <td>{{$sql->institute_name}}</td>
                            <td>{{$sql->country_name}}</td>
                            <td>{{$sql->degree_level}}</td>
                            <td><a href="edit_scholarship/{{$sql->sch_id}}" class="btn btn-success">EDIT</a></td>
                            <td><a href="delete_scholarship/{{$sql->sch_id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this scholarship?');">DELETE</a></td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>  
                </div>
            </section>
        </div>  
    </div>

@endsection

  
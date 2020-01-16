@extends('adminpanel.template.master')

@section('main_content')

 
    <div class="row">
        <div class="col-lg-12">
            
           
            <section class="panel">
                <header class="panel-heading">USER MESSAGES</header>
                <div class="panel-body">
                <table class="table table-striped border-top" id="sample_1">
                    <thead>
                        <tr> 
                        <th>DATE </th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>SUBJECT</th>
                        <th>MESSAGE</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                       @foreach($sql as $d)
                       
                       <tr>
                       <td>{{$d->ccdate}}</td>
                       <td>{{$d->cname}}</td>
                       <td>{{$d->cemail}}</td>    
                       <td>{{$d->csubject}}</td>  
                       <td>{{$d->cmessage}}</td>
                       </tr>
                       
                       @endforeach
                    </tbody>
                </table>  
                </div>
            </section>
        </div>  
    </div>
         

@endsection

  
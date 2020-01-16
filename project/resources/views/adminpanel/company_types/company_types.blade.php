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
                
                <header class="panel-heading">ADD NEW TYPE </header>
                <div class="panel-body">
                <form role="form" action="create_company_type" method="post">
                
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                <div class="form-group">
                    <label for="exampleInputEmail1">TYPE TITLE <span style="color: red"> * </span></label>
                    <input name="company_type_title" class="form-control" id="" autofocus required="required">
                </div>
                                
                  <button type="submit" class="btn btn-info" name="submit">ADD</button>
            
                </form>
                </div>
                
                
            </section>
            
            
            
            <section class="panel">
                <header class="panel-heading">LIST OF ALL TYPES</header>
                <div class="panel-body">
                <table class="table table-striped border-top" id="sample_1">
                    <thead>
                        <tr> 
                        <th>ID </th>
                        <th>TITLE</th>
                        <th> </th>
                        <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                       @foreach($data as $d)
                       
                       <tr>
                       <td>{{$d->company_type_id}}</td>
                       <td>{{$d->company_type_title}}</td>
                       <td><a  class='btn btn-info' data-toggle="modal" href="#myModal2"  onClick="edit_company_type({{$d->company_type_id}});">EDIT</a></td>
                        <td><a class='btn btn-danger' href='deleteccompanytype/{{$d->company_type_id}}' onclick="return confirm('Are you sure you want to delete this type?');">DELETE</a></td>
                       </tr>
                       
                       @endforeach
                    </tbody>
                </table>  
                </div>
            </section>
        </div>  
    </div>


                             <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">EDIT TYPE</h4>
                                          </div>
                                          <div class="modal-body">
                                             

                                          </div>
                                      </div>
                                  </div>
                              </div>
                             <!-- Modal -->
                             
                             

@endsection

  
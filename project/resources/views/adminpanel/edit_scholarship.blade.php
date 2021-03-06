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
                
                <header class="panel-heading">EDIT SCHOLARSHIP </header>
                <div class="panel-body">
                    <form role="form" action="{{URL::to('edit_scholarship_query')}}" method="post">
                
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <input type="hidden" name="sch_id" value="{{$sch_id}}">
                
                <div class="row">

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">TITLE </label>
                    <input name="sch_title" style="color:#000" class="form-control" value="{{$sch_title}}" required="required">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">INSTITUTE </label>
                    <input name="institute_name" style="color:#000" class="form-control" value="{{$institute_name}}" required="required">
                </div>
                    
                </div>
                <div class="row">

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">STUDY IN / COUNTRY </label>
                    <select name="country_id" class="form-control" style="color: #000">
                        <option value="{{$country_id}}">{{$country_name}}</option>
                        @foreach($countries as $cc)
                        <option value="{{$cc->country_id}}">{{$cc->country_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">DEGREE LEVEL </label>
                    <select name="degree_level" class="form-control" style="color: #000">
                        <option value="{{$degree_level}}">{{$degree_level}}</option>
                        <option value="Diploma / Certificate">Diploma / Certificate</option>
                        <option value="Undergraduate / Bachelors Degree">Undergraduate / Bachelors Degree</option>
                        <option value="Bachelors / Masters Degree">Bachelors / Masters Degree</option>
                        <option value="Masters / PhD Degree">Masters / PhD Degree</option>
                        <option value="Masters Degree">Masters Degree</option>
                        <option value="PhD">PhD</option>
                        
                    </select>
                </div>
                    
                </div>
                <div class="row">

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">COURSE START DATE </label>
                    <input name="start_date" style="color:#000" class="form-control" value="{{$start_date}}" required="required">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">APPLICATION DEADLINE </label>
                    <input name="closing_date" style="color:#000" class="form-control" value="{{$closing_date}}" required="required">
                </div>
                    
                </div>
                
                 <div class="row">

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">ORIGINAL SOURCE </label>
                    <input name="original_source" style="color:#000" class="form-control" value="{{$original_source}}" required="required">

                </div>
               
                     <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Number of Scholarships </label>
                    <input name="no_of_scholarships" style="color:#000" class="form-control" value="{{$no_of_scholarships}}">

                </div>
               
                </div>
                               
                               
                 <div class="row">

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">DESCRIPTION </label>
                    <textarea name="sch_description" style="color:#000" class="form-control ckeditor">{{$sch_description}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">FIELD OF STUDY </label>
                    <textarea name="field_of_study" style="color:#000" class="form-control ckeditor">{{$field_of_study}}</textarea>
                </div>
                    
                </div>
                
                <div class="row">

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">TARGET AUDIENCE </label>
                    <textarea name="target_audience" style="color:#000" class="form-control ckeditor">{{$target_audience}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">SCHOLARSHIP VALUE </label>
                    <textarea name="sch_value" style="color:#000" class="form-control ckeditor">{{$sch_value}}</textarea>
                </div>
                    
                </div>
                
                <div class="row">

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">ELIGIBILITY </label>
                    <textarea name="eligibility" style="color:#000" class="form-control ckeditor">{{$eligibility}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">HOW TO APPLY </label>
                    <textarea name="how_to_apply" style="color:#000" class="form-control ckeditor">{{$how_to_apply}}</textarea>
                </div>
                    
                </div>
                
               
                  <button type="submit" class="btn btn-info" name="submit">SAVE CHANGES</button>
            
                </form>
                </div>
                
                
            </section>
            
        </div>  
    </div>

@endsection

  
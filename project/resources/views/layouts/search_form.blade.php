            <form class="form-inline" role="form" action="{{URL::to('jobsearch')}}" method="post">                        
                        
                        <div class="form-group cols-md-4 group-1">
                            <div class="input-group">
                                <span class="label-info input-group-addon"><span class="glyphicon glyphicon-search form-icon"></span></span>
                                <input type="text" class="form-control" name="keyword" id="keyword"  placeholder="ENTER JOB TITLE OR KEYWORD"  style="min-width:240px; max-width: 100%" />
                            </div>
			</div>
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                    
                        <div class="form-group cols-md-3 group-1 ">
                                <div class="input-group">
                                  <span class="label-info input-group-addon"><span class="glyphicon glyphicon-globe form-icon"></span></span>
                                  <select class="form-control" name="city_id"  style="min-width:200px; max-width: 100%; text-transform: uppercase;" >
                                         <option value="0">CHOOSE CITY</option>
                                        @foreach($cityName as $city)
                                         <option value='{{$city->city_id}}'>{{$city->city_name}}</option>
                                        @endforeach
                                    </select>  
                                </div>
			</div>
						
			<div class="form-group cols-md-3 group-1 ">
                                <div class="input-group">
                                  <span class="label-info input-group-addon"><span class="glyphicon glyphicon-tags form-icon"></span></span> 
                                  <select class="form-control" name="category_id" style="min-width:200px; max-width: 100%">
                                        <option value="0">CHOOSE CATEGORY</option>
                                        @foreach($categoryTitle as $category)
                                         <option value='{{$category->category_id}}'>{{$category->category_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
			</div>			
						
                        <div class="form-group cols-md-1">                       
                            <input type="submit" value="SEARCH" class="btn btn-warning form-top" style="margin-top: -1px">
                        </div>
                                            
		</form>
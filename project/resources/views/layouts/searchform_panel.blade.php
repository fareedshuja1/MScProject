             <div class="panel panel-default">
                 <div class="panel-heading">
                                <h3 class="panel-title">
                                    <strong>Search Job </strong>
                                </h3>
                            </div>
                           
                           <div class="panel-body" style="padding:15px">
                                <form role="form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="label-default input-group-addon" style="background-color: #f9f9f9;">
                                                <span class="glyphicon glyphicon-search form-icon" style="color: #000"></span>
                                            </span>
                                      <input type="text" class="form-control" name="name" id="name"  placeholder="ENTER JOB TITLE OR KEYWORD"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="input-group">
                                        <span class="label-default input-group-addon" style="background-color: #f9f9f9;">
                                            <span class="glyphicon glyphicon-globe form-icon" style="color: #000"></span>
                                        </span>
                                          <select class="form-control"  style="text-transform: uppercase;" >
                                               <option value="0">CHOOSE CITY</option>
                                                @foreach($cityName as $city)
                                         <option value='{{$city->city_id}}'>{{$city->city_name}}</option>
                                        @endforeach

                                          </select>  
                                      </div>
                                    </div>
                                    <div class="form-group">
                                         <div class="input-group">
                                        <span class="label-default input-group-addon" style="background-color: #f9f9f9;">
                                            <span class="glyphicon glyphicon-tags form-icon" style="color: #000"></span>
                                        </span>
                                          <select class="form-control"  style="text-transform: uppercase;" >
                                               <option value="0">CHOOSE CATEGORY</option>
                                               @foreach($categoryTitle as $category)
                                                <option value='{{$category->category_id}}'>{{$category->category_title}}</option>
                                               @endforeach
                                          </select>  
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-warning">SEARCH</button>
                                  </form>
                            </div>
                          </div>
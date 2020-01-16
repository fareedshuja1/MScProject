
                    <ul class="list-group hidden-xs hidden-sm" style="border: none">
                        <li class="list-group-item" style="background-color:#f2f2f2"><strong>Job Categories</strong></li>
                        @foreach($categoryCount as $category) 
                        <a href="{{URL::to('category_search/'.$category->category_id.'/'.str_replace(' ', '_', $category->category_title))}}"> 
                        <li class="list-group-item">{{$category->category_title}} 
                           
                               <span class="badge badge-pill badge-primary">{{$category->totall}}</span> 
                           
                        </li> 
                        </a>
                        @endforeach
                    </ul>
                        
                      
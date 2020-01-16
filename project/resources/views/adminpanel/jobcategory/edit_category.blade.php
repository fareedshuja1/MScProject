                       <form action="editcategoryquery" method="post">
   
                       <input type="text" class="form-control" id="exampleInputEmail1" style="color: #000" name="category_title" value="{{$category_title}}" >
                       <input type="hidden" class="form-control" id="exampleInputEmail1" name="category_id" value="{{$category_id}}" >
                       
                       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    
                       <div class="modal-footer">
                       <button data-dismiss="modal" class="btn btn-default" type="button">NO</button>
                       <button class="btn btn-info" type="submit" name="submit">EDIT</button>
                       </div>
                       </div>
                       </div>
                       </div>
                       </form> 
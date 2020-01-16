
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=asset('assets/admin_assets');?>/js/jquery.js"></script>
    <script src="<?=asset('assets/admin_assets');?>/js/jquery-1.8.3.min.js"></script>
    <script src="<?=asset('assets/admin_assets');?>/js/bootstrap.min.js"></script>
    <script src="<?=asset('assets/admin_assets');?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?=asset('assets/admin_assets');?>/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?=asset('assets/admin_assets');?>/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?=asset('assets/admin_assets');?>/js/owl.carousel.js" ></script>
    <script src="<?=asset('assets/admin_assets');?>/js/jquery.customSelect.min.js" ></script>
    
    <script src="<?=asset('assets/admin_assets');?>/assets/data-tables/jquery.dataTables.js" type="text/javascript" ></script>
    <script src="<?=asset('assets/admin_assets');?>/assets/data-tables/DT_bootstrap.js" type="text/javascript" ></script>


    <!--common script for all pages-->
    <script src="<?=asset('assets/admin_assets');?>/js/common-scripts.js"></script>
    
    <script src="<?=asset('assets/admin_assets');?>/js/dynamic-table.js"></script>
    
    <!-- CKEDITOR -->
    <script src="<?=asset('assets');?>/simpletexteditor/ckeditor.js"></script>        
    <!-- CKEDITOR -->

    
    <script>
    
    function edit_city(id){
    var url= '{{url("editcity")}}' + '/' +id;
    
    $.post(url,{_token: '{{ csrf_token() }}'}, function(page_response)
    {
     $(".modal-body").html(page_response);
    });
    }
    </script>
    
    <script>
    function edit_category(id) {
    var url= '{{url("editcategory")}}' + '/' +id;
    
    $.post(url,{_token: '{{ csrf_token() }}'}, function(page_response)
    {
     $(".modal-body").html(page_response);
    });    
    }    
        
    </script>



       <script  type="text/javascript" src="<?=asset('assets');?>/jquery.min.js"></script>
       <script  type="text/javascript" src="<?=asset('assets');?>/js/typeheads.min.js"></script>
       
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?=asset('assets');?>/bootstrap/js/bootstrap.min.js"></script>
	<!-- Tabs -->
	<script src="<?=asset('assets');?>/js/jquery.easytabs.min.js" type="text/javascript"></script>
	<script src="<?=asset('assets');?>/js/modernizr.custom.49511.js"></script>
	<!-- Tabs -->

	<!-- Owl Carousel -->
	<script src="<?=asset('assets');?>/js/owl.carousel.js"></script>
	<!-- Owl Carousel -->
        
        <!-- CKEDITOR -->
        <script src="<?=asset('assets');?>/simpletexteditor/ckeditor.js"></script>        
        <!-- CKEDITOR -->


	<!-- Form Slider -->
	<script type="text/javascript" src="<?=asset('assets');?>/js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="<?=asset('assets');?>/js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="<?=asset('assets');?>/js/tmpl.js"></script>
	<script type="text/javascript" src="<?=asset('assets');?>/js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="<?=asset('assets');?>/js/draggable-0.1.js"></script>
	<script type="text/javascript" src="<?=asset('assets');?>/js/jquery.slider.js"></script>
	<!-- Form Slider -->
	
        <script src="<?=asset('assets');?>/js/jquery.validate.js"></script>
        
	<script src="<?=asset('assets');?>/js/job-board.js"></script>
        
        <script src="<?=asset('assets');?>/js/myjavascript.js"></script>
        
       
        <script >
        function printDiv(divName) {
           var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;
             document.body.innerHTML = printContents;
             window.print();
             document.body.innerHTML = originalContents;
        }
        </script>
        
        <!-- Date Picker -->
        <!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
        <script src="<?=asset('assets');?>/js/datepicker.js"></script>
        <script>
        $(function() {
            var dateToday = new Date(); 

           $( "#datepicker" ).datepicker({
              changeMonth: true,
              changeYear: true,
              yearRange: '2017:2018',
              minDate: dateToday
           });
           $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd");
         });
        </script>
        <!--Date Picker -->
        
        <script>
        initSample();
        </script>        
        
        
        <script>

        function isNumberKey(evt)
               {
                  var charCode = (evt.which) ? evt.which : event.keyCode;
                  if ( charCode > 31 
                    && (charCode < 48 || charCode > 57))
                     return false;

                  return true;
               }

        </script>

        
        
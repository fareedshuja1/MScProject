<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.head_files')
  </head>
  
  <body>
	
        <!-- START MAIN WRAPPER -->
        <div id="wrapper">
	    
            <!-- START TOP BAR --> 
            <div id="header">
	        <div class="top-line">&nbsp;</div>
						
			<div class="top navbar-default">
                        @if (Session::has('login_email') && Session::has('company_id') && Session::has('company_name')) 
                        @include('layouts.company_top_bar')
                        @elseif(Session::has('login_email') && Session::has('jobseeker_id') && Session::has('jobseeker_name'))
                        @include('layouts.jobseeker_top_bar')
                        @else
                        @include('layouts.top_bar')
                        @endif
			</div>

                        <div class="container">
		        @include('layouts.logo_bar')   
			</div>                        
            </div>
            <!-- END TOP BAR -->
	
						
	    <!-- INFO PANEL / SEARCH FORM START -->	
            @yield('info_panel')
	    <!-- INFO PANEL / SEARCH FORM END -->
		
		
		<!-- Start Page Content -->
                <div class="container">
			<div class="row"> 
			    <div class="col-md-12">
                                
	                        @yield('main_content')
				@yield('article')		
										
				<div class="spacer-2"></div>
		            </div>		
			    <div class="clearfix"></div>
			</div>
		    </div>
		<!-- End Page Content -->
        
        
               <!-- START Footer -->
		<div id="footer">
		    <div class="container">
			<span style="color:#fff">Copyright 2017 Findajob.af. All Rights Reserved</span>
		    </div>
		</div>
                <!-- END Footer -->                
	</div>
        <!-- END MAIN WRAPPER -->
        
   @include('layouts.footer_files')
  </body>
</html>
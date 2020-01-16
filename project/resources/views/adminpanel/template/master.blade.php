
<!DOCTYPE html>
<html lang="en">
  <head>
  @include('adminpanel.template.header') 
  </head>

  <body>
 
  <section id="container" class="">

      <!--top bar start-->
      <header class="header white-bg">
      @include('adminpanel.template.top_bar')
      </header>
      <!--top bar end-->
	   
	  
      <!--sidebar start-->
      <aside>
      @include('adminpanel.template.sidebar')    
      </aside>
      <!--sidebar end-->
	  
	  
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
        @yield('main_content')        
        </section>
      </section>
      <!--main content end-->
      
	  
	  
  </section>

  @include('adminpanel.template.footer')

  </body>
</html>


<!DOCTYPE html>
<html lang="en">
  <head>
  @include('adminpanel.template.header')
  </head>

  <body class="login-body">

    <div class="container">
        
         @if (session('status'))
         <div class="alert alert-danger fade in">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <i class=""></i> <strong align="center">{{session('status')}}</strong>
         </div>
         @endif

        <form class="form-signin" action="auth_admin" method="post">
        <h2 class="form-signin-heading">admin login</h2>
        <div class="login-wrap">
            
            <input type="text" class="form-control" name="admin_email" placeholder="Email ID" autofocus>
            
            <input type="password" class="form-control" name="admin_password" placeholder="Password">
            
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

            <label class="checkbox">
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">LOGIN</button>
           

        </div>

      </form>
        
    </div>
      
  </body>
  
</html>
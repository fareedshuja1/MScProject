<div id="sidebar"  class="nav-collapse">
    
      
    <ul class="sidebar-menu">
        
        <li class="">
            <a class="" href="{{URL::to('webadmin')}}">
                <i class="icon-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>GENERAL</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{URL::to('cities')}}">ADD / VIEW CITIES</a></li>
                <li><a class="" href="{{URL::to('jobcategory')}}">JOB CATEGORY</a></li>
                <li><a class="" href="{{URL::to('companytypes')}}">COMPANY TYPES</a></li>
                <li><a class="" href="{{URL::to('view_messages')}}">USER MESSAGES</a></li>
            </ul>
        </li>         
        
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>MANAGE JOBS</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{URL::to('all_jobs')}}">ALL JOBS</a></li>
                <li><a class="" href="{{URL::to('all_active_jobs')}}">ACTIVE JOBS</a></li>
                <li><a class="" href="{{URL::to('expired_jobs')}}">EXPIRED JOBS</a></li>
                <li><a class="" href="{{URL::to('unverified_jobs')}}">UNVERIFIED JOBS</a></li>
                <li><a class="" href="{{URL::to('suspicious_jobs')}}">SUSPICIOUS JOBS</a></li>
               <li><a class="" href="{{URL::to('all_blocked_jobs')}}">BLOCKED JOBS</a></li>
            </ul>
            
             
        </li>     
        
         <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>SCHOLARSHIPS</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{URL::to('add_scholarships')}}">ADD RECORD</a></li>
                <li><a class="" href="{{URL::to('view_scholarships')}}">VIEW RECORDS</a></li>
            </ul>
        </li>        
        
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>COMPANIES</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{URL::to('active_companies')}}">ACTIVE COMPANIES</a></li>
                <li><a class="" href="{{URL::to('blocked_companies')}}">BLOCKED COMPANIES</a></li>
            </ul>
        </li>        
    </ul>
    
</div>
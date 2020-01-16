<?php

namespace App\Http\Controllers;

use App\General_model;

use App\Http\Requests;

use Session;

use Mail;
use App\Mail\CompanyVerificationEmails;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use DB;

class Admin_controller extends Controller
{   

    public function index()
    { 
        
      $sql = General_model::view_unverified_jobs();
          
      $companies = General_model::view_all_companies();
    
      $count['count'] = count($companies); 
        
      return view('adminpanel.index',$count,['sql'=>$sql,'companies'=>$companies]);
    }
    
    public function view_messages()
    {
     $sql = DB::select("SELECT `contact_id`,`cname`,`cemail`,`csubject`,`cmessage`,DATE_FORMAT(`cdate`, '%d %M, %Y') AS ccdate FROM `contact_us`");
          
     return view('adminpanel.view_messages', compact('sql'));          
    }

    

    public function admin_login_page()
    {
         return view('adminpanel.loginpage');   
    }
    
    public function admin_logout()
    {
        Session::flush();
        return redirect()->action('Admin_controller@admin_login_page')->with('status','Logout Successfully');
    }

    public function auth_admin(Request $request)
    {
        $admin_email    = $request->input('admin_email');
        $admin_password = md5($request->input('admin_password'));    

        $table = 'admin_login';
        $columns = array('admin_id','admin_email','admin_name');
        $where = ['admin_email'=>$admin_email,'admin_password'=>$admin_password];

        $checklogin = General_model::selectwhere($table,$columns,$where);
        //$checklogin = DB::table('admin_login')->select('admin_id','admin_email','admin_name')->where(['admin_email'=>$admin_email,'admin_password'=>$admin_password])->first();

        if(count($checklogin) > 0)
        {
            $request->session()->put('admin_id',$checklogin->admin_id);
            $request->session()->put('admin_name',$checklogin->admin_name);
            $request->session()->put('admin_email',$checklogin->admin_email);

            return redirect()->action('Admin_controller@index');

        } else {
            return redirect()->action('Admin_controller@admin_login_page')->with('status','Incorrect Email ID or Password');
        }
    
    }

    /****************************************** CITY FUNCTIONS START *******************************************/
    
    // ADD / VIEW / UPDATE / DELETE CITY
    public function cities_page()
    {
        $columns = array('city_name','city_id');
        $table = 'city';    

        $data = General_model::selectrecord($columns,$table);

        return view('adminpanel.cities_page', compact('data')); 
    }
    
    // CREATE NEW CITY
    public function create_city(Request $request)
    {   
        
        $maxID = General_model::findMax('city_id','city');
        
        foreach($maxID as $maxID)
        {
        $maxID = $maxID->maxID;
        }
                
        $name = $request->input('city_name');

        $data = ['city_id' =>$maxID, 'city_name' => $name];

        General_model::createrecord($data,'city');

        return redirect()->action('Admin_controller@cities_page')->with('status','Record Created Successfully!');

    }
    
    // DELTE CITY
    
    public function deletecity($city_id)
    {         
         DB::table('city')->where('city_id', '=', $city_id)->delete();
         return redirect()->action('Admin_controller@cities_page')->with('status','Record Deleted Successfully!');
    }
    
    // EDIT CITY FORM
    
    public function edit_city($city_id)
    {
     $query = "SELECT `city_name`,`city_id` FROM `city` WHERE `city_id` = $city_id";
     $sql = General_model::rawQuery($query);
     
     foreach($sql as $sql)
     {
     $city_name = $sql->city_name;
     $city_id = $sql->city_id;
     }
          
     $data['city_name'] = $city_name;
     $data['city_id']   = $city_id;
     
     return view('adminpanel.edit_city',$data);        
    }
    
    
    // EDIT CITY QUERY
    
    public function editcityquery(Request $request)
    {
    
    $city_id   = $request->input('city_id');    
    $city_name = $request->input('city_name');   
    
    $tbl  = 'city';    
    $data = ['city_name'=>$city_name];
    $conditions = [['city_id', '=', $city_id]];
    
    General_model::editrecord($data,$conditions,$tbl);
    
    return redirect()->action('Admin_controller@cities_page')->with('status','Record Updated Successfully!');

    }


    /****************************************** CITY FUNCTIONS END *******************************************/
    
    
    /****************************************** JOB CATEGORY FUNCTIONS START *******************************************/
    
    public function add_category()
    {
        $columns = array('category_id','category_title');
        $table = 'job_category';    

        $data = General_model::selectrecord($columns,$table);

        return view('adminpanel.jobcategory.add_category', compact('data'));     
    }
    
        
    // CREATE NEW CATEGORY
    public function create_category(Request $request)
    {   
        
        $maxID = General_model::findMax('category_id','job_category');
        
        foreach($maxID as $maxID)
        {
        $maxID = $maxID->maxID;
        }
                
        $category_title = strtoupper($request->input('category_title'));

        $data = ['category_id' =>$maxID, 'category_title' => $category_title];

        General_model::createrecord($data,'job_category');

        return redirect()->action('Admin_controller@add_category')->with('status','Record Created Successfully!');;
    }
    
    
    
    public function editcategory($category_id)
    {
     $query = "SELECT `category_title`,`category_id` FROM `job_category` WHERE `category_id` = $category_id";
     $sql = General_model::rawQuery($query);
     
     foreach($sql as $sql)
     {
     $category_title = $sql->category_title;
     $category_id = $sql->category_id;
     }
          
     $data['category_title'] = $category_title;
     $data['category_id']   = $category_id;
     
     return view('adminpanel.jobcategory.edit_category',$data);        
    }
    
    public function editcategoryquery(Request $request)
    {
    $category_id   = $request->input('category_id');    
    $category_title = strtoupper($request->input('category_title'));   
    
    $tbl  = 'job_category';    
    $data = ['category_title'=>$category_title];
    $conditions = [['category_id', '=', $category_id]];
    
    General_model::editrecord($data,$conditions,$tbl);
    
    return redirect()->action('Admin_controller@add_category')->with('status','Record Updated Successfully!');  
    }
    
    public function deletecategory($category_id)
    {
        DB::table('job_category')->where('category_id', '=', $category_id)->delete();
        return redirect()->action('Admin_controller@add_category')->with('status','Record Deleted Successfully!');    
    }


    /****************************************** JOB CATEGORY FUNCTIONS END *******************************************/


    /****************************************** COMPANY TYPES FUNCTIONS START *******************************************/
    
    public function add_company_type()
    {
        $columns = array('company_type_id','company_type_title');
        $table = 'company_type';    

        $data = General_model::selectrecord($columns,$table);

        return view('adminpanel.company_types.company_types', compact('data'));         
    }
    
    public function create_company_type(Request $request)
    {
        $maxID = General_model::findMax('company_type_id','company_type');
        
        foreach($maxID as $maxID)
        {
        $maxID = $maxID->maxID;
        }
                
        $company_type_title = strtoupper($request->input('company_type_title'));

        $data = ['company_type_id' =>$maxID, 'company_type_title' => $company_type_title];

        General_model::createrecord($data,'company_type');

        return redirect()->action('Admin_controller@add_company_type')->with('status','Record Created Successfully!');    
    }
    
    public function deleteccompanytype($company_type_id)
    {
        DB::table('company_type')->where('company_type_id', '=', $company_type_id)->delete();
        return redirect()->action('Admin_controller@add_company_type')->with('status','Record Deleted Successfully!');    
    }

    /****************************************** COMPANY TYPES FUNCTIONS END *******************************************/
    

    /****************************************** JOBS FUNCTIONS START *******************************************/
    
    
    public function view_all_jobs()
    {
       $query = "SELECT jd.*,DATE_FORMAT(jd.`date_expiry`, '%d %M, %Y') AS exd,DATE_FORMAT(jd.`date_posted`, '%d %M, %Y') AS psd, cd.`company_name`,cd.`login_email`, jc.`category_title`, jt.`job_type_title`, cc.`city_name`
                 FROM `job_details` AS jd
                 JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`
                 JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id`
                 JOIN `job_type` AS jt ON jt.`job_type_id`=jd.`job_type_id`
                 JOIN `city` AS cc ON cc.`city_id`=jd.`city_id`
                 WHERE jd.`date_expiry` >= TIMESTAMP(CURRENT_DATE)
                 ORDER BY jd.`job_id` DESC";

      $sql = General_model::rawQuery($query);
      
      $count_jobs = "SELECT COUNT(jd.`job_id`) AS total_jobs FROM `job_details` AS jd
                     JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`";
        
        $sql2 = General_model::rawQuery($count_jobs);
        
        foreach($sql2 as $count)
        {
        $data['total_jobs'] = $count->total_jobs;
        }
        
       
      return view('adminpanel.jobs.view_all_jobs',$data,compact('sql'));        
    }

    public function unverified_jobs_page()
    {
     
      $sql = General_model::view_unverified_jobs();
            
       $count['count'] = count($sql);   
       
       return view('adminpanel.jobs.unverfied_jobs',$count,compact('sql'));        
    }
    
    public function suspicious_jobs_page()
    {
        $data = General_model::view_all_suspecious_jobs();
        
        $count['count'] = count($data);   
    
        return view('adminpanel.jobs.suspicious_jobs',$count,compact('data'));   
    }
    
    public function clear_job($job_id)
    {
      $tbl  = 'job_details';    
      $data = ['is_suspecious'=>'NO'];
      $conditions = [['job_id', '=', $job_id]];
    
      General_model::editrecord($data,$conditions,$tbl);
      
     return redirect()->back()->with('status','Changes saved.');

    }
    
    // View all Active Jobs
    public function all_active_jobs()
    {
        $sql = General_model::view_jobs();
        
        $count['count'] = count($sql);   
        
        return view('adminpanel.jobs.all_active_jobs',$count,compact('sql'));      
    }
    
    // View all Expired Jobs
    
    public function expired_jobs()
    {
        $sql = General_model::view_expired_jobs();
        
        $count['count'] = count($sql);   
        
        return view('adminpanel.jobs.all_expired_jobs',$count,compact('sql'));      
    }

    public function jobs_details($job_id)
    {
       $query = "SELECT jd.*,DATE_FORMAT(jd.`date_expiry`, '%d %M, %Y') AS exd,DATE_FORMAT(jd.`date_posted`, '%d %M, %Y') AS psd, cd.`company_name`,cd.`login_email`, jc.`category_title`, jt.`job_type_title`, cc.`city_name`
                FROM `job_details` AS jd
                JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`
                JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id`
                JOIN `job_type` AS jt ON jt.`job_type_id`=jd.`job_type_id`
                JOIN `city` AS cc ON cc.`city_id`=jd.`city_id`
                WHERE jd.`job_id`=$job_id";
      
      $sql = General_model::rawQuery($query);
            
        foreach($sql as $q)
        {
            $data['job_title']       = $q->job_title;
            $data['date_expiry']     = $q->exd;
            $data['date_posted']     = $q->psd;
            $data['company_name']    = $q->company_name;
            $data['category_title']  = $q->category_title;
            $data['job_type_title']  = $q->job_type_title;
            $data['city_name']       = $q->city_name;
            $data['company_id']      = $q->company_id;
            $data['job_id']          = $q->job_id;
            $data['apply_guidance']  = $q->apply_guidance;
            
            $data['category_id']             = $q->category_id;
            $data['city_id']                 = $q->apply_guidance;
            $data['duty_responsibilities']   = $q->duty_responsibilities;
            $data['experience_required']     = $q->experience_required;
            $data['is_active']               = $q->is_active;
            $data['is_verified']             = $q->is_verified;
            $data['job_details']             = $q->job_details;
            
            $data['job_salary']              = $q->job_salary;
            $data['no_vacancy']              = $q->no_vacancy;
            $data['other_locations']         = $q->other_locations;
            $data['qualification_required']  = $q->qualification_required;
            $data['skills_required']         = $q->skills_required;
            $data['travel_required']         = $q->travel_required;
            
            $company_id = $data['company_id'];
            $data['login_email']       = $q->login_email;
        }
                
        $other_jobs = DB::table('job_details')
                        ->join('company_details', 'job_details.company_id', '=', 'company_details.company_id')
                        ->join('job_category', 'job_details.category_id', '=', 'job_category.category_id')
                        ->join('job_type', 'job_details.job_type_id', '=', 'job_type.job_type_id')
                        ->join('city', 'job_details.city_id', '=', 'city.city_id')
                        ->select('job_details.*','company_details.company_name','company_details.login_email','job_category.category_title','job_type.job_type_title','city.city_name')
                        ->where('job_details.company_id', '=', $company_id)
                        ->get();
        
        
        $count_jobs = "SELECT COUNT(jd.`job_id`) AS total_jobs FROM `job_details` AS jd
                       JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`
                       WHERE jd.`company_id`=$company_id";
        
        $sql2 = General_model::rawQuery($count_jobs);
        
        foreach($sql2 as $count)
        {
            $data['total_jobs'] = $count->total_jobs;
        }
        
        return view('adminpanel.jobs.jobs_details',$data, compact('other_jobs'));   
          
          
    }
    
    
    
    public function verify_job_vacancy(Request $request)
    {
      $job_id      = $request->input('job_id');
      $job_title   = $request->input('job_title');
      $login_email = $request->input('login_email');
      $company_name = $request->input('company_name');
      
      
      $tbl  = 'job_details';    
      $data = ['is_verified'=>'YES'];
      $conditions = [['job_id', '=', $job_id],['job_title', '=', $job_title]];
    
      General_model::editrecord($data,$conditions,$tbl);
      
      
      $data = ['company_name'=>$company_name,
               'login_email'=>$login_email,
               'job_title'=>$job_title,
               'job_id'=>$job_id,
               'date_posted'=>date('Y-m-d')];
      
       Mail::send('emails.verify_job', $data, function($message) use ($data){

                $message->to($data['login_email']);
                $message->subject('Your job vacancy has been verified.');
       });    
    
      return redirect()->back()->with('status','Job has been verified.');
    
    }


    /****************************************** JOBS FUNCTIONS END *******************************************/
    
    /****************************************** SCHOLARSHIPS FUNCTIONS START *****************************************/
    
    public function add_scholarships()
    {
                      
       $countries =  $data = DB::table('country')->get();
             
       return view('adminpanel.add_scholarship',compact('countries'));   
    }
    
    public function add_scholarship_query(Request $request)
    {
        $maxID = General_model::findMax('sch_id','scholarships');
        
        foreach($maxID as $maxID)
        {  $maxID = $maxID->maxID; }

        $data =['sch_id' => $maxID,
                'sch_title' =>ucwords($request->input('sch_title')),
                'institute_name' => ucwords($request->input('institute_name')),
                'country_id' => $request->input('country_id'),
                'degree_level' => $request->input('degree_level'),
                'start_date' => $request->input('start_date'),
                'closing_date' => $request->input('closing_date'),
                'sch_description' => $request->input('sch_description'),
                'field_of_study' => $request->input('field_of_study'),
                'target_audience' => $request->input('target_audience'),
                'sch_value' => $request->input('sch_value'),
                'eligibility' => $request->input('eligibility'),
                'how_to_apply' => $request->input('how_to_apply'),
                'original_source' => $request->input('original_source'),
                'no_of_scholarships' => $request->input('no_of_scholarships')
            ];
        
        General_model::createrecord($data,'scholarships');

        return redirect()->back()->with('status','Record Created Successfully!');  
    }
    
    public function view_scholarships()
    {
       $sql = General_model::view_scholarships();
                   
       $count['count'] = count($sql);   
       
       return view('adminpanel.view_scholarships',$count, compact('sql'));     
    }
    
    public function delete_scholarship($sch_id)
    {
        DB::table('scholarships')->where('sch_id', '=', $sch_id)->delete();
        return redirect()->action('Admin_controller@view_scholarships')->with('status','Record Deleted Successfully!');     
    }
    
    public function scholarship_details($sch_id)
    {
      $sql = General_model::scholarship_details($sch_id);
      foreach($sql as $q)
        {
            $data['sch_title']       = $q->sch_title;
            $data['institute_name']     = $q->institute_name;
            $data['country_id']     = $q->country_id;
            $data['degree_level']    = $q->degree_level;
            $data['start_date']  = $q->start_date;
            $data['closing_date']  = $q->closing_date;
            $data['sch_description']       = $q->sch_description;
            $data['field_of_study']      = $q->field_of_study;
            $data['target_audience']          = $q->target_audience;
            $data['sch_value']  = $q->sch_value;
            $data['eligibility']             = $q->eligibility;
            $data['how_to_apply']                 = $q->how_to_apply;
            $data['original_source']   = $q->original_source;
            $data['no_of_scholarships']     = $q->no_of_scholarships;
            $data['country_name']     = $q->country_name;
            $data['sch_id'] = $sch_id;
        } 
        
      return view('adminpanel.scholarship_details',$data);        

    }
    
    public function edit_scholarship($sch_id)
    {
      $sql = General_model::scholarship_details($sch_id);
      foreach($sql as $q)
        {
            $data['sch_title']       = $q->sch_title;
            $data['institute_name']     = $q->institute_name;
            $data['country_id']     = $q->country_id;
            $data['degree_level']    = $q->degree_level;
            $data['start_date']  = $q->start_date;
            $data['closing_date']  = $q->closing_date;
            $data['sch_description']       = $q->sch_description;
            $data['field_of_study']      = $q->field_of_study;
            $data['target_audience']          = $q->target_audience;
            $data['sch_value']  = $q->sch_value;
            $data['eligibility']             = $q->eligibility;
            $data['how_to_apply']                 = $q->how_to_apply;
            $data['original_source']   = $q->original_source;
            $data['no_of_scholarships']     = $q->no_of_scholarships;
            $data['country_name']     = $q->country_name;
            $data['sch_id'] = $sch_id;
        } 
        
      $countries=DB::table('country')->get();
        
      return view('adminpanel.edit_scholarship',$data, compact('countries'));      
    }
    
    public function edit_scholarship_query(Request $request)
    {
      $data =['sch_title' =>ucwords($request->input('sch_title')),
              'institute_name' => ucwords($request->input('institute_name')),
              'country_id' => $request->input('country_id'),
              'degree_level' => $request->input('degree_level'),
              'start_date' => $request->input('start_date'),
              'closing_date' => $request->input('closing_date'),
              'sch_description' => $request->input('sch_description'),
              'field_of_study' => $request->input('field_of_study'),
              'target_audience' => $request->input('target_audience'),
              'sch_value' => $request->input('sch_value'),
              'eligibility' => $request->input('eligibility'),
              'how_to_apply' => $request->input('how_to_apply'),
              'original_source' => $request->input('original_source'),
              'no_of_scholarships' => $request->input('no_of_scholarships')
            ];
        
       $tbl  = 'scholarships';    
       $conditions = [['sch_id', '=', $request->input('sch_id')]];
    
      General_model::editrecord($data,$conditions,$tbl);

      return redirect()->back()->with('status','Changes saved successfully!');     
    }

    /****************************************** SCHOLARSHIPS FUNCTIONS END *******************************************/
    
   /****************************************** COMPANY FUNCTIONS START *******************************************/
    
    public function company_details($company_id)
    {
    $query = DB::table('company_details')
             ->join('company_type', 'company_type.company_type_id', '=', 'company_details.company_type_id')
             ->join('login_details', 'login_details.login_email', '=', 'company_details.login_email')
             ->select('company_details.*','company_type.*','login_details.*')
             ->where('company_details.company_id', '=', $company_id)
             ->get();
     
    foreach($query as $q)
                {
                    $data['company_address']    = $q->company_address;
                    $data['company_details']    = $q->company_details;
                    $data['company_id']         = $company_id;
                    $data['company_logo']       = $q->company_logo;
                    $data['company_name']       = $q->company_name;
                    $data['company_type_id']    = $q->company_type_id;
                    $data['company_type_title'] = $q->company_type_title;
                    $data['company_website']    = $q->company_website;
                    $data['login_email']        = $q->login_email;
                    $data['phone_number']       = $q->phone_number;
                    $data['date_created']       = $q->date_created;
                    $data['is_blocked']         = $q->is_blocked;
                    $data['is_verified']        = $q->is_verified;
                    $data['login_type']         = $q->login_type;
                }
                
   $other_jobs = DB::table('job_details')
                 ->join('company_details', 'job_details.company_id', '=', 'company_details.company_id')
                 ->join('job_category', 'job_details.category_id', '=', 'job_category.category_id')
                 ->join('job_type', 'job_details.job_type_id', '=', 'job_type.job_type_id')
                 ->join('city', 'job_details.city_id', '=', 'city.city_id')
                 ->select('job_details.*','company_details.company_name','company_details.login_email','job_category.category_title','job_type.job_type_title','city.city_name')
                 ->where('job_details.company_id', '=', $company_id)->get();
        
        
        $count_jobs = "SELECT COUNT(jd.`job_id`) AS total_jobs FROM `job_details` AS jd
                       JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`
                       WHERE jd.`company_id`=$company_id";
        
        $sql2 = General_model::rawQuery($count_jobs);
        
        foreach($sql2 as $count)
        {
        $data['total_jobs'] = $count->total_jobs;
        }
        

    return view('adminpanel.companydetails',$data,compact('other_jobs'));        

    }
    
    public function active_companies()
    {
      $companies = General_model::view_all_companies();
    
      $count['count'] = count($companies); 
        
      return view('adminpanel.active_companies',$count,['companies'=>$companies]);    
    }
    
    
    public function blocked_companies()
    {
        $companies = DB::table('login_details')
                    ->join('company_details', 'login_details.login_email', '=', 'company_details.login_email')
                    ->join('company_type', 'company_type.company_type_id', '=', 'company_details.company_type_id')
                    ->select('company_details.*','login_details.is_blocked',DB::raw("DATE_FORMAT(login_details.date_created, '%d %M, %Y') AS date_created"),'company_type.company_type_title')
                    ->where('login_details.is_verified','YES')
                    ->where('login_details.is_blocked','YES')->get();
        
        $count['count'] = count($companies); 
        
        return view('adminpanel.blocked_companies',$count,['companies'=>$companies]);  
    }
    
    public function unblock_company(Request $request)
    {
      $company_id      = $request->input('company_id');
      $login_email = $request->input('login_email');
      
      
      $tbl  = 'login_details';    
      $data = ['is_blocked'=>'NO'];
      $conditions = [['login_email', '=', $login_email]];
    
      General_model::editrecord($data,$conditions,$tbl);
      
      return redirect()->back()->with('status','COMPANY HAS BEEN UNBLOCKED.');
        
    }
    
    
    public function block_company(Request $request)
    {
      $company_id      = $request->input('company_id');
      $login_email = $request->input('login_email');
      
      
      $tbl  = 'login_details';    
      $data = ['is_blocked'=>'YES'];
      $conditions = [['login_email', '=', $login_email]];
    
      General_model::editrecord($data,$conditions,$tbl);
      
      return redirect()->back()->with('status','COMPANY HAS BEEN BLOCKED.');
            
    }


    /****************************************** COMPANY FUNCTIONS END *******************************************/
    
    public function all_blocked_jobs()
    {
       $sql = General_model::all_blocked_jobs();
                   
       $count['count'] = count($sql);   
       
       return view('adminpanel.jobs.all_blocked_jobs',$count, compact('sql'));         
    }
    
    public function block_job(Request $request)
    {
      $job_id      = $request->input('job_id');
      $job_title   = $request->input('job_title');
      $login_email = $request->input('login_email');
      $company_name = $request->input('company_name');
      
      
      $tbl  = 'job_details';    
      $data = ['is_active'=>'NO'];
      $conditions = [['job_id', '=', $job_id],['job_title', '=', $job_title]];
    
      General_model::editrecord($data,$conditions,$tbl);
      
      
      $data = ['company_name'=>$company_name,
               'login_email'=>$login_email,
               'job_title'=>$job_title,
               'job_id'=>$job_id,
               'date_posted'=>date('Y-m-d')];
      
       Mail::send('emails.job_blocked', $data, function($message) use ($data){

                $message->to($data['login_email']);
                $message->subject('Your job vacancy has been blocked.');
       });    
    
      return redirect()->back()->with('status','Job has been blocked.');   
    }
    
    public function unblock_job(Request $request)
    {
      $job_id      = $request->input('job_id');
      $job_title   = $request->input('job_title');
      $login_email = $request->input('login_email');
      $company_name = $request->input('company_name');
      
      
      $tbl  = 'job_details';    
      $data = ['is_active'=>'YES'];
      $conditions = [['job_id', '=', $job_id],['job_title', '=', $job_title]];
    
      General_model::editrecord($data,$conditions,$tbl);
      
      
      $data = ['company_name'=>$company_name,
               'login_email'=>$login_email,
               'job_title'=>$job_title,
               'job_id'=>$job_id,
               'date_posted'=>date('Y-m-d')];
      
       Mail::send('emails.job_unblocked', $data, function($message) use ($data){

                $message->to($data['login_email']);
                $message->subject('Your job vacancy has been unblocked.');
       });    
    
      return redirect()->back()->with('status','Job has been unblocked.');       
    }


}

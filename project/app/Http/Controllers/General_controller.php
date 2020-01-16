<?php

namespace App\Http\Controllers;

use App\General_model;

use App\Jobseeker_model;

use App\Http\Requests;

use Session;

use Mail;
use App\Mail\CompanyVerificationEmails;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use File;

use DB;

use Crypt;

class General_controller extends Controller
{
    
    public function index()
    {
        
        $sql = General_model::view_jobs();
        
        return view('index',compact('sql'));      
    }
    
    
    public function termsandcondition()
    {
     return view('termsandcondition');   
    }
    
    
        public function register_page()
    {
        $columns = array('company_type_id','company_type_title');
        $table = 'company_type';    

        $data = General_model::selectrecord($columns,$table);
        return view('register_page',compact('data'));    
    }
    
    public function login_page()
    {
        return view('login_page');       
    }
    
    /* Contact Us Page */
    public function contact_us_page()
    {
      return view('contact_us_page');       
    }
    
    public function contact_us_query(Request $request)
    {
         // Find the MaxID for 'job_details' table
        $maxID = General_model::findMax('contact_id','contact_us');
        foreach($maxID as $maxID) 
        {
        $maxID = $maxID->maxID;
        }    
    
        // insert in login_details table
        $data = ['contact_id'=> $maxID,'cname' =>ucwords($request->input('full_name')),'cemail' => $request->input('email_address'),
                 'csubject' => htmlspecialchars($request->input('subject')),'cmessage' => htmlspecialchars($request->input('message')),'cdate' => date('Y-m-d')
                ];

        General_model::createrecord($data,'contact_us');
        
        return redirect()->action('General_controller@contact_us_page')->with('success','Thank you for your message. We will get back to you soon.');   
    }


    /* COMPANY LOGOUT*/
    public function company_logout()
    {
        Session::flush();
        return redirect()->action('General_controller@login_page')->with('success','Logout Successfully');   
    }
    
    /* JOBSEEKER LOGOUT*/
    public function jobseeker_logout()
    {
        Session::flush();
        return redirect()->action('General_controller@login_page')->with('success','Logout Successfully');   
    }
    
    /* Authenticate User Login */
    public function auth_user_login(Request $request)
    {
        
        $login_email      = strtolower($request->input('email')); 
        $login_type       = $request->input('login_type'); 
        $login_password   = md5($request->input('login_password'));
        
        /* First check if the email address exists */
        
        $table = 'login_details';
        $columns = array('login_email','login_type','login_password','is_verified','is_blocked');
        $where1 = ['login_email'=>$login_email];
        
        $check_email = General_model::selectwhere($table,$columns,$where1);
        
        if(count($check_email) > 0)
        {
            
             /* Check if the password is valid */
             
            $where2 = ['login_email'=>$login_email,'login_password'=>$login_password];
             
             $check_password = General_model::selectwhere($table,$columns,$where2);
             
             if(count($check_password) > 0)
             {
                 
                 /* Check if the account is verified or not */
        
                 $where3 = ['login_email'=>$login_email,
                           'login_password'=>$login_password,
                           'is_verified'=>'YES'];
                 
                 $check_verification = General_model::selectwhere($table,$columns,$where3);
                 
                 if(count($check_verification) > 0)
                 {
                     
                     /* Check if the account is blocked */
                     
                    $where4 = ['login_email'=>$login_email,
                               'login_password'=>$login_password,
                               'is_verified'=>'YES','is_blocked'=>'NO'];
                 
                    $check_blockage = General_model::selectwhere($table,$columns,$where4);
                    
                    if(count($check_blockage) > 0)
                    {
                        
                        /* Check the user type */
                        $where5 = ['login_email'=>$login_email,
                                   'login_password'=>$login_password,'login_type'=>$login_type,
                                   'is_verified'=>'YES','is_blocked'=>'NO'];
                 
                        $check_type = General_model::selectwhere($table,$columns,$where5);
                        
                        if(count($check_type) > 0)
                        {
                                    /* LOGIN */
                            
                                    $request->session()->put('login_email',$login_email);
            
                                    if($login_type=='COMPANY')
                                    {
                                        $login_email  = $request->session()->get('login_email');
                                        
                                        $jobseeker_id   = $request->input('jobseeker_id');
                                        $jobseeker_name = $request->input('jobseeker_name');
                                        
                                        $sql = DB::select("SELECT `company_id`,`company_name`,`login_email` FROM `company_details` WHERE `login_email` = '$login_email'");

                                        foreach($sql as $sql)
                                        {
                                          $company_id = $sql->company_id;
                                          $company_name = $sql->company_name;
                                        }

                                         if ($request->session()->has('jobseeker_id')) {
                                             $request->session()->pull('jobseeker_id');
                                         }
                                         
                                         $request->session()->put('company_id',$company_id); 
                                         $request->session()->put('company_name',$company_name); 
                                        
                                        
                                        if($jobseeker_id == "not_set" && $jobseeker_name="not_set")
                                        {
                                        return redirect()->action('General_controller@company_panel');
                                        } else{
                                        return redirect()->route('applicant_profile', array('id'=>$jobseeker_id,'name'=>$jobseeker_name));
                                        }
                                    } 
                                    
                                    
                                    if ($login_type=='JOBSEEKER')
                                    {
                                        $login_email  = $request->session()->get('login_email'); 
                                        
                                        $job_id    = $request->input('job_id');
                                        $job_title = $request->input('job_title');
                                        
                                        $sql = DB::select("SELECT * FROM `jobseeker_main` WHERE `login_email` = '$login_email'");
                                        
                                        foreach($sql as $sql)
                                        {
                                          $jobseeker_id = $sql->jobseeker_id;
                                          $jobseeker_name = $sql->jobseeker_name;
                                        }

                                         if ($request->session()->has('company_id') && $request->session()->has('company_name')) {
                                             $request->session()->pull('company_id');
                                             $request->session()->pull('company_name');
                                         }
                                         
                                        $request->session()->put('jobseeker_id',$jobseeker_id); 
                                        $request->session()->put('jobseeker_name',$jobseeker_name); 
                                        
                                        if($job_id == "not_set" && $job_title="not_set")
                                        {
                                        return redirect()->action('General_controller@jobseeker_panel');
                                        } else{
                                        //return redirect()->route('jobdetails/'.$job_id.'/'.$job_title);
                                          return redirect()->route('jobdetails', array('id'=>$job_id,'title'=>$job_title));
                                        }
                                    }
                        } else {
                            
                              return redirect()->action('General_controller@login_page')->with('warning','Invalid login type. Please choose login as jobseeker if you are a jobseeker, or login as company if you are an employer.');    
                        }
                        
                    } else {
                        
                        return redirect()->action('General_controller@login_page')->with('warning','The email address you provided has been blocked by team Findajob.af. For further details, please contact us on info@findajob.af.');    
                    }
                     
                 } else {
                     
                     return redirect()->action('General_controller@login_page')->with('warning','The email address you provided is not verified yet. To use the system, you must first verify the address. A verification link was send to the email id when you first created an account with us.');    
                 }
                 
             } else {
               
               return redirect()->action('General_controller@login_page')->with('warning','Incorrect password. Please note that password field is case sensitive.');    
             }

        } else {
          
            return redirect()->action('General_controller@login_page')->with('warning','The email address you provided does not exist in our system.');
        }
    }
    

    /* Check if Email ID Exists */
    public function check_email($emaiAddress)
    {
        $table = 'login_details';
        $columns = array('login_email');
        $where = ['login_email'=>$emaiAddress];
        $checkemail = General_model::selectwhere($table,$columns,$where);
        
        if(count($checkemail) > 0)
        {
          return TRUE;
        } else {
          return FALSE;
        }
    }


    /* COMPANY SIGNUP */
    public function register_company(Request $request)
    {
        $login_email      = strtolower($request->input('email')); 
        
        $checkemail       = $this->check_email($login_email);
        
            if($checkemail==TRUE)
            {
               return back()->with('warning','Email address already exists. Please use a different id or login with your existing id.');
               
            } else {

                $login_password   = md5($request->input('password')); 
                $plain_password   = $request->input('password'); 
                $company_name     = ucwords($request->input('company_name'));   
                $company_details  = htmlspecialchars($request->input('company_details')); 
                $company_website  = $request->input('company_website'); 
                $company_type_id  = htmlspecialchars($request->input('company_type_id'));
                $phone_number     = htmlspecialchars($request->input('phone_number'));
                
                $company_logo     = $_FILES['company_logo']['name'];   

                
                // Find the MaxID for 'company_details' table
                $maxID = General_model::findMax('company_id','company_details');
                foreach($maxID as $maxID) 
                {
                $maxID = $maxID->maxID;
                }
                
                    // get the image extension and rename image 
                    if($company_logo != '')
                    {
                        $extension = File::extension($company_logo);
                        $image_name = str_replace(' ','_',$maxID."_".$company_name.".".$extension);
                        
                    } else {
                        
                        $image_name = 'no_image.png';
                        $extension = 'png';    
                    }

                            if($extension=='jpg' || $extension=='jpeg' || $extension=='JPG' || $extension=='JPEG' || $extension=='png' || $extension=='PNG')
                            {
                                // insert in login_details table
                                $login_details_data = ['login_email' =>$login_email, 
                                                       'login_password' => $login_password,
                                                       'login_type' => 'COMPANY',
                                                       'date_created' => date('Y-m-d')];

                                General_model::createrecord($login_details_data,'login_details');

                                // insert in company_details table
                                $company_details_data = ['login_email'     => $login_email, 
                                                         'company_id'      => $maxID,
                                                         'company_name'    => $company_name,
                                                         'company_details' => $company_details,
                                                         'company_website' => $company_website,
                                                         'company_type_id' => $company_type_id,
                                                         'phone_number'    => $phone_number,
                                                         'company_logo'    => $image_name];

                                General_model::createrecord($company_details_data,'company_details');

                                // upload image
                                if($company_logo != '')
                                {
                                $path = $request->company_logo->storeAs('company_logo',$image_name);
                                }
                                
                               
                                // Sent verification email 
                                $data = ['company_name'=>$company_name,'login_email'=>$login_email,'password'=>$plain_password];
                                
                                Mail::send('emails.comp_ver_emails', $data, function($message) use ($data){
                                                                        
                                    $message->to($data['login_email']);
                                    $message->subject('Please verify your email address to get started');
                                        
                                });
                                                                
                                return redirect()->action('General_controller@signup_confirmation_page')->with('success','Thank you for creating an account with us. We have sent you a verification link to the email address you provided. Please verify your email before using the services.');   
                                
                            } else {

                                return back()->with('warning','Image file not supported. We only accept images of type JPG, PNG, & JPEG.');
                            }
            }
    }
    
    
    /* JOBSEEKER REGISTRATION */
    
    public function register_jobseeker(Request $request)
    {
        $login_email      = strtolower($request->input('login_email')); 
        
        $checkemail       = $this->check_email($login_email);
        
            if($checkemail==TRUE)
            {
               return back()->with('warning','Email address already exists. Please use a different id or login with your existing id.');
            
               
            } else {
                
                $loginn_password        = md5($request->input('loginn_password')); 
                $plain_password         = $request->input('loginn_password'); 
                $jobseeker_name         = ucwords($request->input('jobseeker_name'));   
                $jobseeker_coverletter  = $request->input('jobseeker_coverletter'); 
                $jobseeker_phone        = $request->input('jobseeker_phone'); 
                
                $jobseeker_cv     = $_FILES['jobseeker_cv']['name'];   

                
                // Find the MaxID for 'company_details' table
                $maxID = General_model::findMax('jobseeker_id','jobseeker_main');
                foreach($maxID as $maxID) 
                {
                $maxID = $maxID->maxID;
                }
                
                    // get the cv extension and rename image 
                    if($jobseeker_cv != '')
                    {
                        $extension = File::extension($jobseeker_cv);
                        $file_name = str_replace(' ','_',$maxID."_".$jobseeker_name.".".$extension);
                        
                    } else {
                        
                        $file_name = '';
                        $extension = '';    
                    }
                    
                    
                        if($extension=='doc' || $extension=='docx' || $extension=='pdf' || $extension=='PDF' || $extension=='DOC' || $extension=='DOCX' || $extension=='')
                            {
                                // insert in login_details table
                                $login_details_data = ['login_email' =>$login_email, 
                                                       'login_password' => $loginn_password,
                                                       'login_type' => 'JOBSEEKER',
                                                       'date_created' => date('Y-m-d')];

                                General_model::createrecord($login_details_data,'login_details');

                                // insert in company_details table
                                $company_details_data = ['login_email'     => $login_email, 
                                                         'jobseeker_id'    => $maxID,
                                                         'jobseeker_name'  => $jobseeker_name,
                                                         'jobseeker_coverletter' => $jobseeker_coverletter,
                                                         'jobseeker_phone' => $jobseeker_phone,
                                                         'jobseeker_cv'    => $file_name];

                                General_model::createrecord($company_details_data,'jobseeker_main');

                                // upload image
                                if($file_name != '')
                                {
                                $path = $request->jobseeker_cv->storeAs('jobseekers_cvs',$file_name);
                                }
                                
                               
                                // Sent verification email 
                                $data = ['jobseeker_name'=>$jobseeker_name,'login_email'=>$login_email];
                                
                                Mail::send('emails.jobseeker_ver_emails', $data, function($message) use ($data){
                                                                        
                                    $message->to($data['login_email']);
                                    $message->subject('Please verify your email address to get started');
                                        
                                });
                                                                
                                return redirect()->action('General_controller@signup_confirmation_page')->with('success','Thank you for creating an account with us. We have sent you a verification link to the email address you provided. Please verify your email address before using the services.');   
                                
                            } else {

                                return back()->with('warning','CV file type not supported. We only accept files of type DOC, DOCX, & PDF.');
                            }
            }
    }

    /* COMPANY PROFILE */
    public function company_panel(Request $request)
    {
                
        $login_email  = $request->session()->get('login_email');
        $company_id   = $request->session()->get('company_id');
        $company_name = $request->session()->get('company_name');
        
        $sql = General_model::company_panel($login_email,$company_id,$company_name);
                
        foreach($sql as $sql)
        {   
            $data['company_address'] = $sql->company_address;
            $data['company_logo']    = $sql->company_logo;
            $data['company_details'] = $sql->company_details;
            $data['company_id']      = $sql->company_id;
            $data['company_name']    = $sql->company_name;
            $data['company_type_id'] = $sql->company_type_id;
            $data['company_website'] = $sql->company_website;
            $data['login_email']     = $sql->login_email;
            $data['phone_number']    = $sql->phone_number;
            $data['date_created']    = $sql->date_created;
            $data['is_verified']     = $sql->is_verified;
            $data['is_blocked']      = $sql->is_blocked;
            $data['login_password']  = $sql->login_password;
        }
      
        return view('company.company_panel',$data);         
    }
    
    
    /* ADD NEW JOB VAACANCY */
    public function add_vacancy()
    {
        
        $cities     =  DB::table('city')->select('city_id','city_name')->orderBy('city_name', 'asc')->get();
        $categories =  DB::table('job_category')->select('category_id','category_title')->orderBy('category_title', 'asc')->get();
        $job_type   =  DB::table('job_type')->select('job_type_id','job_type_title')->orderBy('job_type_title', 'asc')->get();
        
        return view('company.add_vacancy_form',['cities'=>$cities,'categories'=>$categories,'job_type'=>$job_type]);
    }
    
    
    /* SIGNUP / REGISTRATION CONFIRMTION PAGE */
    public function signup_confirmation_page()
    {
        return view('signup_confirmation_page');          
    }
    
    
    /* FUNCTION TO VERIFY COMPANY'S EMAIL ADDRESS  */
    public function verify_company_email($email_address)
    {
        $tbl  = 'login_details';    
        $data = ['is_verified'=>'YES'];
        $conditions = [['login_email', '=', $email_address]];

        General_model::editrecord($data,$conditions,$tbl);
        
        return redirect()->action('General_controller@login_page')->with('success','Your email address has been verified. Please login to continue.');   
    }
    
    
    /* ADD NEW JOB QUERY */
    /*public function add_job_query(Request $request)
    {
        
     // Find the MaxID for 'job_details' table
     $maxID = General_model::findMax('job_id','job_details');
     foreach($maxID as $maxID) 
     {
     $maxID = $maxID->maxID;
     }
     
     $company_id = $request->session()->get('company_id');
     
     $company_details_data = ['job_id'          => $maxID, 
                              'company_id'      => $company_id,
                              'job_title'       => ucwords($request->input('job_title')),
                              'vacancy_no'    =>  $request->input('vacancy_no'),
                              'category_id'    =>  $request->input('category_id'),
                              'job_type_id'     => $request->input('job_type_id'),
                              'city_id'         => $request->input('city_id'),
                              'travel_required' => $request->input('travel_required'),
                              'other_locations' => ucwords($request->input('other_locations')),
                              'no_vacancy'      => $request->input('no_vacancy'),
                              'job_salary'      => $request->input('job_salary'),
                              'date_expiry'     => $request->input('date_expiry'),
                              'job_details'     => $request->input('job_details'),
                              'date_posted'     => date('Y-m-d'),
                              'qualification_required' => $request->input('qualification_required'),
                              'experience_required'    => $request->input('experience_required'),
                              'skills_required'        => $request->input('skills_required'),
                              'apply_guidance'         => $request->input('apply_guidance'),
                              'duty_responsibilities'  => $request->input('duty_responsibilities')
                             ];

    General_model::createrecord($company_details_data,'job_details');
    
    // Sent confirmation email
    
        $getdata = DB::select("SELECT `login_email`,`company_name` FROM `company_details` WHERE `company_id` = $company_id");
     
        foreach($getdata as $sql)
        {
        $login_email = $sql->login_email;
        $company_name= $sql->company_name;
        }
    
            $data = ['company_name'=>$company_name,
                     'login_email'=>$login_email,
                     'job_title'=>ucwords($request->input('job_title')),
                     'date_posted'=>date('Y-m-d')];

            Mail::send('emails.new_job_post', $data, function($message) use ($data){

                $message->to($data['login_email']);
                $message->subject('Thank you for posting a job with us.');
            });                                        
     
    return redirect()->action('General_controller@company_panel')->with('success','Thank you for posting a job with us. Your job vacancy will be visible on the site once we verify its genuineness. The process takes 24 hours max. ');   
    }*/
    
    public function add_job_query(Request $request)
    {
     
     $company_id = $request->session()->get('company_id');
     
     // check if job is suspecious
     $chk_details    = str_word_count($request->input('job_details'));
     $chk_education  = str_word_count($request->input('qualification_required'));
     $chk_experience = str_word_count($request->input('experience_required'));
     $chk_duty       = str_word_count($request->input('duty_responsibilities'));
     
     $restricted_words = array('bank account','sent money','amount','money','credit card','identification number','account details','passport number');
        
     if($chk_details < 100 || $chk_education < 30 || $chk_experience < 30 || $chk_duty < 100)
     {
       $is_suspecious = 'YES';
       
     } else {
              
        foreach($restricted_words as $keyword) {
           if (strpos($request->input('job_details'), $keyword) !== false) {
                $is_suspecious = 'YES';
                 echo "Suspecious because of use of words";
                break; 
            } else {
                $is_suspecious = 'NO';
            }
        }
     }
    
     $maxID = General_model::findMax('job_id','job_details');
     foreach($maxID as $maxID) { $maxID = $maxID->maxID; }
     
     $company_details_data = ['job_id'          => $maxID, 
                              'company_id'      => $company_id,
                              'job_title'       => ucwords($request->input('job_title')),
                              'vacancy_no'    =>  $request->input('vacancy_no'),
                              'category_id'    =>  $request->input('category_id'),
                              'job_type_id'     => $request->input('job_type_id'),
                              'city_id'         => $request->input('city_id'),
                              'travel_required' => $request->input('travel_required'),
                              'other_locations' => ucwords($request->input('other_locations')),
                              'no_vacancy'      => $request->input('no_vacancy'),
                              'job_salary'      => $request->input('job_salary'),
                              'date_expiry'     => $request->input('date_expiry'),
                              'job_details'     => $request->input('job_details'),
                              'date_posted'     => date('Y-m-d'),
                              'qualification_required' => $request->input('qualification_required'),
                              'experience_required'    => $request->input('experience_required'),
                              'skills_required'        => $request->input('skills_required'),
                              'apply_guidance'         => $request->input('apply_guidance'),
                              'duty_responsibilities'  => $request->input('duty_responsibilities'),
                              'is_suspecious' => $is_suspecious
                             ];
 
    General_model::createrecord($company_details_data,'job_details');     
    
        // Sent confirmation email
        $getdata = DB::select("SELECT `login_email`,`company_name` FROM `company_details` WHERE `company_id` = $company_id");
     
        foreach($getdata as $sql)
        {
        $login_email = $sql->login_email;
        $company_name= $sql->company_name;
        }
    
            $data = ['company_name'=>$company_name,
                     'login_email'=>$login_email,
                     'job_title'=>ucwords($request->input('job_title')),
                     'date_posted'=>date('Y-m-d')];

            Mail::send('emails.new_job_post', $data, function($message) use ($data){

                $message->to($data['login_email']);
                $message->subject('Thank you for posting a job with us.');
            });                                        
     
    return redirect()->action('General_controller@company_panel')->with('success','Thank you for posting a job with us. Your job vacancy will be visible on the site once we verify its genuineness. The process takes 24 hours max. ');   
    
    }
    
    public function view_job_details($job_id,$job_title,Request $request)
    {
        
        $sql = General_model::view_job_details($job_id);
        
        foreach($sql as $q)
        {
            $data['job_title']       = $q->job_title;
            $data['vacancy_no']      = $q->vacancy_no;
            $data['date_expiry']     = $q->exd;
            $data['date_posted']     = $q->psd;
            $data['company_name']    = $q->company_name;
            $data['company_details'] = $q->company_details;
            $data['company_logo']    = $q->company_logo;
            $data['category_title']  = $q->category_title;
            $data['job_type_title']  = $q->job_type_title;
            $data['city_name']       = $q->city_name;
            $data['company_id']      = $q->company_id;
            $data['apply_guidance']  = $q->apply_guidance;
            
            $data['category_id']             = $q->category_id;
            $data['city_id']                 = $q->city_id;
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
            $data['login_email'] = $q->login_email;
        }
        
         if ($request->session()->has('jobseeker_id')) {
            
                $jobseeker_id = $request->session()->get('jobseeker_id');

                $check = DB::select("SELECT COUNT(`afj_id`) AS tot FROM `applicants_for_job` WHERE `job_id` = $job_id AND `jobseeker_id` = $jobseeker_id");

                    foreach ($check as $sql3)
                    {
                      $data['count'] = $sql3->tot;  
                    }
         } else {
                $data['count'] = 0;
         }
        
        $data['job_id'] = $job_id;
        
        return view('jobs.jobdetails',$data);
    }
    
    
    /* JOBSEEKER PANEL */
    public function jobseeker_panel(Request $request)
    {
        $login_email    = $request->session()->get('login_email');
        $jobseeker_id   = $request->session()->get('jobseeker_id');
        
        $sql = General_model::jobseeker_panel($login_email,$jobseeker_id);
        
        foreach($sql as $sql)
        {
            $data['jobseeker_coverletter'] = $sql->jobseeker_coverletter;
            $data['jobseeker_cv']          = $sql->jobseeker_cv;
            $data['jobseeker_id']          = $sql->jobseeker_id;
            $data['jobseeker_image']       = $sql->jobseeker_image;
            $data['jobseeker_name']        = $sql->jobseeker_name;
            $data['date_created']          = $sql->date_created;
            $data['login_email']           = $sql->login_email;
            $data['login_type']            = $sql->login_type;
            $data['is_verified']           = $sql->is_verified;
            $data['is_blocked']            = $sql->is_blocked;
            $data['login_password']        = $sql->login_password;
            $data['jobseeker_phone']       = $sql->jobseeker_phone;
            $data['jobseeker_linkedin']    = $sql->jobseeker_linkedin;
            $data['jobseeker_education']   = $sql->jobseeker_education;
            $data['jobseeker_experience']  = $sql->jobseeker_experience;
        }
        
        $education = Jobseeker_model::jobseeker_education($jobseeker_id);

        $experience = Jobseeker_model::jobseeker_experience($jobseeker_id);
      
        return view('jobseeker.jobseeker_panel',$data,['education'=>$education,'experience'=>$experience]);
    }
    
    
    /* Reset Password Page */
    public function reset_password()
    {
       return view('reset_password'); 
    }
    
    public function reset_password_link(Request $request)
    {
        $email = strtolower($request->input('email'));
        
        $encrypt_email = Crypt::encrypt($email);
        $decemail = Crypt::decrypt($encrypt_email);
        
        $checkemail       = $this->check_email($email);
        
        if($checkemail==FALSE)
        {
            return back()->with('warning','The email address you provide does not exist in our system.');  
            
        } else {
                
             // Sent verification email 
            $data = ['encrypt_email'=>$encrypt_email,'login_email'=>$email];
                                
            Mail::send('emails.password_reset', $data, function($message) use ($data)
            {
                $message->to($data['login_email']);
                $message->subject('Reset your password - Findajob.af');                            
            });
            
            return back()->with('success','A password reset link is sent to the email address '.$email);                                    
        }
    }
    
    
    public function change_password($encrypt_email)
    {
        return view('change_password')->with('encrypt_email',$encrypt_email);
    }
    
    public function change_passwordquery(Request $request)
    {
            $new_password = md5($request->input('new_password'));
            
            $email =  Crypt::decrypt($request->input('encrypt_email'));
        
            $tbl  = 'login_details';    
            $data = ['login_password'=>$new_password];
            $conditions = [['login_email', '=', $email]];
            
            General_model::editrecord($data,$conditions,$tbl);  
                
            return redirect()->action('General_controller@login_page')->with('success','Password changed successfully.');   
    }
    

    /* CHECK ID JOBSEEKER IS ONLINE */
    public function apply_now_page($job_id,$job_title,Request $request)
    {
        if ($request->session()->has('jobseeker_id')) {
            
            $jobseeker_id = $request->session()->get('jobseeker_id');
            
            
             $sql = General_model::apply_now_page($job_id);
             
                foreach($sql as $q)
                {
                    $data['title']           = $q->job_title;
                    $data['vacancy_no']      = $q->vacancy_no;
                    $data['company_name']    = $q->company_name;
                    $data['category_title']  = $q->category_title;
                    $data['job_type_title']  = $q->job_type_title;
                    $data['city_name']       = $q->city_name;
                }
                                
                    $jobseekerdetails = DB::select("SELECT `jobseeker_name`,`jobseeker_coverletter`,`jobseeker_cv` FROM `jobseeker_main` WHERE `jobseeker_id` = $jobseeker_id");

                    foreach($jobseekerdetails as $sql2)
                    {
                       $data['jobseeker_name']        = $sql2->jobseeker_name;
                       $data['jobseeker_coverletter'] = $sql2->jobseeker_coverletter;
                       $data['jobseeker_cv']          = $sql2->jobseeker_cv;
                    }
                 
                    $data['id'] = $jobseeker_id;
                    $data['job_title'] = $job_title;;
                    $data['job_id'] = $job_id;
            
            /* check if jobseeker has applied for this job */
            
            $check = DB::select("SELECT COUNT(`afj_id`) AS tot FROM `applicants_for_job` WHERE `job_id` = $job_id AND `jobseeker_id` = $jobseeker_id");
            
            foreach ($check as $sql3)
            {
              $data['count'] = $sql3->tot;  
            }
            
            return view('apply_now',$data);         
            
        } else {
            
          $data = ['warning'=>'In order to apply for a job, you must first login as a jobseeker.','job_id'=>$job_id,'job_title'=>$job_title];
            
          return redirect()->action('General_controller@login_page')->with($data);       
            
        }
        
    }
    
    /* JOB SEARCH QUERY */
   public function jobsearch(Request $request) {

    $keyword = $request->input('keyword');
    $city_id = $request->input('city_id');
    $category_id = $request->input('category_id');

    $query = DB::table('job_details')
            ->join('company_details', 'job_details.company_id', '=', 'company_details.company_id')
            ->join('job_type', 'job_details.job_type_id', '=', 'job_type.job_type_id')
            ->join('city', 'job_details.city_id', '=', 'city.city_id')
            ->join('job_category', 'job_details.category_id', '=', 'job_category.category_id')
            ->select('job_details.job_id','job_details.job_title',DB::raw("DATE_FORMAT(job_details.date_expiry, '%d %M, %Y') AS exd"),'company_details.company_id','company_details.company_name','job_type.job_type_title','city.city_name','job_category.category_title');
    
    if($keyword) { $query->where('job_details.job_title', 'like', '%'.$keyword.'%'); }

    if($city_id) {  $query->where('job_details.city_id', $city_id); }

    if($category_id) { $query->where('job_details.category_id', $category_id); }

    $data = $query->get();
    
    $count['count'] = count($data);

    return view('jobsearch',$count,compact('data'));   

    }
    
    // Search By Category
    public function search_by_category($category_id,$category_title)
    {
        $data = DB::table('job_details')
                    ->join('company_details', 'job_details.company_id', '=', 'company_details.company_id')
                    ->join('job_type', 'job_details.job_type_id', '=', 'job_type.job_type_id')
                    ->join('city', 'job_details.city_id', '=', 'city.city_id')
                    ->join('job_category', 'job_details.category_id', '=', 'job_category.category_id')
                    ->select('job_details.job_id','job_details.job_title',DB::raw("DATE_FORMAT(job_details.date_expiry, '%d %M, %Y') AS exd"),'company_details.company_id','company_details.company_name','job_type.job_type_title','city.city_name','job_category.category_title')
                    ->where('job_details.category_id', $category_id)->get();
        
            $count['count'] = count($data);

        
        return view('jobsearch',$count,compact('data'));   
    }
    
    public function scholarships()
    {
       $sql = General_model::view_scholarships();
       
       $countries=DB::table('country')->get();
                          
       return view('scholarships',['sql'=>$sql,'countries'=>$countries]);    
    }
    
    public function scholarship_description($sch_id)
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
                
      return view('scholarship_description',$data);  
    }
    
    public function scholarship_search(Request $request)
    {
        $keyword      = $request->input('keyword');
        $country_id   = $request->input('country_id');
        $degree_level = $request->input('degree_level');

        $query = DB::table('scholarships')
                ->join('country','country.country_id','=','scholarships.country_id')
                ->select('scholarships.*','country.country_name');

        if($keyword) { $query->where('scholarships.sch_title', 'like', '%'.$keyword.'%')->orderBy('scholarships.sch_id','desc'); }

        if($country_id) {  $query->where('scholarships.country_id', $country_id)->orderBy('scholarships.sch_id','desc'); }

        if($degree_level) { $query->where('scholarships.degree_level', 'like', '%'.$degree_level.'%')->orderBy('scholarships.sch_id','desc'); }

        $sql = $query->get();

        $count['count'] = count($sql);
        
        $countries=DB::table('country')->get();

        return view('scholarship_search',$count,['sql'=>$sql,'countries'=>$countries]);     
    }
    
    
}
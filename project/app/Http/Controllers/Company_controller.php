<?php

namespace App\Http\Controllers;

use App\General_model;

use App\Company_model;

use App\Http\Requests;

use Session;

use Mail;

use App\Mail\CompanyVerificationEmails;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Illuminate\Support\Facades\Storage;

use File;

use DB;

class Company_controller extends Controller
{
    /* Edit Profile Page */
    public function edit_profile_page(Request $request)
    {
        $login_email  = $request->session()->get('login_email');
        $company_id   = $request->session()->get('company_id');
        $company_name = $request->session()->get('company_name');
        
        $sql = Company_model::editProfile($company_id,$login_email);
          
        foreach($sql as $sql)
        {
            $data['company_type_title'] = $sql->company_type_title;
            $data['company_type_id']    = $sql->company_type_id;
            $data['company_details']    = $sql->company_details;
            $data['company_name']       = $sql->company_name;
            $data['company_website']    = $sql->company_website;
            $data['phone_number']       = $sql->phone_number;
            $data['company_address']    = $sql->company_address;
        }
         
        $query2 = "SELECT `company_type_id`,`company_type_title` FROM `company_type`";
        $types = General_model::rawQuery($query2);
         
         return view('company.edit_profile_info',$data,compact('types'));    
    }
    
    public function cedit_profile_query(Request $request)
    {
        $login_email  = $request->session()->get('login_email');
        $company_id   = $request->session()->get('company_id');
        
        $company_name     = ucwords($request->input('company_name'));   
        $company_type_id  = $request->input('company_type_id'); 
        $company_details  = $request->input('company_details'); 
        $company_website  = $request->input('company_website'); 
        $phone_number     = $request->input('phone_number'); 
        $company_address  = $request->input('company_address'); 
        
         $tbl  = 'company_details';
         
         $data = ['company_name'=>$company_name,
                  'company_type_id'=>$company_type_id,
                  'company_details'=>$company_details,
                  'company_website'=>$company_website,
                  'phone_number'=>$phone_number,
                  'company_address'=>$company_address];
         
         $conditions = [['company_id', '=', $company_id],['login_email', '=', $login_email]];
         
         if($company_details !='' && $company_details != NULL)
         {
              
         General_model::editrecord($data,$conditions,$tbl);
         
         $request->session()->pull('company_name');
         
         $request->session()->put('company_name',$company_name); 
         
         return redirect()->back()->with('success','Information saved successfully.');  
         
         } else {
             
         return redirect()->back()->with('warning','Company details field cannot be empty.');  
         }
    }
    
    
    /* Change Password */
    public function cchange_password()
    {
      return view('company.cchange_password');        
    }
    
    public function cchange_password_query(Request $request)
    {
        $login_email = $request->session()->get('login_email');         
        
        $old_password = md5($request->input('old_password'));
        $new_password = md5($request->input('new_password'));
        
        $sql = DB::select("SELECT `login_password` FROM `login_details` WHERE `login_email` = '$login_email'");
                
        foreach($sql as $sql)
        {
        $login_password = $sql->login_password;
        }
        
        if($login_password == $old_password)
        {
            $tbl  = 'login_details';    
            $data = ['login_password'=>$new_password];
            $conditions = [['login_email', '=', $login_email]];
            
            General_model::editrecord($data,$conditions,$tbl);  
                
            return back()->with('success','Password changed successfully.'); 
            
        } else {
            
        return back()->with('warning','Password cannot be changed. Your previous password did not match our record.');   
        
        }  
    }
    
    public function cchange_logo(Request $request)
    {
        $login_email = $request->session()->get('login_email');
        $company_id  = $request->session()->get('company_id');
        
        $query = DB::select("SELECT `company_logo` FROM `company_details` WHERE `company_id` = $company_id AND `login_email` = '$login_email'");
                
        foreach($query as $sql)
        {
        $data['old_logo'] = $sql->company_logo;
        }
        
        return view('company.change_logo',$data);  
    }
    
    public function change_logo_query(Request $request)
    {
        $login_email  = $request->session()->get('login_email');
        $company_id   = $request->session()->get('company_id');
        $company_name = $request->session()->get('company_name');
        
        $company_logo     = $_FILES['company_logo']['name']; 
        
        $old_logo = $request->input('old_logo');
        
         if($company_logo != '')
         {
            $extension = File::extension($company_logo);
            $file_name = str_replace(' ','_',$company_id."_".$company_name.".".$extension);
            
             if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='JPG' || $extension=='JPEG' || $extension=='PNG')
             {
                 $tbl  = 'company_details';    
                 $data = ['company_logo'=>$file_name];
                 $conditions = [
                               ['company_id', '=', $company_id],
                               ['login_email', '=', $login_email],
                               ];
                                
                if($old_logo != '' && $old_logo != 'no_image.png') 
                {
                unlink(storage_path('app/company_logo/'.$old_logo));
                }
                
                $request->company_logo->storeAs('company_logo',$file_name);
                
                General_model::editrecord($data,$conditions,$tbl);  
                
                return back()->with('success','Logo Changed Successfully.'); 
                
             } else {
             
                 return back()->with('warning','Invalid file type. We only accept files of type JPG, JPEG, & PNG.');
             }
          
         } 
    }
    
    
    /* VIEW COMPANY DETAILS */
    public function view_company_details($company_id,$company_name)
    {
        
        $sql = Company_model::view_company_details($company_id);

        foreach($sql as $sql)
        {
            $data['company_type_title'] = $sql->company_type_title;
            $data['company_type_id']    = $sql->company_type_id;
            $data['company_details']    = $sql->company_details;
            $data['company_id']         = $sql->company_id;
            $data['company_name']       = $sql->company_name;
            $data['company_website']    = $sql->company_website;
            $data['phone_number']       = $sql->phone_number;
            $data['company_address']    = $sql->company_address;
            $data['company_logo']       = $sql->company_logo;
        }
        
        return view('company.company_profile',$data);  
    }
    
    
    /* VIEW ALL JOBS BY THIS COMPANY */
    public function jobs_by_company($company_id,$company_name)
    {
        
        $sql = Company_model::jobs_by_company($company_id);
        
        $data['company_name'] = str_replace('_',' ',$company_name);
        
        return view('company.jobs_company',$data,compact('sql'));  

    }
    
    /* SHOW ACTIVE JOBS TO COMPANY */
    public function active_jobs(Request $request)
    {
        $company_id   = $request->session()->get('company_id');
                
        $sql = Company_model::activeJobs($company_id);
                        
        $count = Company_model::countActivejobs($company_id);
                
        foreach($count as $ss)
        {
            $data['total'] = $ss->total;
        }
        
        return view('company.active_jobs_list',$data,compact('sql'));  
    }
    
    
    /* SHOW UNVERIFIED JOBS */
    public function unverified_jobs(Request $request)
    {
     $company_id   = $request->session()->get('company_id');
     
        $sql = Company_model::unverified_jobs($company_id);
                        
        $count = Company_model::count_unverified_jobs($company_id);
            
        foreach($count as $ss)
        {
            $data['total'] = $ss->total;
        }
        
        return view('company.unverified_jobs_list',$data,compact('sql'));    
    }
    
    
    /* SHOW EXPIRED JOBS */
    public function expired_vacancies(Request $request)
    {
       $company_id   = $request->session()->get('company_id');
       
       $sql = Company_model::expired_jobs($company_id);
                        
       $count = Company_model::count_expired_jobs($company_id);
              
       foreach($count as $ss)
       {
        $data['total'] = $ss->total;
       }
        
       return view('company.expired_jobs_list',$data,compact('sql'));     
    }


    /* EDIT JOBS */
    public function edit_job($job_id,$title,Request $request)
    {
        $company_id   = $request->session()->get('company_id');
        $login_email  = $request->session()->get('login_email');
        
        $data['job_id'] = $job_id;
        
        $sql = Company_model::edit_job($company_id,$job_id);
      
        foreach($sql as $q)
        {
            $data['job_title']       = $q->job_title;
            $data['vacancy_no']      = $q->vacancy_no;
            $data['date_expiry']     = $q->exd;
            $data['date_posted']     = $q->psd;
            $data['category_title']  = $q->category_title;
            $data['job_type_title']  = $q->job_type_title;
            $data['city_name']       = $q->city_name;
            $data['apply_guidance']  = $q->apply_guidance;
            
            $data['category_id']             = $q->category_id;
            $data['city_id']                 = $q->city_id;
            $data['job_type_id']             = $q->job_type_id;
            $data['duty_responsibilities']   = $q->duty_responsibilities;
            $data['experience_required']     = $q->experience_required;
            $data['job_details']             = $q->job_details;
            
            $data['job_salary']              = $q->job_salary;
            $data['no_vacancy']              = $q->no_vacancy;
            $data['other_locations']         = $q->other_locations;
            $data['qualification_required']  = $q->qualification_required;
            $data['skills_required']         = $q->skills_required;
            $data['travel_required']         = $q->travel_required;
            
        }
        
        $cities     =  DB::table('city')->select('city_id','city_name')->orderBy('city_name', 'asc')->get();
        $categories =  DB::table('job_category')->select('category_id','category_title')->orderBy('category_title', 'asc')->get();
        $job_type   =  DB::table('job_type')->select('job_type_id','job_type_title')->orderBy('job_type_title', 'asc')->get();
        
        return view('company.edit_vacancy_form',$data,['cities'=>$cities,'categories'=>$categories,'job_type'=>$job_type]);
    }
    
    /* EDIT JOB QUERY */
    public function editjob_query(Request $request)
    {
        
     $company_id = $request->session()->get('company_id');
     $login_email = $request->session()->get('login_email');

     $data = ['job_title' => ucwords($request->input('job_title')),
              'vacancy_no'    =>  $request->input('vacancy_no'),
              'category_id'    =>  $request->input('category_id'),
              'job_type_id'     => $request->input('job_type_id'),
              'city_id'         => $request->input('city_id'),
              'travel_required' => $request->input('travel_required'),
              'other_locations' => ucwords($request->input('other_locations')),
              'no_vacancy'      => $request->input('no_vacancy'),
              'is_verified'      => 'NO',
              'job_salary'      => $request->input('job_salary'),
              'date_expiry'     => $request->input('date_expiry'),
              'job_details'     => $request->input('job_details'),
              'qualification_required' => $request->input('qualification_required'),
              'experience_required'    => $request->input('experience_required'),
              'skills_required'        => $request->input('skills_required'),
              'apply_guidance'         => $request->input('apply_guidance'),
              'duty_responsibilities'  => $request->input('duty_responsibilities'),
              'is_modified'  => 'YES',
              'modification_date'  => date('Y-m-d')
             ];
     
       $tbl  = 'job_details';

       $conditions = [['company_id', '=', $company_id],['job_id', '=', $request->input('job_id')]];
       
       General_model::editrecord($data,$conditions,$tbl);
       
        $sql = "SELECT `company_name` FROM `company_details` WHERE `company_id` = $company_id";
        $getdata = General_model::rawQuery($sql);
     
        foreach($getdata as $sql)
        {
        $company_name= $sql->company_name;
        }
       
       $maildata = ['company_name'=>$company_name,
                    'login_email'=>$login_email,
                    'job_title'=>ucwords($request->input('job_title')),
                    'date_posted'=>date('d M, Y')];

            Mail::send('emails.edit_job_post', $maildata, function($message) use ($maildata){

                $message->to($maildata['login_email']);
                $message->subject('Changes / modification made to job vacancy');
            });                                        
     
    return redirect()->action('Company_controller@unverified_jobs')->with('success','Success. The job vacancy will be visible on the site for jobseekers once we verify its genuineness. The process takes 24 hours max.');   

    }
    
    /* VIEW ALL APPLICANTS  */
    public function view_all_applicants($job_id,$job_title)
    {
         
        $sql = Company_model::getApplicants($job_id);
        
        $count = Company_model::count_applicants($job_id);
        
        
        foreach($count as $ss)
        {
            $data['total'] = $ss->total;
        }
        
        $data['job_title'] = str_replace('_',' ',$job_title);
        
        return view('company.applicants_for_job',$data,compact('sql'));     
     
    }
    
}
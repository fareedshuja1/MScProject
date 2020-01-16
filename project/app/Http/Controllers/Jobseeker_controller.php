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

use Illuminate\Support\Facades\Storage;

use File;

use DB;

class Jobseeker_controller extends Controller
{
    
    /* Add / Edit Qualification Details */
    public function add_qualification(Request $request)
    {       
        return view('jobseeker.add_qualification');
    }
    
    /* Change Education Details Query*/
    public function qualification_query(Request $request)
    {
        $degree_level       = $request->input('degree_level');
        $institute_name     = ucwords($request->input('institute_name'));
        $course_title       = ucwords($request->input('course_title'));
        $institute_location = ucwords($request->input('institute_location'));
        $final_grade        = $request->input('final_grade');
        
        $jobseeker_id   = $request->session()->get('jobseeker_id');
        
        $start_date = $request->input('start_date_month').", ".$request->input('start_date_year');
        
        if($request->input('end_date_month') !== 'In Progress')
        {
            $end_date = $request->input('end_date_month').", ".$request->input('end_date_year');
        } else {
            $end_date = 'In Progress';
        }
        
        $maxID = General_model::findMax('jq_id','jobseekers_qualification');
        foreach($maxID as $maxID) 
        {
        $maxID = $maxID->maxID;
        }
                
        $data = ['jq_id'=>$maxID,
                 'degree_level'=>$degree_level,
                 'jobseeker_id'=>$jobseeker_id,
                 'institute_name'=>$institute_name,
                 'course_title'=>$course_title,
                 'institute_location'=>$institute_location,
                 'final_grade'=>$final_grade,
                 'start_date'=>$start_date,
                 'end_date'=>$end_date
                ];
          
          General_model::createrecord($data,'jobseekers_qualification');
          
         return redirect()->back()->with('success','Record saved successfuly !');            
    }
    
    
    /* Add / Edit Experience */
    public function add_experience()
    {
        $categories =  DB::table('job_category')->select('category_id','category_title')->orderBy('category_title', 'asc')->get();
        $job_type   =  DB::table('job_type')->select('job_type_id','job_type_title')->orderBy('job_type_title', 'asc')->get();
        
        return view('jobseeker.add_experience',['categories'=>$categories,'job_type'=>$job_type]);   
    }
    
     /* Change Experience Details Query*/
    public function experience_query(Request $request)
    {
        $designation       = ucwords($request->input('designation'));
        $organization      = ucwords($request->input('organization'));
        $job_type_id       = $request->input('job_type_id');
        $category_id       = $request->input('category_id');
        $duty              = $request->input('duty');
        
        $jobseeker_id   = $request->session()->get('jobseeker_id');
        
        $start_date = $request->input('start_date_month').", ".$request->input('start_date_year');
        
        if($request->input('end_date_month') !== 'In Progress')
        {
            $end_date = $request->input('end_date_month').", ".$request->input('end_date_year');
        } else {
            $end_date = 'In Progress';
        }
        
        $maxID = General_model::findMax('je_id','jobseekers_experience');
        foreach($maxID as $maxID) 
        {
        $maxID = $maxID->maxID;
        }
                
        $data = ['je_id'=>$maxID,'designation'=>$designation,'jobseeker_id'=>$jobseeker_id,
                 'organization'=>$organization, 'job_type_id'=>$job_type_id,'category_id'=>$category_id,
                 'duty'=>$duty,'start_date'=>$start_date,'end_date'=>$end_date
                ];
          
          General_model::createrecord($data,'jobseekers_experience');
        
          return redirect()->back()->with('success','Information saved successfully.');  
    }
    
    
    /* Jobseeker Edit Profile Info*/
    public function jobseeker_edit_profile(Request $request)
    {
        $login_email    = $request->session()->get('login_email');
        $jobseeker_id   = $request->session()->get('jobseeker_id');
        $jobseeker_name = $request->session()->get('jobseeker_name');
        
        $sql = Jobseeker_model::jobseeker_edit_profile($jobseeker_id,$login_email);

        foreach($sql as $sql)
        {
            $data['jobseeker_phone']    = $sql->jobseeker_phone;
            $data['jobseeker_name']     = $sql->jobseeker_name;
            $data['jobseeker_linkedin'] = $sql->jobseeker_linkedin;
            $data['jobseeker_coverletter'] = $sql->jobseeker_coverletter;
            $data['jobseeker_image']       = $sql->jobseeker_image;
            $data['jobseeker_cv']          = $sql->jobseeker_cv;
        }
        return view('jobseeker.edit_profile_info',$data);
    }
    
    /* Edit Profile Query */
    public function edit_profile_query(Request $request)
    {
        $login_email    = $request->session()->get('login_email');
        $jobseeker_id   = $request->session()->get('jobseeker_id');
        
        $jobseeker_name         = ucwords($request->input('jobseeker_name'));   
        $jobseeker_coverletter  = $request->input('jobseeker_coverletter'); 
        $jobseeker_phone        = $request->input('jobseeker_phone'); 
        $jobseeker_linkedin     = $request->input('jobseeker_linkedin'); 
        
         $tbl  = 'jobseeker_main';    
         $data = ['jobseeker_name'=>$jobseeker_name,'jobseeker_coverletter'=>$jobseeker_coverletter,'jobseeker_phone'=>$jobseeker_phone,'jobseeker_linkedin'=>$jobseeker_linkedin];
         $conditions = [
                        ['jobseeker_id', '=', $jobseeker_id],
                        ['login_email', '=', $login_email],
                       ];
    
         General_model::editrecord($data,$conditions,$tbl);
         
         $request->session()->pull('jobseeker_name');
         
         $request->session()->put('jobseeker_name',$jobseeker_name); 
         
         return redirect()->back()->with('success','Information saved successfully.');  

    }
    
    
    /* Change CV / Resume */
    public function change_cv(Request $request)
    {
        $login_email    = $request->session()->get('login_email');
        $jobseeker_id   = $request->session()->get('jobseeker_id');
        
        $sql = DB::select("SELECT `jobseeker_cv` FROM `jobseeker_main` WHERE `jobseeker_id` = $jobseeker_id AND `login_email` = '$login_email'");
                
        foreach($sql as $sql)
        {
        $data['jobseeker_cv'] = $sql->jobseeker_cv;
        }
        
        return view('jobseeker.change_cv',$data);
    }
    
    /* Change CV / Resume Query */
    public function change_cv_query(Request $request)
    {
        $login_email   = $request->session()->get('login_email');
        $jobseeker_id  = $request->session()->get('jobseeker_id');
        $jobseeker_name = $request->session()->get('jobseeker_name');
        
        $jobseeker_cv     = $_FILES['jobseeker_cv']['name']; 
        
        $old_cv = $request->input('old_cv');
        
         if($jobseeker_cv != '')
         {
            $extension = File::extension($jobseeker_cv);
            $file_name = str_replace(' ','_',$jobseeker_id."_".$jobseeker_name.".".$extension);
            
             if($extension=='doc' || $extension=='docx' || $extension=='pdf' || $extension=='PDF' || $extension=='DOC' || $extension=='DOCX')
             {
                 $tbl  = 'jobseeker_main';    
                 $data = ['jobseeker_cv'=>$file_name];
                 $conditions = [
                               ['jobseeker_id', '=', $jobseeker_id],
                               ['login_email', '=', $login_email],
                               ];
                                
                if($old_cv != '') 
                {
                unlink(storage_path('app/jobseekers_cvs/'.$old_cv));
                }
                
                $request->jobseeker_cv->storeAs('jobseekers_cvs',$file_name);
                
                General_model::editrecord($data,$conditions,$tbl);  
                
                return back()->with('success','Information Saved Successfully.'); 
                
             } else {
             
                 return back()->with('warning','Invalid file type. We only accept files of type DOC, DOCX, & PDF.');
             }   
         } 
    }
    
    
    /* Change Password */
    public function jobseeker_change_password()
    {
        return view('jobseeker.change_password');     
    }
    
    public function change_password_query(Request $request)
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
    
    
    /* Change Profile Image */
    public function jprofile_image(Request $request)
    {
        $login_email    = $request->session()->get('login_email');
        $jobseeker_id   = $request->session()->get('jobseeker_id');
        
        $sql = DB::select("SELECT `jobseeker_image` FROM `jobseeker_main` WHERE `jobseeker_id` = $jobseeker_id AND `login_email` = '$login_email'");
                
        foreach($sql as $sql)
        {
        $data['jobseeker_image'] = $sql->jobseeker_image;
        }
        
        return view('jobseeker.jprofile_image',$data);   
    }
    
    public function change_pimage_query(Request $request)
    {
        $login_email   = $request->session()->get('login_email');
        $jobseeker_id  = $request->session()->get('jobseeker_id');
        $jobseeker_name = $request->session()->get('jobseeker_name');
        
        $jobseeker_image     = $_FILES['jobseeker_image']['name']; 
        
        $old_image = $request->input('old_image');

         if($jobseeker_image != '')
         {
            $extension = File::extension($jobseeker_image);
            $file_name = str_replace(' ','_',$jobseeker_id."_".$jobseeker_name.".".$extension);
            
             if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='JPG' || $extension=='JPEG' || $extension=='PNG')
             {
                 $tbl  = 'jobseeker_main';    
                 $data = ['jobseeker_image'=>$file_name];
                 $conditions = [
                               ['jobseeker_id', '=', $jobseeker_id],
                               ['login_email', '=', $login_email],
                               ];
                                
                if($old_image != '' && $old_image != 'no_image.png') 
                {
                unlink(storage_path('app/jobseekers_image/'.$old_image));
                }
                
                $request->jobseeker_image->storeAs('jobseekers_image',$file_name);
                
                General_model::editrecord($data,$conditions,$tbl);  
                
                return back()->with('success','Image uploaded successfully.'); 
                
             } else {

                 return back()->with('warning','Invalid file type. We only accept files of type JPG, JPEG, & PNG.');
             }   
         } else {
             
            return back()->with('warning','Invalid file type. We only accept files of type JPG, JPEG, & PNG.');
         }    
    }
    
    /* CHANGE CV DURING BEFORE APPLYING FOR JOB */
    public function applying_for_job(Request $request)
    {
        $jobseeker_id   = $request->session()->get('jobseeker_id');
        $jobseeker_name = $request->input('jobseeker_name');
        $job_id         = $request->input('job_id');
        $job_title      = $request->input('job_title');
        $cover_letter   = $request->input('cover_letter');
        $jobseeker_cv   = $_FILES['jobseeker_cv']['name']; 
        $old_cv         = $request->input('old_cv');
        
        $maxID = General_model::findMax('afj_id','applicants_for_job');
        foreach($maxID as $maxID) 
        {
        $maxID = $maxID->maxID;
        }
                
        $data = ['afj_id'=>$maxID,
                 'job_id'=>$job_id,
                 'jobseeker_id'=>$jobseeker_id,
                 'cover_letter'=>$cover_letter,
                 'date_applied'=>date('Y-m-d')
                ];
         
         if($jobseeker_cv != '')
         {
            $extension = File::extension($jobseeker_cv);
            $file_name = str_replace(' ','_',$jobseeker_id."_".$jobseeker_name.".".$extension);
            
                    if($extension=='doc' || $extension=='docx' || $extension=='pdf' || $extension=='PDF' || $extension=='DOC' || $extension=='DOCX')
                    {

                        $data2 = ['jobseeker_cv'=>$file_name];
                        $conditions = [['jobseeker_id', '=', $jobseeker_id]];

                            if($old_cv != 'not_set') 
                            {
                              unlink(storage_path('app/jobseekers_cvs/'.$old_cv));
                            }

                            $request->jobseeker_cv->storeAs('jobseekers_cvs',$file_name);

                            General_model::editrecord($data2,$conditions,'jobseeker_main');  
                  
                    } else {

                         return back()->with('warning','Invalid file type. Please upload CV of type Doc, Docx or PDF only.');
                    }  
         }
                  
         General_model::createrecord($data,'applicants_for_job');
         
         $get_companyemail = Jobseeker_model::get_company_email($job_id);
                  
         foreach ($get_companyemail as $fetch)
         {
             $company_email = $fetch->login_email;
             $company_name = $fetch->company_name;
         }
         
         if($jobseeker_cv != '') 
                {
                   $cv_name = storage_path('app/jobseekers_cvs/'.$file_name);
                }  elseif($old_cv != 'not_set') 
                {
                   $cv_name = storage_path('app/jobseekers_cvs/'.$old_cv);
                } else {
                   $cv_name = "";
                }
         
         $mail_data = ['company_email'=>$company_email,'job_title'=>$job_title,'company_name'=>$company_name,'jobseeker_id'=>$jobseeker_id,'jobseeker_name'=>$jobseeker_name,'cv_name'=>$cv_name];

         Mail::send('emails.new_applicant', $mail_data, function($message) use ($mail_data){               

                $message->to($mail_data['company_email']);
                $message->subject('New applicant for '.$mail_data['job_title']);
                if($mail_data['cv_name'] != "")
                {
                   $message->attach($mail_data['cv_name'],['as' => 'Applicant_CV']);  
                }
                
        });         
            
         return redirect()->route('jobdetails', array('id'=>$job_id,'title'=>$job_title))->with('success','Your application has been succesfully forwarded to the Employer.');            
    }
    
    
    /* VIEW JOBSEEKER JOBS HISTORY */
    public function jobs_history(Request $request)
    {
      $jobseeker_id   = $request->session()->get('jobseeker_id');
      
      $sql = Jobseeker_model::jobs_history($jobseeker_id);
      
      return view('jobseeker.jobs_history',compact('sql'));
    }
    
    
    /* DELETE EDUCATION AND EXPERIENCE  */
    public function delete_education($jq_id)
    {
         DB::table('jobseekers_qualification')->where('jq_id', '=', $jq_id)->delete();
         return redirect()->back()->with('success','Record Deleted Successfully!');
    }
    
    public function delete_experience($je_id)
    {
         DB::table('jobseekers_experience')->where('je_id', '=', $je_id)->delete();
         return redirect()->back()->with('success','Record Deleted Successfully!');
    }
    
    /* EDIT EDUCATION */
    public function edit_education(Request $request,$jq_id)
    {
        $jobseeker_id   = $request->session()->get('jobseeker_id');

        $sql = Jobseeker_model::edit_jobseeker_education($jq_id,$jobseeker_id);
        
        foreach ($sql as $sql)
        {
            $data['jq_id']          = $jq_id;
            $data['degree_level']   = $sql->degree_level;
            $data['course_title']   = $sql->course_title;
            $data['institute_name'] = $sql->institute_name;
            $data['start_date']     = $sql->start_date;
            $data['end_date']       = $sql->end_date;
            $data['final_grade']    = $sql->final_grade;
            $data['institute_location']    = $sql->institute_location;
        }
        
        return view('jobseeker.edit_education',$data);
    }
    
    public function edit_education_query(Request $request)
    {
        $jobseeker_id   = $request->session()->get('jobseeker_id');
        
        $tbl  = 'jobseekers_qualification';    
        
        $data = ['degree_level'=>$request->input('degree_level'),
                 'institute_name'=>ucwords($request->input('institute_name')),
                 'course_title'=>ucwords($request->input('course_title')),
                 'institute_location'=>ucwords($request->input('institute_location')),
                 'final_grade'=>$request->input('final_grade'),
                 'start_date'=>$request->input('start_date'),
                 'end_date'=>$request->input('end_date')
                ];

       $conditions = [['jobseeker_id', '=', $jobseeker_id],['jq_id', '=', $request->input('jq_id')]];
        
       General_model::editrecord($data,$conditions,$tbl);  
       
       return redirect()->back()->with('success','Record saved successfully.');
    }
    
    /* EDIT EXPERIENCE */
    public function edit_experience(Request $request,$je_id)
    {
        $jobseeker_id   = $request->session()->get('jobseeker_id');

        $sql = Jobseeker_model::edit_jobseeker_experience($je_id,$jobseeker_id);
        
        foreach ($sql as $sql)
        {
            $data['je_id']       = $je_id;
            $data['designation'] = $sql->designation;
            $data['organization']= $sql->organization;
            $data['job_type_id'] = $sql->job_type_id;
            $data['start_date']  = $sql->start_date;
            $data['end_date']    = $sql->end_date;
            $data['category_id'] = $sql->category_id;
            $data['duty']        = $sql->duty;
            $data['job_type_title'] = $sql->job_type_title;
            $data['job_type_id']    = $sql->job_type_id;
            $data['category_title'] = $sql->category_title;
            $data['category_id']    = $sql->category_id;
        }
        
        $categories =  DB::table('job_category')->select('category_id','category_title')->orderBy('category_title', 'asc')->get();
        $job_type   =  DB::table('job_type')->select('job_type_id','job_type_title')->orderBy('job_type_title', 'asc')->get();
        
        return view('jobseeker.edit_experience',$data,['categories'=>$categories,'job_type'=>$job_type]);
    }
    
    public function edit_experience_query(Request $request)
    {
        $jobseeker_id   = $request->session()->get('jobseeker_id');
        
        $tbl  = 'jobseekers_experience';    
           
        $data = ['designation'=>ucwords($request->input('designation')),
                 'organization'=>ucwords($request->input('organization')), 
                 'job_type_id'=>$request->input('job_type_id'),
                 'category_id'=>$request->input('category_id'),
                 'duty'=>$request->input('duty'),
                 'start_date'=>$request->input('start_date'),
                 'end_date'=>$request->input('end_date')
                ];
          
        $conditions = [['jobseeker_id', '=', $jobseeker_id],['je_id', '=', $request->input('je_id')]];
        
        General_model::editrecord($data,$conditions,$tbl);  
       
        return redirect()->back()->with('success','Record saved successfully.');
    }
    
    /* VIEW JOBSEEKER PROFILE */
    public function jobseeker_profile($id,$name,Request $request)
    {
        if ($request->session()->has('company_id')) {
         
                $data['jobseeker_name'] = str_replace('_',' ',$name);                
                
                $sql = Jobseeker_model::jobseeker_profile($id);
        
                foreach ($sql as $sql)
                {
                    $data['jobseeker_email']       = $sql->login_email;
                    $data['jobseeker_name']        = $sql->jobseeker_name;
                    $data['jobseeker_phone']       = $sql->jobseeker_phone;
                    $data['jobseeker_linkedin']    = $sql->jobseeker_linkedin;
                    $data['jobseeker_coverletter'] = $sql->jobseeker_coverletter;
                    $data['jobseeker_image']       = $sql->jobseeker_image;
                    $data['jobseeker_cv']          = $sql->jobseeker_cv;
                }
        
                $education = Jobseeker_model::jobseeker_education($id);

                $experience = Jobseeker_model::jobseeker_experience($id);
        
                return view('jobseeker.jobseeker_profile',$data,['education'=>$education,'experience'=>$experience]);
                               
        } else {
            
          $data = ['warning'=>'In order to access this page, you must first login as Company / Employer','jobseeker_id'=>$id,'jobseeker_name'=>$name];
            
          return redirect()->action('General_controller@login_page')->with($data);    
        }
    }
    
    
    
}
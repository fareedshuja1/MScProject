<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Jobseeker_model extends Model
{
    
    /* VIEW JOBSEEKER JOBS HISTORY */
    public static function jobs_history($jobseeker_id)
    {
         $query = DB::select("SELECT jd.`job_id`, jd.`job_title`,cc.`city_name`,jc.`category_title`,DATE_FORMAT(aj.`date_applied`, '%d %M, %Y') AS exd FROM `job_details` AS jd
                INNER JOIN `city` AS cc ON cc.`city_id`=jd.`city_id`
                INNER JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id`
                INNER JOIN `applicants_for_job` AS aj ON aj.`job_id`=jd.`job_id`
                WHERE aj.`jobseeker_id` = $jobseeker_id
                ORDER BY aj.`date_applied` DESC");
         
         return $query;
    }
    
    
    /* VIEW JOBSEEKER PROFILE */
    public static function jobseeker_profile($id)
    {
        $query = DB::select("SELECT `login_email`,`jobseeker_name`,`jobseeker_phone`,`jobseeker_linkedin`,`jobseeker_education`,`jobseeker_experience`,`jobseeker_coverletter`,`jobseeker_image`,`jobseeker_cv` "
                . "FROM `jobseeker_main` WHERE `jobseeker_id` = $id");
        
         return $query;
    }
    
    
    /* GET COMPANY EMAIL */
    public static function get_company_email($job_id)
    {
       $get_companyemail = DB::select("SELECT `login_email`,`company_name` FROM `company_details` AS cd JOIN `job_details` AS jd ON jd.`company_id`=cd.`company_id` "
               . "WHERE jd.`job_id` = $job_id");
       
        return $get_companyemail;
    }
    
    
    /* Jobseeker Edit Profile Info*/
    public static function jobseeker_edit_profile($jobseeker_id,$login_email)
    {
        $query = DB::select("SELECT `jobseeker_id`,`jobseeker_phone`,`jobseeker_name`,`jobseeker_linkedin`,`jobseeker_coverletter`,`jobseeker_image`,`jobseeker_cv` FROM `jobseeker_main` "
                . "WHERE `jobseeker_id` = $jobseeker_id AND `login_email` = '$login_email'");
        
        return $query;
    }
    
    
    /* Add / Edit Experience */
    public static function add_experience($jobseeker_id,$login_email)
    {
        $query = "SELECT `jobseeker_experience` FROM `jobseeker_main` "
                . "WHERE `jobseeker_id` = $jobseeker_id "
                . "AND `login_email` = '$login_email' ";  
        
        return $query;
    }
    
    /* Get Education Details */
    public static function jobseeker_education($jobseeker_id)
    {
        $sql = DB::table('jobseekers_qualification')
                    ->join('jobseeker_main', 'jobseeker_main.jobseeker_id', '=', 'jobseekers_qualification.jobseeker_id')
                    ->select('jobseekers_qualification.*')
                    ->where('jobseekers_qualification.jobseeker_id',$jobseeker_id)->get();
        
       return $sql;
    }
    
    /* Get Experience Details */
    public static function jobseeker_experience($jobseeker_id)
    {
        $sql = DB::table('jobseekers_experience')
                    ->join('jobseeker_main', 'jobseeker_main.jobseeker_id', '=', 'jobseekers_experience.jobseeker_id')
                    ->join('job_category', 'job_category.category_id', '=', 'jobseekers_experience.category_id')
                    ->join('job_type', 'job_type.job_type_id', '=', 'jobseekers_experience.job_type_id')
                    ->select('jobseekers_experience.*','job_type.job_type_title','job_category.category_title')
                    ->where('jobseekers_experience.jobseeker_id',$jobseeker_id)->get();
        
       return $sql;
    }
    
    /* EDIT Education Details */
    public static function edit_jobseeker_education($jq_id,$jobseeker_id)
    {
        $sql = DB::table('jobseekers_qualification')
                    ->join('jobseeker_main', 'jobseeker_main.jobseeker_id', '=', 'jobseekers_qualification.jobseeker_id')
                    ->select('jobseekers_qualification.*')
                    ->where('jobseekers_qualification.jq_id',$jq_id)
                    ->where('jobseekers_qualification.jobseeker_id',$jobseeker_id)->get();
        
       return $sql;
    }
    
    /* EDIT Experience Details */
    public static function edit_jobseeker_experience($je_id,$jobseeker_id)
    {
        $sql = DB::table('jobseekers_experience')
                    ->join('jobseeker_main', 'jobseeker_main.jobseeker_id', '=', 'jobseekers_experience.jobseeker_id')
                    ->join('job_category', 'job_category.category_id', '=', 'jobseekers_experience.category_id')
                    ->join('job_type', 'job_type.job_type_id', '=', 'jobseekers_experience.job_type_id')
                    ->select('jobseekers_experience.*','job_type.job_type_title','job_type.job_type_id','job_category.category_title','job_category.category_id')
                    ->where('jobseekers_experience.je_id',$je_id)
                    ->where('jobseekers_experience.jobseeker_id',$jobseeker_id)->get();
        
       return $sql;
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Company_model extends Model
{
    
    
    /* EDIT PROFILE */
    public static function editProfile($company_id,$login_email)
    {
    
        $query = DB::select("SELECT ct.`company_type_title`,ct.`company_type_id`,cd.`company_details`,cd.`company_id`,cd.`company_name`,cd.`company_website`,cd.`phone_number`,cd.`company_address` "
                . "FROM `company_details` AS cd JOIN `company_type` AS ct ON ct.`company_type_id`=cd.`company_type_id` "
                . "WHERE cd.`company_id` = $company_id "
                . "AND cd.`login_email` = '$login_email'");
        
        return $query;
    }
    
    /* VIEW COMPANY DETAILS */
    public static function view_company_details($company_id)
    {
        $query = DB::select("SELECT ct.`company_type_title`,ct.`company_type_id`,cd.`company_details`,cd.`company_id`,cd.`company_name`,cd.`company_website`,cd.`phone_number`,cd.`company_address`,cd.`company_logo`"
                . " FROM `company_details` AS cd JOIN `company_type` AS ct ON cd.`company_type_id`=ct.`company_type_id` "
                . "WHERE cd.`company_id` = $company_id");
                
        return $query;        
    }
    
    
    /* VIEW ALL JOBS BY THIS COMPANY */
    public static function jobs_by_company($company_id)
    {
        $query = DB::select("SELECT jd.`job_id`,jd.`job_title`,jd.`date_expiry`,jc.`category_title`,DATE_FORMAT(jd.`date_expiry`, '%d %M, %Y') AS exd,cc.`city_name` "
                . "FROM `job_details` AS jd JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id` JOIN `city` AS cc ON cc.`city_id`=jd.`city_id` "
                . "WHERE jd.`company_id`=$company_id "
                . "AND jd.`date_expiry` >= TIMESTAMP(CURRENT_DATE) AND jd.`is_verified`= 'YES' AND jd.`is_active` = 'YES' "
                . "ORDER BY jd.`date_expiry` ASC");
        
        return $query;        

    }
    
    /* SHOW ALL UNVERIFIED JOBS */
    public static function unverified_jobs($company_id)
    {
        $query = DB::select("SELECT jd.`job_id`,jd.`job_title`,jd.`date_expiry`,jc.`category_title`,DATE_FORMAT(jd.`date_expiry`, '%d %M, %Y') AS exd,cc.`city_name` "
                . "FROM `job_details` AS jd JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id` JOIN `city` AS cc ON cc.`city_id`=jd.`city_id` "
                . "WHERE jd.`company_id`=$company_id "
                . "AND jd.`date_expiry` >= TIMESTAMP(CURRENT_DATE) AND jd.`is_verified`= 'NO' AND jd.`is_active` = 'YES' "
                . "ORDER BY jd.`date_expiry` ASC");
        
        return $query;        

    }
    
    public static function count_unverified_jobs($company_id)
    {
        $count = DB::select("SELECT COUNT(jd.`job_id`) AS total FROM `job_details` AS jd WHERE jd.`company_id`=$company_id "
                . "AND jd.`date_expiry` >= TIMESTAMP(CURRENT_DATE) AND jd.`is_verified`= 'NO' AND jd.`is_active` = 'YES' "
                . "ORDER BY jd.`date_expiry` ASC");
          
        return $count;        
    }
    
    /* SHOW ALL EXPIRED JOBS */
    public static function expired_jobs($company_id)
    {
        $query = DB::select("SELECT jd.`job_id`,jd.`job_title`,jd.`date_expiry`,jc.`category_title`,DATE_FORMAT(jd.`date_expiry`, '%d %M, %Y') AS exd,cc.`city_name` "
                . "FROM `job_details` AS jd JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id` JOIN `city` AS cc ON cc.`city_id`=jd.`city_id` "
                . "WHERE jd.`company_id`=$company_id "
                . "AND jd.`date_expiry` < TIMESTAMP(CURRENT_DATE) AND jd.`is_verified`= 'YES' AND jd.`is_active` = 'YES' "
                . "ORDER BY jd.`date_expiry` ASC");
        
        return $query;        
    }
    
    public static function count_expired_jobs($company_id)
    {
               
        $count = DB::select("SELECT COUNT(jd.`job_id`) AS total FROM `job_details` AS jd WHERE jd.`company_id`=$company_id "
                . "AND jd.`date_expiry` < TIMESTAMP(CURRENT_DATE) AND jd.`is_verified`= 'YES' AND jd.`is_active` = 'YES' "
                . "ORDER BY jd.`date_expiry` ASC");
         
        return $count;        

    }



    /* SHOW ACTIVE JOBS TO COMPANY */
    public static function activeJobs($company_id)
    {
        $sql = DB::select("SELECT jd.`job_id`,jd.`job_title`,jd.`date_expiry`,jc.`category_title`,DATE_FORMAT(jd.`date_expiry`, '%d %M, %Y') AS exd,cc.`city_name` "
                . "FROM `job_details` AS jd JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id` JOIN `city` AS cc ON cc.`city_id`=jd.`city_id` "
                . "WHERE jd.`company_id`=$company_id "
                . "AND jd.`date_expiry` >= TIMESTAMP(CURRENT_DATE) AND jd.`is_verified`= 'YES' AND jd.`is_active` = 'YES' "
                . "ORDER BY jd.`date_expiry` ASC");
        
        return $sql;
    }
    
    public static function countActivejobs($company_id)
    {
        $count = DB::select("SELECT COUNT(jd.`job_id`) AS total "
                . "FROM `job_details` AS jd "
                . "WHERE jd.`company_id`=$company_id "
                . "AND jd.`date_expiry` >= TIMESTAMP(CURRENT_DATE) AND jd.`is_verified`= 'YES' AND jd.`is_active` = 'YES' "
                . "ORDER BY jd.`date_expiry` ASC");
        
        return $count;
    }

    
    /* SHOW APPLICANTS WHO HAVE APPLIED FOR THE JOB */     
    public static function getApplicants($job_id)
    {
        $sql = DB::select("SELECT jm.`jobseeker_id`,jm.`jobseeker_name`,jm.`jobseeker_phone`,jm.`login_email`,jm.`jobseeker_coverletter`,jm.`jobseeker_cv`,
                  jm.`jobseeker_education`,jm.`jobseeker_experience`,jm.`jobseeker_linkedin`,aj.`cover_letter`,aj.`date_applied`
                  FROM `jobseeker_main` AS jm
                  JOIN `applicants_for_job` AS aj ON jm.`jobseeker_id`=aj.`jobseeker_id`
                  JOIN `job_details` AS jd ON jm.`jobseeker_id`=jd.`job_id`
                  WHERE aj.`job_id`=$job_id");
        
        return $sql;
    }
    
    public static function count_applicants($job_id)
    {
        $count = DB::select("SELECT COUNT(DISTINCT(aj.`afj_id`)) AS total FROM `jobseeker_main` AS jm
                             JOIN `applicants_for_job` AS aj ON jm.`jobseeker_id`=aj.`jobseeker_id`
                             JOIN `job_details` AS jd ON jm.`jobseeker_id`=jd.`job_id` WHERE aj.`job_id`=$job_id");
        return $count;
    }


    /* EDIT JOB */
    public static function edit_job($company_id,$job_id)
    {
        $sql = DB::select("SELECT jd.*,DATE_FORMAT(jd.`date_expiry`, '%d %M, %Y') AS exd,DATE_FORMAT(jd.`date_posted`, '%d %M, %Y') AS psd,jc.`category_title`,jt.`job_type_title`,cc.`city_name`
                  FROM `job_details` AS jd
                  JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`
                  JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id`
                  JOIN `job_type` AS jt ON jt.`job_type_id`=jd.`job_type_id`
                  JOIN `city` AS cc ON cc.`city_id`=jd.`city_id`
                  WHERE jd.`job_id`=$job_id AND jd.`company_id`=$company_id");
        
        return $sql;
    }
    
    

}

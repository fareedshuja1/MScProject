<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class General_model extends Model
{
        
    // Find Max ID
    public static function findMax($col,$tbl)
    {
     return DB::select( DB::raw("SELECT ifnull(max($col),'0')+1 as maxID FROM `$tbl`") );  
    }

    
    // Run Raw Query
    public static function rawQuery($query)
    {
     return DB::select( DB::raw($query) );  
    }


    // Fetch record from database
    public static function selectrecord($rec,$tbl)
    {      
      return DB::table($tbl)->select($rec)->get();
    }
    
    // Select and Where clause - Only fetch first record
    public static function selectwhere($table,$columns,$where)
    {      
      return DB::table($table)->select($columns)->where($where)->first();
    }
    
    
    // Create New Record
    public static function createrecord($data,$tbl)   
    {      
      return DB::table($tbl)->insert($data);
    }
    
    
    // Edit Record
    public static function editrecord($data,$where,$tbl)
    {
      return DB::table($tbl)->where($where)->update($data);
    }
    
    
    // VIEW ALL JOBS IN HOME PAGE
    public static function view_jobs()
    {
         $sql = DB::select("SELECT jd.*,DATE_FORMAT(jd.`date_expiry`, '%d / %m / %Y') AS exd,DATE_FORMAT(jd.`date_posted`, '%d %M, %Y') AS psd, cd.`company_name`,cd.`login_email`, jc.`category_title`, jt.`job_type_title`, cc.`city_name`
                            FROM `job_details` AS jd
                            JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`
                            JOIN `login_details` AS ld ON ld.`login_email`=cd.`login_email`
                            JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id`
                            JOIN `job_type` AS jt ON jt.`job_type_id`=jd.`job_type_id`
                            JOIN `city` AS cc ON cc.`city_id`=jd.`city_id`
                            WHERE jd.`is_active` = 'YES'
                            AND jd.`is_verified` = 'YES'
                            AND jd.`date_expiry` >= TIMESTAMP(CURRENT_DATE)
                            AND ld.`is_blocked`='NO'
                            ORDER BY jd.`date_posted` DESC");
         
         return $sql;
    }
    
    // View all Expired Jobs
    public static function view_expired_jobs()
    {
        $sql = DB::select("SELECT jd.*,DATE_FORMAT(jd.`date_expiry`, '%d %M, %Y') AS exd,DATE_FORMAT(jd.`date_posted`, '%d %M, %Y') AS psd, cd.`company_name`,cd.`login_email`, jc.`category_title`, jt.`job_type_title`, cc.`city_name`
                            FROM `job_details` AS jd
                            JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`
                            JOIN `login_details` AS ld ON ld.`login_email`=cd.`login_email`
                            JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id`
                            JOIN `job_type` AS jt ON jt.`job_type_id`=jd.`job_type_id`
                            JOIN `city` AS cc ON cc.`city_id`=jd.`city_id`
                            WHERE jd.`date_expiry` < TIMESTAMP(CURRENT_DATE)
                            AND ld.`is_blocked`='NO'
                            ORDER BY jd.`date_posted` DESC");
        
        return $sql;
    }
    
    
    // View all blocked jobs
    public static function all_blocked_jobs()
    {
      $sql = DB::select("SELECT jd.*,DATE_FORMAT(jd.`date_expiry`, '%d %M, %Y') AS exd,DATE_FORMAT(jd.`date_posted`, '%d %M, %Y') AS psd, cd.`company_name`,cd.`login_email`, jc.`category_title`, jt.`job_type_title`, cc.`city_name`
                         FROM `job_details` AS jd
                         JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`
                         JOIN `login_details` AS ld ON ld.`login_email`=cd.`login_email`
                         JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id`
                         JOIN `job_type` AS jt ON jt.`job_type_id`=jd.`job_type_id`
                         JOIN `city` AS cc ON cc.`city_id`=jd.`city_id`
                         WHERE jd.`is_active` = 'NO'
                         ORDER BY jd.`date_posted` DESC");
         
         return $sql;   
    }

    public static function company_panel($login_email,$company_id,$company_name)
    {
        $sql = DB::select("SELECT 
                  cd.`company_address`,cd.`company_details`,cd.`company_id`,cd.`company_logo`,cd.`company_name`,cd.`company_type_id`,cd.`company_website`,cd.`login_email`,cd.`phone_number`,
                  ld.`date_created`,ld.`is_verified`,ld.`is_blocked`,ld.`login_password`,ld.`login_type`
                  FROM `company_details` AS cd
                  JOIN `login_details` AS ld
                  ON cd.`login_email`=ld.`login_email`
                  WHERE cd.`login_email`='$login_email'
                  AND cd.`company_id`=$company_id
                  AND cd.`company_name`='$company_name' 
                  AND ld.`login_type`='COMPANY'");
        
        return $sql;
    }
    
    
    public static function view_job_details($job_id)
    {
         $sql = DB::select("SELECT jd.*,DATE_FORMAT(jd.`date_expiry`, '%d %M, %Y') AS exd,DATE_FORMAT(jd.`date_posted`, '%d %M, %Y') AS psd,cd.`company_logo`,cd.`company_details`, cd.`company_name`,cd.`login_email`, jc.`category_title`, jt.`job_type_title`, cc.`city_name`
                  FROM `job_details` AS jd
                  JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`
                  JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id`
                  JOIN `job_type` AS jt ON jt.`job_type_id`=jd.`job_type_id`
                  JOIN `city` AS cc ON cc.`city_id`=jd.`city_id`
                  WHERE jd.`job_id`=$job_id");
         
         return $sql;
    }
    
    
    public static function jobseeker_panel($login_email,$jobseeker_id)
    {
        $sql = DB::select("SELECT jm.`jobseeker_coverletter`,jm.`jobseeker_cv`,jm.`jobseeker_id`,jm.`jobseeker_image`,jm.`jobseeker_name`,jm.`login_email`,
                           jm.`jobseeker_phone`,jm.`jobseeker_linkedin`,jm.`jobseeker_education`,jm.`jobseeker_experience`,
                           ld.`date_created`,ld.`is_blocked`,ld.`is_verified`,ld.`login_type`,ld.`login_password`
                           FROM `jobseeker_main` AS jm
                           JOIN `login_details` AS ld ON ld.`login_email` = jm.`login_email`
                           WHERE jm.`login_email` = '$login_email'
                           AND jm.`jobseeker_id` = $jobseeker_id
                           AND ld.`login_type` = 'JOBSEEKER'");
        
        return $sql;
    }
    
    public static function apply_now_page($job_id)
    {
       $sql = DB::select("SELECT jd.`job_title`,jd.`vacancy_no`,cd.`company_name`,jc.`category_title`,jt.`job_type_title`,cc.`city_name`
                                FROM `job_details` AS jd
                                JOIN `company_details` AS cd ON cd.`company_id`=jd.`company_id`
                                JOIN `job_category` AS jc ON jc.`category_id`=jd.`category_id`
                                JOIN `job_type` AS jt ON jt.`job_type_id`=jd.`job_type_id`
                                JOIN `city` AS cc ON cc.`city_id`=jd.`city_id`
                                WHERE jd.`job_id`=$job_id");
       
       return $sql;
    }
    
    public static function view_all_companies()
    {
        $companies = DB::table('login_details')
                    ->join('company_details', 'login_details.login_email', '=', 'company_details.login_email')
                    ->join('company_type', 'company_type.company_type_id', '=', 'company_details.company_type_id')
                    ->select('company_details.*','login_details.is_blocked',DB::raw("DATE_FORMAT(login_details.date_created, '%d %M, %Y') AS date_created"),'company_type.company_type_title')
                    ->where('login_details.is_verified','YES')
                    ->where('login_details.is_blocked','NO')->get();
        
       return $companies;
    }
    
    public static function view_unverified_jobs()
    {
          $sql = DB::table('job_details')
                    ->join('company_details', 'job_details.company_id', '=', 'company_details.company_id')
                    ->join('job_type', 'job_details.job_type_id', '=', 'job_type.job_type_id')
                    ->join('city', 'job_details.city_id', '=', 'city.city_id')
                    ->join('job_category', 'job_details.category_id', '=', 'job_category.category_id')
                    ->select('job_details.job_id','job_details.is_suspecious','job_details.job_title',DB::raw("DATE_FORMAT(job_details.date_expiry, '%d %M, %Y') AS exd"),DB::raw("DATE_FORMAT(job_details.date_posted, '%d %M, %Y') AS psd"),'company_details.company_id','company_details.company_name','job_type.job_type_title','city.city_name','job_category.category_title')
                    ->where('job_details.is_active','YES')                    
                    ->where('job_details.is_verified','NO')->get();
          
                 return $sql;
    }
    
    public static function view_all_suspecious_jobs()
    {
            $data = DB::table('job_details')
                    ->join('company_details', 'job_details.company_id', '=', 'company_details.company_id')
                    ->join('job_type', 'job_details.job_type_id', '=', 'job_type.job_type_id')
                    ->join('city', 'job_details.city_id', '=', 'city.city_id')
                    ->join('job_category', 'job_details.category_id', '=', 'job_category.category_id')
                    ->select('job_details.job_id','job_details.is_suspecious','job_details.job_title',DB::raw("DATE_FORMAT(job_details.date_expiry, '%d %M, %Y') AS exd"),DB::raw("DATE_FORMAT(job_details.date_posted, '%d %M, %Y') AS psd"),'company_details.company_id','company_details.company_name','job_type.job_type_title','city.city_name','job_category.category_title')
                    ->where('job_details.is_suspecious','YES')->get();
            
            return $data;
    }
    
    public static function view_scholarships()
    {
        $data = DB::table('scholarships')
                ->join('country','country.country_id','=','scholarships.country_id')
                ->select('scholarships.*','country.country_name')->orderBy('scholarships.sch_id','desc')->get();
        
        return $data;
    }
    
    public static function scholarship_details($sch_id)
    {
        $data = DB::table('scholarships')
                ->join('country','country.country_id','=','scholarships.country_id')
                ->select('scholarships.*','country.country_name')->where('sch_id', '=', $sch_id)->get();
        
        return $data;
    }
}

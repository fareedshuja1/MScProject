<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','General_controller@index');

Route::post('jobsearch','General_controller@jobsearch');

Route::get('scholarships','General_controller@scholarships');

Route::get('scholarship/{id}',['uses' =>'General_controller@scholarship_description'])->name('scholarship');

Route::post('scholarship_search','General_controller@scholarship_search');

Route::get('category_search/{id}/{title}',['uses' =>'General_controller@search_by_category'])->name('category_search');

Route::get('register','General_controller@register_page');

Route::get('login_page','General_controller@login_page');

Route::get('loginpage','General_controller@jobseeker_loginpage');

Route::post('jobseeker_login','General_controller@jobseeker_login');

Route::get('contact_us','General_controller@contact_us_page');

Route::post('contact_us_query','General_controller@contact_us_query');

Route::get('signup_confirmation','General_controller@signup_confirmation_page');

Route::get('verify_email/{email_address}',['uses' =>'General_controller@verify_company_email'])->name('verify_email');

Route::post('register_company','General_controller@register_company');

Route::post('register_jobseeker','General_controller@register_jobseeker');

Route::get('clogout','General_controller@company_logout');

Route::post('auth_login','General_controller@auth_user_login');

Route::get('termsandcondition','General_controller@termsandcondition');

Route::get('jobdetails/{id}/{title}',['uses' =>'General_controller@view_job_details'])->name('jobdetails');

Route::get('cdetails/{id}/{name}',['uses' =>'Company_controller@view_company_details']);

Route::get('reset_password','General_controller@reset_password');

Route::post('reset_password_link','General_controller@reset_password_link');

Route::get('change_password/{encrypt_email}',['uses' =>'General_controller@change_password'])->name('change_password');

Route::post('change_passwordquery','General_controller@change_passwordquery');

Route::get('applynow/{id}/{title}',['uses' =>'General_controller@apply_now_page']);

Route::get('alljobs/{id}/{name}',['uses' =>'Company_controller@jobs_by_company'])->name('alljobs');

Route::get('applicant_profile/{id}/{name}',['uses' =>'Jobseeker_controller@jobseeker_profile'])->name('applicant_profile');


Route::group(['middleware' => 'companysession'], function () {
    
       Route::get('cpanel','General_controller@company_panel');
       Route::get('add_vacancy','General_controller@add_vacancy');
       Route::post('add_job_query','General_controller@add_job_query');
       Route::get('cedit_profile','Company_controller@edit_profile_page');
       Route::post('cedit_profile_query','Company_controller@cedit_profile_query');
       Route::get('cchange_password','Company_controller@cchange_password');
       Route::post('cchange_password_query','Company_controller@cchange_password_query');
       Route::get('cchange_logo','Company_controller@cchange_logo');
       Route::post('change_logo_query','Company_controller@change_logo_query');
       Route::get('active_vacancies','Company_controller@active_jobs');
       Route::get('editjob/{id}/{title}',['uses' =>'Company_controller@edit_job'])->name('editjob');
       Route::post('editjob_query','Company_controller@editjob_query');
       Route::get('unverified_vacancies','Company_controller@unverified_jobs');
       Route::get('expired_vacancies','Company_controller@expired_vacancies');
       Route::get('applicants/{id}/{title}',['uses' =>'Company_controller@view_all_applicants'])->name('applicants');
       
});


Route::group(['middleware' => 'jobseekersession'], function () {

        Route::get('jpanel','General_controller@jobseeker_panel');
        Route::get('jlogout','General_controller@jobseeker_logout');
        Route::get('add_qualification','Jobseeker_controller@add_qualification');
        Route::get('add_experience','Jobseeker_controller@add_experience');
        Route::post('qualification_query','Jobseeker_controller@qualification_query');
        Route::post('experience_query','Jobseeker_controller@experience_query');
        Route::get('jedit_profile','Jobseeker_controller@jobseeker_edit_profile');
        Route::post('edit_profile_query','Jobseeker_controller@edit_profile_query');
        Route::get('change_cv','Jobseeker_controller@change_cv');
        Route::post('change_cv_query','Jobseeker_controller@change_cv_query');
        Route::get('jchange_password','Jobseeker_controller@jobseeker_change_password');
        Route::post('change_password_query','Jobseeker_controller@change_password_query');
        Route::get('jprofile_image','Jobseeker_controller@jprofile_image');
        Route::post('change_pimage_query','Jobseeker_controller@change_pimage_query');
        Route::post('applying_for_job','Jobseeker_controller@applying_for_job');
        Route::get('jobs_history','Jobseeker_controller@jobs_history');
        Route::get('delete_education/{id}',['uses' =>'Jobseeker_controller@delete_education'])->name('delete_education');
        Route::get('delete_experience/{id}',['uses' =>'Jobseeker_controller@delete_experience'])->name('delete_experience');
        
        Route::get('edit_education/{id}',['uses' =>'Jobseeker_controller@edit_education'])->name('edit_education');
        Route::get('edit_experience/{id}',['uses' =>'Jobseeker_controller@edit_experience'])->name('edit_experience');
        Route::post('edit_education_query','Jobseeker_controller@edit_education_query');
        Route::post('edit_experience_query','Jobseeker_controller@edit_experience_query');

});

/* ---------------------------------> ADMIN ROUTES ---------------------------------------- */

//Route::get('webadmin',['middleware'=>'usersession','as'=>'webadmin','uses'=>'Admin_controller@index']);

Route::get('adminlogin','Admin_controller@admin_login_page');

Route::post('auth_admin','Admin_controller@auth_admin');

Route::get('logout','Admin_controller@admin_logout');

Route::group(['middleware' => 'usersession'], function () {
        
        Route::get('webadmin',['as'=>'webadmin','uses'=>'Admin_controller@index']);
        Route::get('cities','Admin_controller@cities_page');
        Route::get('jobcategory','Admin_controller@add_category');
        Route::get('companytypes','Admin_controller@add_company_type');
        Route::get('unverified_jobs','Admin_controller@unverified_jobs_page');
        Route::get('jobs_details/{job_id}',['uses' =>'Admin_controller@jobs_details']);
        Route::get('company_details/{company_id}',['uses' =>'Admin_controller@company_details']);
        Route::get('all_jobs','Admin_controller@view_all_jobs');
        Route::get('view_messages','Admin_controller@view_messages');
        Route::get('suspicious_jobs','Admin_controller@suspicious_jobs_page');
        Route::get('clear_job/{job_id}',['uses' =>'Admin_controller@clear_job']);
        Route::get('all_active_jobs','Admin_controller@all_active_jobs');
        Route::get('expired_jobs','Admin_controller@expired_jobs');
        
        
        Route::get('active_companies','Admin_controller@active_companies');
        Route::get('blocked_companies','Admin_controller@blocked_companies');
        Route::post('unblock_company',['uses' =>'Admin_controller@unblock_company']);
        Route::post('block_company',['uses' =>'Admin_controller@block_company']);
        Route::get('all_blocked_jobs','Admin_controller@all_blocked_jobs');
        Route::post('block_job',['uses' =>'Admin_controller@block_job']);
        Route::post('unblock_job',['uses' =>'Admin_controller@unblock_job']);
        
              
        
        // CITY
        Route::post('create_city','Admin_controller@create_city');
        Route::get('deletecity/{city_id}', ['uses' =>'Admin_controller@deletecity']);
        Route::post('editcity/{city_id}',['uses' =>'Admin_controller@edit_city']);
        Route::post('editcityquery','Admin_controller@editcityquery');

        // JOB CATEGORY
        Route::post('create_category','Admin_controller@create_category');
        Route::post('editcategory/{category_id}',['uses' =>'Admin_controller@editcategory']);
        Route::post('editcategoryquery','Admin_controller@editcategoryquery');
        Route::get('deletecategory/{category_id}', ['uses' =>'Admin_controller@deletecategory']);

        // COMPANY TYPE
        Route::post('create_company_type','Admin_controller@create_company_type');
        Route::get('deleteccompanytype/{ccompany_type_id}', ['uses' =>'Admin_controller@deleteccompanytype']);

        // VERIFY JOB
        Route::post('verifyjob','Admin_controller@verify_job_vacancy');
        
        // SCHOLARSHIPS 
        Route::get('add_scholarships','Admin_controller@add_scholarships');
        Route::post('add_scholarship_query','Admin_controller@add_scholarship_query');
        Route::get('view_scholarships','Admin_controller@view_scholarships');
        Route::get('delete_scholarship/{id}', ['uses' =>'Admin_controller@delete_scholarship']);
        Route::get('scholarship_details/{id}', ['uses' =>'Admin_controller@scholarship_details']);
        Route::get('edit_scholarship/{id}', ['uses' =>'Admin_controller@edit_scholarship']);
        Route::post('edit_scholarship_query','Admin_controller@edit_scholarship_query');
        
        
});






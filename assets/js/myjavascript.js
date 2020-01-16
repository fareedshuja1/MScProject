
	$().ready(function() {

		$("#signupForm").validate({
			rules: {
				password: {
					required: true,
					minlength: 8
				},
				confirm_password: {
					required: true,
					minlength: 8,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
                                company_name: {
					required: true,
				},
                                company_details: {
					required: true,
				},
				agree: "required"
			},
			messages: {
                                company_name: {
					required: "Please write company name.",
				},
                                company_details: {
					required: "Please write something about the company.",
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy"
			}
		});
	});
	
	$().ready(function() {

		$("#register_jobseeker").validate({
			rules: {
				loginn_password: {
					required: true,
					minlength: 8
				},
				confirm_password2: {
					required: true,
					minlength: 8,
					equalTo: "#loginn_password"
				},
				login_email: {
					required: true,
					email: true
				},
                                jobseeker_name: {
					required: true,
				},
                                agree: "required"
                            },
			messages: {
                                jobseeker_name: {
					required: "Please write your full name.",
				},
				loginn_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long"
				},
				confirm_password2: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Please enter the same password as above"
				},
				login_email: "Please enter a valid email address",
                                agree: "Please accept our policy"
			}
		});
	});
	
	$().ready(function() {

		$("#loginForm").validate({
			rules: {
				login_password: {
					required: true,
				},
				email: {
					required: true,
					email: true
				},
				agree: "required"
			},
			messages: {
                                login_password: {
				required: "Please provide a password.",
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy"
			}
		});
	});
	
	$().ready(function() {

		$("#jobseeker_edit_profile").validate({
			rules: {
				jobseeker_name: {
					required: true,
				},
			},
			messages: {
                                jobseeker_name: {
				required: "Please enter your full name.",
				},
			}
		});
	});
	
	$().ready(function() {

		$("#change_cv").validate({
			rules: {
				jobseeker_cv: {
					required: true,
				},
			},
			messages: {
                                jobseeker_cv: {
				required: "This field is required.",
				},
			}
		});
	});
	
	$().ready(function() {

		$("#change_pimage").validate({
			rules: {
				jobseeker_image: {
					required: true,
				},
			},
			messages: {
                                jobseeker_image: {
				required: "This field is required.",
				},
			}
		});
	});
	
	$().ready(function() {

		$("#change_logo").validate({
			rules: {
				company_logo: {
					required: true,
				},
			},
			messages: {
                                company_logo: {
				required: "This field is required.",
				},
			}
		});
	});
	
	$().ready(function() {

		$("#addjob").validate({
			rules: {
				job_title: {
					required: true,
				},
                                no_vacancy: {
					required: true,
				},
                                date_expiry: {
					required: true,
				},
                                job_details: {
					required: true,
				},
                                qualification_required: {
					required: true,
				},
                                policycheck: {
					required: true,
				},
				agree: "required"
			},
			messages: {
                               
				agree: "&nbsp; Please confirm this declaration. &nbsp;"
			}
		});
	});
        
        $().ready(function() {

		$("#editjobb").validate({
			rules: {
				job_title: {
					required: true,
				},
                                no_vacancy: {
					required: true,
				},
                                date_expiry: {
					required: true,
				},
                                job_details: {
					required: true,
				},
                                qualification_required: {
					required: true,
				},
                                policycheck: {
					required: true,
				},
				agree: "required"
			},
			messages: {
                               
				agree: "&nbsp; Please confirm this declaration. &nbsp;"
			}
		});
	});
	
	$().ready(function() {

		$("#jobs_change_password").validate({
			rules: {
				old_password: {
					required: true,
				},
				new_password: {
					required: true,
					minlength: 8,
				},
                                confirm_new_password: {
					required: true,
					minlength: 8,
					equalTo: "#new_password"
				},
                            },
			messages: {
				old_password: {
					required: "Please provide your previous password.",
				},
                                new_password: {
					required: "This field is required.",
                                        minlength: "Your password must be at least 8 characters long",
				},
				confirm_new_password: {
					required: "This field is required.",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Please enter the same password as above"
				},
			}
		});
	});
	
	$().ready(function() {

		$("#reset_change_password").validate({
			rules: {
				new_password: {
					required: true,
					minlength: 8,
				},
                                confirm_new_password: {
					required: true,
					minlength: 8,
					equalTo: "#new_password"
				},
                            },
			messages: {
                                new_password: {
					required: "This field is required.",
                                        minlength: "Your password must be at least 8 characters long",
				},
				confirm_new_password: {
					required: "This field is required.",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Please enter the same password as above"
				},
			}
		});
	});
	
	$().ready(function() {

		$("#company_edit_profile").validate({
			rules: {
				company_name: {
					required: true,
				},
                                company_details: {
					required: true,
				},
			},
			messages: {
                                company_name: {
				required: "This field is required.",
				},
                                company_details: {
				required: "This field is required.",
				},
			}
		});
	});
	
	$().ready(function() {

		$("#cchange_password_query").validate({
			rules: {
				old_password: {
					required: true,
				},
				new_password: {
					required: true,
					minlength: 8,
				},
                                confirm_new_password: {
					required: true,
					minlength: 8,
					equalTo: "#new_password"
				},
                            },
			messages: {
				old_password: {
					required: "Please provide your previous password.",
				},
                                new_password: {
					required: "This field is required.",
                                        minlength: "Your password must be at least 8 characters long",
				},
				confirm_new_password: {
					required: "This field is required.",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Please enter the same password as above"
				},
			}
		});
	});
	
	$().ready(function() {

		$("#contact_us_query").validate({
			rules: {
				full_name: {
					required: true,
				},
                                email_address: {
					required: true,
				},
                                subject: {
					required: true,
				},
                                message: {
					required: true,
				},
			},
			messages: {
                                full_name: {
				required: "This field is required.",
				},
                                email_address: {
				required: "This field is required.",
				},
                                subject: {
				required: "This field is required.",
				},
                                message: {
				required: "This field is required.",
				},
			}
		});
	});
        
        $().ready(function() {

		$("#educationForm").validate({
			rules: {
				institute_name: {
					required: true,
				},
                                course_title: {
					required: true,
				},
                                start_date_year: {
					required: true,
				},
                               
			},
			messages: {
                                institute_name: {
				required: "This field is required.",
				},
                                course_title: {
				required: "This field is required.",
				},
                                start_date_year: {
				required: "This field is required.",
				},
                                
			}
		});
	});
        
        $().ready(function() {

		$("#editeducationForm").validate({
			rules: {
				institute_name: {
					required: true,
				},
                                course_title: {
					required: true,
				},
                                start_date: {
					required: true,
				},
                               
			},
			messages: {
                                institute_name: {
				required: "This field is required.",
				},
                                course_title: {
				required: "This field is required.",
				},
                                start_date: {
				required: "This field is required.",
				},
                                
			}
		});
	});
        
        $().ready(function() {

		$("#add_experience").validate({
			rules: {
				designation: {
					required: true,
				},
                                organization: {
					required: true,
				},
                                start_date: {
					required: true,
				},
                               
			},
			messages: {
                                designation: {
				required: "This field is required.",
				},
                                organization: {
				required: "This field is required.",
				},
                                start_date: {
				required: "This field is required.",
				},
                                
			}
		});
	});
        
        $().ready(function() {

		$("#edit_experience").validate({
			rules: {
				designation: {
					required: true,
				},
                                organization: {
					required: true,
				},
                                start_date: {
					required: true,
				},
                               
			},
			messages: {
                                designation: {
				required: "This field is required.",
				},
                                organization: {
				required: "This field is required.",
				},
                                start_date: {
				required: "This field is required.",
				},
                                
			}
		});
	});
	

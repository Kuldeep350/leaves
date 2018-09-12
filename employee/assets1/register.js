// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		
		 // name validation
		  var nameregex = /^[a-zA-Z ]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
		 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
		 
		 $("#register-form").validate({
					
		  rules:
		  {
				name: {
					required: true,
					validname: true,
					minlength: 4
				},
				email: {
					required: true,
					validemail: true
				},
				password: {
					required: true,
					minlength: 3,
					maxlength: 15
				},
				cpassword: {
					required: true,
					equalTo: '#password'
				},
		   },
		   messages:
		   {
				name: {
					required: "<b style='font-family:cursive; font-size:18px; color:red;'>Please Enter Correct User Name</b>",
					validname: "<b style='font-family:cursive; font-size:18px; color:red;'>Name must contain only alphabets and space</b>",
					minlength: "<b style='font-family:cursive; font-size:18px; color:red;'>Your Name is Too Short</b>"
					  },
			    email: {
					  required: "<b style='font-family:cursive; font-size:18px; color:red;'>Please Enter Correct Email Address</b>",
					  validemail: "<b style='font-family:cursive; font-size:18px; color:red;'>Enter Valid Email Address</b>"
					   },
				password:{
					required: "<b style='font-family:cursive; font-size:18px; color:red;'>Please Enter Correct Password</b>",
					minlength: "<b style='font-family:cursive; font-size:18px; color:red;'>Password at least have 8 characters</b>"
					},
				cpassword:{
					required: "<b style='font-family:cursive; font-size:18px; color:red;'>Please Re-type Your Password</b>",
					equalTo: "<b style='font-family:cursive; font-size:18px; color:red;'>Password Did not Match !</b>"
					}
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
		   
		   		submitHandler: function(form){
					
					alert('Successfully Registered!!!');
					form.submit();
					//var url = $('#register-form').attr('action');
					//location.href=url;
					
				}
				
				/*submitHandler: function() 
							   { 
							   		alert("Successfully Registered!!!!");
									$("#register-form").resetForm(); 
							   }*/
		   
		   }); 
		   
		   
		   /*function submitForm(){
			 
			   
			   /*$('#message').slideDown(200, function(){
				   
				   $('#message').delay(3000).slideUp(100);
				   $("#register-form")[0].reset();
				   $(element).closest('.form-group').find("error").removeClass("has-success");
				    
			   });
			   
			   alert('Successfully Registered!!!');
			   $("#register-form").resetForm();
			      
		   }*/
});
//---------------------------- Reset Button ---------------------------------

"use strict",
function PageReset(){
	window.location.reload();
}
//---------------------------- contact section ------------------------------
function ckhformcontact(){
	
	if(document.getElementById("name").value==''){
		alert("Please Enter Your Name"); 
		document.getElementById("name").value='';
		document.getElementById("name").focus();
		return false;
	}
	if(document.getElementById("email").value==''){
		alert("Please Enter Your Email"); 
		document.getElementById("email").value='';
		document.getElementById("email").focus();
		return false;
	}
	if(!validateEmail("Email Address",document.getElementById("email").value))	
	{
		document.getElementById("email").click();
		document.getElementById("email").focus();
		return false;
	}
	if(document.getElementById("phone").value==''){
		alert("Please Enter Your Phone"); 
		document.getElementById("phone").value='';
		document.getElementById("phone").focus();
		return false;
	}
	if(document.getElementById("message").value==''){
		alert("Please Enter Your Message"); 
		document.getElementById("message").value='';
		document.getElementById("message").focus();
		return false;
	}
    return true;
}

function ajaxmailcontact(){
	
	if(ckhformcontact() == true){
			
	var form_data = $('#contact_form').serialize();
	
		$.ajax({
		type: "POST",
		url:"assets/php/mailcontroller.php?mode=contact",
		data:form_data,
		cache:false,
		async:false,
		success: function(data) {
			//alert(data);
			if(data==1){
				$('#name_error').css('display','none');
				$('#email_error').css('display','none');
				$('#phone_error').css('display','none');
				$('#message_error').css('display','none');
				$('#mail_fail').css('display','none');
				$('#mail_success').css('display','block');
				$('#contact_form')[0].reset();
			}else if(data==2){
				$('#email_error').css('display','none');
				$('#phone_error').css('display','none');
				$('#message_error').css('display','none');
				$('#mail_success').css('display','none');
				$('#mail_fail').css('display','none');
				$('#name_error').css('display','block');
			}else if(data==3){
				$('#phone_error').css('display','none');
				$('#message_error').css('display','none');
				$('#mail_success').css('display','none');
				$('#mail_fail').css('display','none');
				$('#name_error').css('display','none');
				$('#email_error').css('display','block');
			}else if(data==4){
				$('#email_error').css('display','none');
				$('#message_error').css('display','none');
				$('#mail_success').css('display','none');
				$('#mail_fail').css('display','none');
				$('#name_error').css('display','none');
				$('#phone_error').css('display','block');
			}else if(data==5){
				$('#email_error').css('display','none');
				$('#phone_error').css('display','none');
				$('#mail_success').css('display','none');
				$('#mail_fail').css('display','none');
				$('#name_error').css('display','none');
				$('#message_error').css('display','block');
			}else {
				$('#email_error').css('display','none');
				$('#phone_error').css('display','none');
				$('#mail_success').css('display','none');
				$('#name_error').css('display','none');
				$('#message_error').css('display','none');
				$('#mail_fail').css('display','block');
			}
			
		}
		});
		
	}
}



//---------------------------- subscriber section ------------------------------
function ckhformsubscribe(){
	if(document.getElementById("subsEmail").value==''){
		alert("Please Enter Your Email Address"); 
		document.getElementById("subsEmail").value='';
		document.getElementById("subsEmail").focus();
		return false;
	}
	if(!validateEmail("Email Address",document.getElementById("subsEmail").value))	
	{
		document.getElementById("subsEmail").click();
		document.getElementById("subsEmail").focus();
		return false;
	}
    return true;
}

function mailsubscribe(){
	
if(ckhformsubscribe() == true){
	//alert(2);
	var form_data=$('#subsForm').serialize();
	//alert(form_data);
		$.ajax({
		type: "POST",
		url:"assets/php/mailcontroller.php?mode=subscriber",
		data:form_data,
		cache:false,
		async:false,
		success: function(data) {
			//alert(data);
			if(data==1){
				$('#subsemail_error').css('display','none');
				$('#subsmail_fail').css('display','none');
				$('#subsmail_success').css('display','block');
				$('#subsForm')[0].reset();
			}else if(data==2){
				$('#subsmail_success').css('display','none');
				$('#subsmail_fail').css('display','none');
				$('#subsemail_error').css('display','block');
			}else {
				$('#subsemail_error').css('display','none');
				$('#subsmail_success').css('display','none');
				$('#subsmail_fail').css('display','block');
			}
		}
		});
}
}


//---------------------------- faq section ------------------------------
function ckhformfaq(){
	
	if(document.getElementById("faq_name").value==''){
		alert("Please Enter Your Name"); 
		document.getElementById("faq_name").value='';
		document.getElementById("faq_name").focus();
		return false;
	}
	
	if(document.getElementById("faq_email").value==''){
		alert("Please Enter Your Email Address"); 
		document.getElementById("faq_email").value='';
		document.getElementById("faq_email").focus();
		return false;
	}
	
	if(!validateEmail("Email Address",document.getElementById("faq_email").value))	
	{
		document.getElementById("faq_email").click();
		document.getElementById("faq_email").focus();
		return false;
	}
	
	if(document.getElementById("faq_subject").value==''){
		alert("Please Enter Your Subject"); 
		document.getElementById("faq_subject").value='';
		document.getElementById("faq_subject").focus();
		return false;
	}
	
	if(document.getElementById("faq_question").value==''){
		alert("Please Enter Your Question"); 
		document.getElementById("faq_question").value='';
		document.getElementById("faq_question").focus();
		return false;
	}
	
    return true;
}

function ajaxmailfaq(){
	
if(ckhformfaq() == true){
	//alert(2);
	var form_data=$('#faq_form').serialize();
	//alert(form_data);
		$.ajax({
		type: "POST",
		url:"assets/php/mailcontroller.php?mode=faqmail",
		data:form_data,
		cache:false,
		async:false,
		success: function(data) {
			//alert(data);
			if(data==1){
				$('#faqname_error').css('display','none');
				$('#faqemail_error').css('display','none');
				$('#faqsubject_error').css('display','none');
				$('#faqquestion_error').css('display','none');
				$('#faqmail_fail').css('display','none');
				$('#faqmail_success').css('display','block');
				$('#faq_form')[0].reset();
			}else if(data==2){
				$('#faqemail_error').css('display','none');
				$('#faqsubject_error').css('display','none');
				$('#faqquestion_error').css('display','none');
				$('#faqmail_success').css('display','none');
				$('#faqmail_fail').css('display','none');
				$('#faqname_error').css('display','block');
			}else if(data==3){
				$('#faqsubject_error').css('display','none');
				$('#faqquestion_error').css('display','none');
				$('#faqmail_success').css('display','none');
				$('#faqmail_fail').css('display','none');
				$('#faqname_error').css('display','none');
				$('#faqemail_error').css('display','block');
			}else if(data==4){
				$('#faqemail_error').css('display','none');
				$('#faqquestion_error').css('display','none');
				$('#faqmail_success').css('display','none');
				$('#faqmail_fail').css('display','none');
				$('#faqname_error').css('display','none');
				$('#faqsubject_error').css('display','block');
			}else if(data==5){
				$('#faqemail_error').css('display','none');
				$('#faqsubject_error').css('display','none');
				$('#faqmail_success').css('display','none');
				$('#faqmail_fail').css('display','none');
				$('#faqname_error').css('display','none');
				$('#faqquestion_error').css('display','block');
			}else {
				$('#faqemail_error').css('display','none');
				$('#faqsubject_error').css('display','none');
				$('#faqmail_success').css('display','none');
				$('#faqname_error').css('display','none');
				$('#faqquestion_error').css('display','none');
				$('#faqmail_fail').css('display','block');
			}
		}
		});
}
}

<?php 
ob_start();// turn on output buffering
//include_once('phpmailer.php');// to send mail 
include_once('class.phpmailer.php');// to send mail
$mode = $_REQUEST['mode'];

if($mode=='contact'){
	
	if(empty($_POST['name'])) {
		echo "2";
		exit;
	}
	if(empty($_POST['email'])) {
		echo "3";
		exit;
	}
	if(!empty($_POST['email'])) {
		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
			echo "3";
			exit;
		}
	}
	if(empty($_POST['phone'])) {
		echo "4";
		exit;
	}
	if(empty($_POST['message'])) {
		echo "5";
		exit;
	}
	  	
		$mail = new PHPMailer(); // defaults to using php "mail()"

		$mail->IsSendmail(); // telling the class to use SendMail transport
		
		$mail->AddReplyTo($_REQUEST['email'],"User");
		$mail->SetFrom($_REQUEST['email'], ucwords($_REQUEST['name']));
		
		
		$address = "contact@srgit.com";
		$mail->AddAddress($address, "SRGIT");
		$mail->AddBCC($_REQUEST['email'],"User");
		//$mail->AddBCC("shraddha.rusia@gmail.com","Admin");
		$mail->AddBCC("rajnishd@srgit.com","Admin");
		
		$mail->Subject    = "Interior & Furniture";
		
		
		/*$mail = new PHPMailer();
		$mail->Priority = 3; // COPY
		$mail->From = $_REQUEST['email'];
		$mail->FromName = ucwords($_REQUEST['name']);			
		$mail->Subject = "Interior & Furniture";
		$mail->AddAddress("contact@srgit.com","SRGIT");
		//$mail->AddBcc($_REQUEST['subsEmail'],"User");
		$mail->Body = "";
		$mail->AltBody = "";*/
	  
	  	$body .= '
		
  <table cellpadding="5" cellspacing="0" width="60%px" border="0">		
		<tr>
			<td colspan="2"><font face="Verdana" style="font-size:12px"><b>Hello,</b></font></td>
	</tr>
      <tr>
			<td colspan="2"><font face="Verdana" style="font-size:12px">'.ucwords($_REQUEST['name']).' has contacted Interior & Furniture.
</font></td>
	</tr>
          <tr>
            <td valign="middle"><p style="font-size:13px; margin-bottom:10px; margin-top:0;  padding-left:5px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:13px"><b>Contact details are as follows:</b></font></p>
              <table border="0" cellspacing="0" cellpadding="0" width="300">
                <tr>
                  <td valign="top"><table border="0" cellspacing="0" cellpadding="2" width="100%">
                      <tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Name : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px"> '.ucwords($_REQUEST['name']).'</font></th>
		</tr>';
		if(!empty($_REQUEST['phone'])){
		$body .= '<tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Phone : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px">'.$_REQUEST['phone'].'</font></th>
		</tr>';
		}
		if(!empty($_REQUEST['email'])){
		$body .= '<tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Email : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px">'.$_REQUEST['email'].'</font></th>
		</tr>';
		}
		if(!empty($_REQUEST['message'])){
		$body .= '<tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Message : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px">'.$_REQUEST['message'].'</font></th>
		</tr>';
		}
		$body .= '<tr>
			<td colspan="2"><br />
			<font face="Verdana" style="font-size:12px" color="#666666"><b>Kind Regards,<br />
			<font face="Verdana" style="font-size:12px" color="#666666" >
			Interior & Furniture.</font></b>	
			</font>
			</td>
		</tr>
			</table></td>
			</tr>
			</table></td>
			</tr>
			</table></td>
			</tr>
			
			</table> ';
			
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($body);
		
		$mail->Send();
		
		echo 1;
		exit();
}





if($mode=='subscriber'){
	
	if(empty($_POST['subsEmail'])) {
		echo "2";
		exit;
	}
	if(!empty($_POST['subsEmail'])) {
		if(!filter_var($_POST['subsEmail'],FILTER_VALIDATE_EMAIL)) {
			echo "2";
			exit;
		}
	}
		
		$mail = new PHPMailer(); // defaults to using php "mail()"

		$mail->IsSendmail(); // telling the class to use SendMail transport
		
		$mail->AddReplyTo($_REQUEST['subsEmail'],"User");
		$mail->SetFrom($_REQUEST['subsEmail'], "User");
		
		
		$address = "contact@srgit.com";
		$mail->AddAddress($address, "SRGIT");
		$mail->AddBCC($_REQUEST['subsEmail'],"User");
		$mail->AddBCC("shraddha.rusia@gmail.com","Admin");
		
		$mail->Subject    = "Interior & Furniture Subscribe";
		
		/*$mail = new PHPMailer();
		$mail->Priority = 3; // COPY
		$mail->From = $_REQUEST['subsEmail'];
		$mail->FromName = $_REQUEST['subsEmail'];			
		$mail->Subject = "Interior & Furniture Subscribe";
		$mail->AddAddress("contact@srgit.com","SRGIT");
		$mail->AddBcc($_REQUEST['subsEmail'],"User");
		$mail->Body = "";
		$mail->AltBody = "";*/
	  
	  	$body .= '

  <table border="0" cellspacing="0" align="center" cellpadding="5" width="600" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; border:1px solid #cccccc; border-collapse:collapse">
    <tr>
      <td><hr style="opacity:0.3;" /></td>
    </tr>
    <tr>
      <td style="background:#EEEEEE; padding:10px 0" align="center"><strong style="font-size:17px">Date : '.date("F j, Y", strtotime(date("Y-m-d"))).' </strong></td>
    </tr>
    
    <tr>
      <td><table border="0" cellspacing="0" cellpadding="5" width="100%" >
      <tr>
			<td colspan="2"><font face="Verdana" style="font-size:12px"><b>Hello ,</b></font></td>
		</tr>
      <tr>
			<td colspan="2"><font face="Verdana" style="font-size:12px">Thank you for subscribing. We will get back to you soon.
</font></td>
	</tr>
          <tr>
            <td valign="middle"><p style="font-size:13px; margin-bottom:10px; margin-top:0;  padding-left:5px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:13px"><b>Subscriber details are as follows:</b></font></p>
              <table border="0" cellspacing="0" cellpadding="0" width="300">
                <tr>
                  <td valign="top"><table border="0" cellspacing="0" cellpadding="2" width="100%">
                      <tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Email : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px"> '.$_REQUEST['subsEmail'].'</font></th>
		</tr>
        <tr>
			<td colspan="2"><br />
			<font face="Verdana" style="font-size:12px" color="#666666"><b>From Interior & Furniture auto-email</b><br />
			</font>
			</td>
		</tr>
			</table></td>
			</tr>
			</table></td>
			</tr>
			</table></td>
			</tr>
			
			</table> ';
			
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($body);
		
		$mail->Send();
		
		echo 1;
		exit();

}

if($mode=='faqmail'){
	
	if(empty($_POST['faq_name'])) {
		echo "2";
		exit;
	}
	if(empty($_POST['faq_email'])) {
		echo "3";
		exit;
	}
	if(!empty($_POST['faq_email'])) {
		if(!filter_var($_POST['faq_email'],FILTER_VALIDATE_EMAIL)) {
			echo "3";
			exit;
		}
	}
	if(empty($_POST['faq_subject'])) {
		echo "4";
		exit;
	}
	if(empty($_POST['faq_question'])) {
		echo "5";
		exit;
	}
	
		
		$mail = new PHPMailer(); // defaults to using php "mail()"

		$mail->IsSendmail(); // telling the class to use SendMail transport
		
		$mail->AddReplyTo($_REQUEST['faq_email'],$_REQUEST['faq_name']);
		$mail->SetFrom($_REQUEST['faq_email'], $_REQUEST['faq_name']);
		
		
		$address = "contact@srgit.com";
		$mail->AddAddress($address, "SRGIT");
		$mail->AddBCC($_REQUEST['faq_email'],"User");
		$mail->AddBCC("shraddha.rusia@gmail.com","Admin");
		
		$mail->Subject    = "Interior & Furniture Faq";
		
		/*$mail = new PHPMailer();
		$mail->Priority = 3; // COPY
		$mail->From = $_REQUEST['faq_email'];
		$mail->FromName = $_REQUEST['faq_name'];			
		$mail->Subject = "Interior & Furniture Faq";
		$mail->AddAddress("contact@srgit.com","SRGIT");
		//$mail->AddBcc($_REQUEST['subsEmail'],"User");
		$mail->Body = "";
		$mail->AltBody = "";*/
	  
	  	$body .= '

  <table border="0" cellspacing="0" align="center" cellpadding="5" width="600" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; border:1px solid #cccccc; border-collapse:collapse">
    <tr>
      <td><hr style="opacity:0.3;" /></td>
    </tr>
    <tr>
      <td style="background:#EEEEEE; padding:10px 0" align="center"><strong style="font-size:17px">Date : '.date("F j, Y", strtotime(date("Y-m-d"))).' </strong></td>
    </tr>
    
    <tr>
      <td><table border="0" cellspacing="0" cellpadding="5" width="100%" >
      <tr>
			<td colspan="2"><font face="Verdana" style="font-size:12px"><b>Hello ,</b></font></td>
		</tr>
      <tr>
			<td colspan="2"><font face="Verdana" style="font-size:12px">'.ucwords($_REQUEST['faq_name']).' has asked a question to Interior & Furniture.
</font></td>
	</tr>
          <tr>
            <td valign="middle"><p style="font-size:13px; margin-bottom:10px; margin-top:0;  padding-left:5px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:13px"><b>User details are as follows:</b></font></p>
              <table border="0" cellspacing="0" cellpadding="0" width="300">
                <tr>
                  <td valign="top"><table border="0" cellspacing="0" cellpadding="2" width="100%">
                      <tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Name : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px"> '.$_REQUEST['faq_name'].'</font></th>
		</tr>
					  <tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Email : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px"> '.$_REQUEST['faq_email'].'</font></th>
		</tr>
		
		<tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Subject : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px"> '.$_REQUEST['faq_subject'].'</font></th>
		</tr>
		
		<tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Question : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px"> '.$_REQUEST['faq_question'].'</font></th>
		</tr>
        <tr>
			<td colspan="2"><br />
			<font face="Verdana" style="font-size:12px" color="#666666"><b>From Interior & Furniture auto-email</b><br />
			</font>
			</td>
		</tr>
			</table></td>
			</tr>
			</table></td>
			</tr>
			</table></td>
			</tr>
			
			</table> ';
			
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($body);
		
		$mail->Send();
		
		echo 1;
		exit();

}
?>
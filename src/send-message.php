<?php

	require "twilio-php-master/Services/Twilio.php";
        require "PHPMailer-master/PHPMailerAutoload.php";
	require_once 'lib/firebaseLib.php';
	
	$url='https://ymn.firebaseio.com/';
	$token=null;

	$place=$_GET["place"];
	$date=$_GET["date"];
	$time=$_GET["time"];
	$user="amn2";
	$From_name="name".$user;
	
	$receiver="bsw2";
	$To_name="name".$receiver;

	$path="/hackrice/". $date . "/" .$place;
	$fb=new fireBase($url,$token); 

	if($_GET["hitch"][$To_name]["phone]!=null)
{ 
	//set Account Sid and AuthToken for SMS
	$AccountSid="ACd521f069a475f812b4583050fe696e13";
	$AuthToken= "1eff041bc639c407fa4627de734c07e6";
	$client= new Services_Twilio($AccountSid, $AuthToken);
	
	$To_num=$_GET["hitch"][$To_name]["phone"];
		

	$sms=$client-> account-> sms_messages->create(
		"409-877-7848",  //From Here
		{$To_num}, // To here
		"Hi,"+ {$To_name}!+ " I'm"+ {$From_name}+", and I'm interested in meeting up at"+ {$place}+" at "+ {$time}+" on "+ {$date}+".  My contact info is"+ {$From_info}+".
	};
	

}else	{
	//Email Client
	$mail=new PHPMailer;
	
	$mail->isSMTP();
	$mail->Host= 'smtp1.example.com;smtp2.example.com
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'jswan';                            // SMTP username
	$mail->Password = 'secret';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

	$mail->From = 'from@example.com';
	$mail->FromName = 'Mailer';
	$mail->addAddress({$receiver}+'@example.net', {$To_name});  // Add a recipient
	$mail->addReplyTo({$user}+'@example.com', 'Information');
	
	$mail->WordWrap = 50;                                 // Set word wrap to 50 character
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Hitch Hike Notification';
	$mail->Body    = 'Hi'+ {$To_name}+'.   <b>in bold!</b>';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	}
	}
	
	echo "{$To_name} has been contacted."


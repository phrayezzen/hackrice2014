<?php

	require "twilio-php-master/Services/Twilio.php";
        require "PHPMailer-master/PHPMailerAutoload.php";
	require_once 'lib/firebaseLib.php';
	
	$url='https://ymn.firebaseio.com/';
	$token=null;

	$place=$_GET["place"];
	$date=$_GET["date"];
	$path="/hackrice/". $date . "/" .$place;
	$fb=new fireBase($url,$token);
	$arrangements=json_decode($fb->get($path));

	$user="amn2";
	$time=$arrangements[$user]["time"];
	$From_name=$user;
	if ($arrangements[$user]["phone"]!=null)
	{
		$From_info=$arrangements[$user]["phone"];
		$From_email=""+$user+"@rice.edu";
	}
	else {
		$From_info=""+$user+"@rice.edu";
		$From_email=$From_info;
	}

	$receiver=$_REQUEST["q"];
//until get get a proper way to get names from the LDAP,  then we can only use the net id's
	$To_name=$receiver;

	if($arrangements[$receiver]["phone"]!=null)
{ 
	//set Account Sid and AuthToken for SMS
	$AccountSid="ACd521f069a475f812b4583050fe696e13";
	$AuthToken= "1eff041bc639c407fa4627de734c07e6";
	$client= new Services_Twilio($AccountSid, $AuthToken);
	
	$To_num=$arrangements[$receiver]["phone"];
		

	$sms=$client-> account-> sms_messages->create(
		"409-877-7848",  //From Here
		{$To_num}, // To here
		"Hi,"+ {$To_name}!+ " I'm"+ {$From_name}+", and I'm interested in meeting up at"+ {$place}+" at "+ {$time}+" on "+ {$date}+".  My contact info is"+ {$From_info}+"."
	};
	

}else	{
	//Email Client
	$mail=new PHPMailer;
	$mail->SetFrom($From_email,$To_name);
	$mail->addAddress({$receiver}+'@rice.edu', {$To_name});  // Add a recipient
	$mail->addReplyTo({$From_email}, 'Information');

	$mail->Subject = 'Hitch Hike Notification';
	$mail->Body    = "Hi,"+ {$To_name}!+ " I'm"+ {$From_name}+", and I'm interested in meeting up at"+ {$place}+" at "+ {$time}+" on "+ {$date}+".  My contact info is"+ {$From_info}+".";
	$mail->AltBody = "Hi,"+ {$To_name}!+ " I'm"+ {$From_name}+", and I'm interested in meeting up at"+ {$place}+" at "+ {$time}+" on "+ {$date}+".  My contact info is"+ {$From_info}+"."
	
	var_dump( $mail->send() );
	}
	echo "{$To_name} has been contacted."

?>

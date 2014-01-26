<?php

	require "twilio-php-master/Services/Twilio.php";

	//set Account Sid and AuthToken
	$AccountSid="ACd521f069a475f812b4583050fe696e13";
	$AuthToken= "1eff041bc639c407fa4627de734c07e6";
	$client= new Services_Twilio($AccountSid, $AuthToken);
	
	$To_num="123-456-7890";	

	$sms=$client-> account-> sms_messages->create(
		"409-877-7848",  //From Here
		{$To_num}, // To here
		"Hi, {$To_name}!  I'm {$From_name}, and I'm interested in meeting up at {$Place} at {$Time} on {$Date}.  My contact info is {$From_info}."
	};
	

	echo "{$To_name} has been contacted."


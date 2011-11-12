<?php
/*
|--------------------------------------------------------------------------
| Mailer module
|--------------------------------------------------------------------------
|
| These module are used when sending email from contact form
|
*/

//Enter your email address, email from contact form will send to this addresss. Please enter inside quotes ('myemail@email.com')
define('DEST_EMAIL', 'myemail@email.com');

//Change email subject to something more meaningful
define('SUBJECT_EMAIL', 'Email from contact form');

//Thankyou message when message sent
define('THANKYOU_MESSAGE', 'Thank you! We will get back to you as soon as possible');

//Error message when message can't send
define('ERROR_MESSAGE', 'Oops! something went wrong, please try to submit later.');


/*
|
| Begin sending mail
|
*/

$from_name = $_POST['your_name'];
$from_email = $_POST['email'];

$mime_boundary_1 = md5(time());
$mime_boundary_2 = "1_".$mime_boundary_1;
$mail_sent = false;

# Common Headers
$headers = "";
$headers .= 'From: '.$from_name.'<'.$from_email.'>'.PHP_EOL;
$headers .= 'Reply-To: '.$from_name.'<'.$from_email.'>'.PHP_EOL;
$headers .= 'Return-Path: '.$from_name.'<'.$from_email.'>'.PHP_EOL;        // these two to set reply address
$headers .= "Message-ID: <".$now."webmaster@".$_SERVER['SERVER_NAME'].">";
$headers .= "X-Mailer: PHP v".phpversion().PHP_EOL;                  // These two to help avoid spam-filters

# Boundry for marking the split & Multitype Headers
$headers .= 'MIME-Version: 1.0'.PHP_EOL;
$headers .= "Content-Type: multipart/mixed;".PHP_EOL;
$headers .= "   boundary=\"".$mime_boundary_1."\"".PHP_EOL;

$message = 'Name: '.$from_name.PHP_EOL;
$message.= 'Email: '.$from_email.PHP_EOL.PHP_EOL;
$message.= 'Message: '.PHP_EOL.$_GET['message'].PHP_EOL.PHP_EOL;    

if(!empty($from_name) && !empty($from_email) && !empty($message))
{
	mail(DEST_EMAIL, SUBJECT_EMAIL, $message, $headers);

	echo THANKYOU_MESSAGE;
	
	exit;
}
else
{
	echo ERROR_MESSAGE;
	
	exit;
}

/*
|
| End sending mail
|
*/
?>
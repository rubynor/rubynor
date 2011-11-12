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
define('DEST_EMAIL', 'oma@rubynor.com');

//Change email subject to something more meaningful
define('SUBJECT_EMAIL', 'Rubynor kontaktskjema');

//Thankyou message when message sent
define('THANKYOU_MESSAGE', 'Takk, vi ville komme tilbake til deg så fort som mulig.');

//Error message when message can't send
define('ERROR_MESSAGE', 'Oops! noe gikk feil, prøv igjen senere. Fungerer det fremdeles ikke tweet om det til @rubynor');


/*
|
| Begin sending mail
|
*/

$from_name = $_POST['Ole Morten Heggebakken Amundsen'];
$from_email = $_POST['oma@rubynor.com'];

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
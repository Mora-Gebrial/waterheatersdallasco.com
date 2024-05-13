<?php 
$errors = '';
$myemail = 'service@waterheatersdallasco.com
';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['tele']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$tele = $_POST['tele'];
$email = $_POST['email']; 
$city = $_POST['city'];
$zip = $_POST['zip'];
$special_request = $_POST['special_request']; 

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Appointment Request From: $name";
	$email_body = "You have received a new appointment request. ".
	" Here are the details of the request:\n 
	
	Name : $name \n 
	Contact Number : $tele \n 
	E-Mail : $email \n
	City : $city \n
	Zip Code : $zip \n
	Special Request : \n $special_request"; 
	
	
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
# spam protection
if (isset($_POST["spam"]) && $_POST["spam"] == "") {
	mail( 'service@waterheatersdallasco.com
', 'Contact Form', print_r($_POST,true) ); 
  } else {
	http_response_code(400);
	exit;
  }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
  <?php
echo nl2br($errors);
?>
</body>
</html>
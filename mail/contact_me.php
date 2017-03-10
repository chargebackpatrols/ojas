<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['company']) 	||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$company = strip_tags(htmlspecialchars($_POST['company']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'info@chargebackpatrols.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nCompany: $company\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@chargebackpatrols.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);

// email response
$email_body = "<html><body>Dear $name,<br>";
$email_body .= '<p>We have received your enquiry and will respond to you within 24 hours.  For urgent enquiries please call us on the below number.</p><br>';
$email_body .= '<div style="text-align: left;"><div  style="color: #333333; font-size: 14px; font-family: Arial, Helvetica, sans-serif;">Sales Department</div>';
$email_body .= '<div  style="color: #333333; font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><strong>Chargeback Patrols Inc.</strong></div>';
$email_body .= '<div style="color: #333333; font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><span style="display: inline-block; width: 20px; color: #F7751F;">';
$email_body .= 'p:</span><span>213 291 8988</span></div><div style="color: #333333; font-size: 14px; font-family: Arial, Helvetica, sans-serif;">';
$email_body .= '<span style="display: inline-block; width: 20px; color: #F7751F;">a:</span><span>California, USA</span></div>';
$email_body .= '<div style="color: #333333; font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><span style="display: inline-block; width: 20px; color: #F7751F;">';
$email_body .= 'w:</span><span ><a href="http://www.chargebackpatrols.com" style="color: #1da1db; text-decoration: none; font-weight: normal;">www.chargebackpatrols.com</a>';
$email_body .= '</span></div></div></body></html>';

$headers = "From: noreply@chargebackpatrols.com\r\n"; 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($email_address,"Your inquiry",$email_body,$headers);
return true;			
?>

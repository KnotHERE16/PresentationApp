<?php
session_start();
$date= $_SESSION["date"];
$time = $_SESSION["time"];
$venue = $_SESSION["venue"];
$module = $_SESSION["module"];
$scheduleID = $_SESSION["scheduleID"];
require 'PHPMailerAutoload.php';
require 'class.smtp.php';
require 'class.phpmailer.php';
require_once "Sqlconnect.php";


$mail = new PHPMailer;
$mailto = $_POST['mail_to'];
$email_to = explode(',', $mailto);
$mailSub = $_POST['mail_sub'];
$mailMsg = $_POST['mail_msg'];
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'mail.presentapp.site';             // Specify main and backup SMTP servers
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'notification@presentapp.site';          // SMTP username
$mail->Password = 'sevenapp77'; // SMTP password
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                          // TCP port to connect to
$mail->setFrom('notification@presentapp.site', 'PresentApp');

foreach($email_to as $email)
{ // Add a recipient
	$mail->addAddress($email);
$mail ->Subject = $mailSub;
$mail ->Body = '<b>You are invited to assess this presentation</b>'.'<br/>'
.'Date: '.$date.'<br/>'
.'Time: '.$time.'<br/>'
.'Venue: '.$venue.'<br/>'
.'Module: '.$module.'<br/>'
.'Schedule ID: '.$scheduleID.'<br/>'
.'To register to be assessor click on this link'.'<br/>'
.'http://www.presentapp.site/schlink.php?id='. $scheduleID.'<br/>'.'<br/>'
.'<u>Remark</u>'.'<br/>'.$mailMsg;
  
}
$mail->isHTML(true);  // Set email format to HTML


//$mail->Subject = 'Email from Localhost by PresentApp';
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

if($mail->send()) {
	header ("Location: email_sent.php");
} else {
   header ("Location: email_error.php");
}
?>
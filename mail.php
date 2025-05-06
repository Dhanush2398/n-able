<?php
//get data from form  

$name = $_POST['name'];
$email= $_POST['email'];
$number = $_POST['number'];
$company = $_POST['subject'];
$message= $_POST['message'];
$to = "iaytacages@gmail.com";
$subject = "enquiry Mail From $name";
$txt = "Name = ". $name ."\r\nMobileNumber = " . $number .  "\r\nEmail = " . $email .  "\r\nSubject =" . $company. "\r\nMessage =" . $message ;
$headers = "From:$email" . "\r\n" .
"CC:iaytacages@gmail.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.html");
?>

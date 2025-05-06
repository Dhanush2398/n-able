<?php
    $filenameee =  $_FILES['file']['name'];
    $fileName = $_FILES['file']['tmp_name']; 
    $institute = $_POST['institute'];
    $email = $_POST['email'];
    $phone = $_POST['number'];
    $address = $_POST['address'];
    $name = $_POST['name'];
    $number2 = $_POST['number2'];
    $position = $_POST['position'];
    $requirements = $_POST['requirements'];
    
    $message ="Institute Name = ". $institute . "\r\nPhone Number = " . $phone .  "\r\nEmail = " . $email . "\r\nAddress = " . $address . "\r\nContact Person Name = " . $name . "\r\nContact Person Number = " . $number2 . "\r\nPosition open for = " . $position . "\r\nRequirements =" . $requirements; 
    
    $subject ="Candidates Requirements";
    $fromname ="website Message";
    $fromemail = $email;  
    $mailto = 'aytacages@gmail.com';  

    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));
   
    $separator = md5(time());
    // carriage return type (RFC)
    $eol = "\r\n";
    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;
    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;
    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";
    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        header("Location:thankyou.html");
        
        
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }
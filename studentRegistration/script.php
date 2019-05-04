<?php

require("PHPMailer/class.phpmailer.php");

function sendmail()
    {      
        $mail = new PHPMailer();

        $webmaster_email = 'josephsamuelw1@gmail.com';
        $mail->IsSMTP();        
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPKeepAlive = true;
        $mail->SMTPAutoTLS = false;
        $mail->Host     = "smtp.gmail.com";
        $mail->Username = "josephsamuelw1@gmail.com";
        $mail->Password = "jos57atg@0806";
        $mail->Port     = 587;  
        $mail->Mailer   = "smtp";
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        if (!empty($usersname)) {
            $toEmail = "alelebealsjoshua@gmail.com";
            $subject = "User Registration Activation Email";
            $content = "Click this link to activate your account";
            $mailHeaders = "From: Admin\r\n";

            $email=$toEmail; // Recipients email ID
            $name=$usersname; // Recipient's name
            $mail->From = $webmaster_email;
            $mail->FromName = "Slickry Team";
			$mail->AddAddress($email, $name);
			$mail->AddReplyTo($webmaster_email, $mailHeaders);
			$mail->WordWrap = 50; // set word wrap
			//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment
			//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
			$mail->Priority    = 1; 
			$mail->CharSet     = 'UTF-8';
			$mail->Encoding    = '8bit';
			$mail->ContentType = 'text/html; charset=utf-8\r\n';
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $content; //HTML Body
			$mail->AltBody = $content; //Text Body
			if (!$mail->Send()) {
				 $response = array("status"=>"Problem in registration. Try Again!". $mail->ErrorInfo, "statuscode=>0");
				 //$type = 'failed';
			} else {
				$response = array("status"=>"You have registered and the activation mail is sent to your email. Click the activation link to activate you account.", "statuscode"=>1);	
				//$type = "success";
			}
		    //unset($_POST);
        }
        return $response;
    }

echo(sendmail());
?>
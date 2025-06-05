<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$brand_website = $_POST['brand_website'];
$biggest_brand = $_POST['biggest_brand'];
$big_goal = $_POST['big_goal'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    
    $mail->Host       = 'lighthouse.juanvify.com';                     //Set the SMTP server to send through
    $mail->Username   = 'info@lighthouse.juanvify.com';                     //SMTP username
    $mail->Password   = 'lighthouseonepage';                               //SMTP password
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@lighthouse.juanvify.com', 'LightHouse');
    $mail->addAddress('angeltouch5@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Contact Form - LightHouse';
    $mail->Body    = '<h3>Hello, You got a new contact</h3>
        <h4>Name: '.$name.'</h4>
        <h4>Email: '.$email.'</h4>
        <h4>Phone: '.$phone_number.'</h4>
        <h4>Brand Website: '.$brand_website.'</h4>
        <h4>Biggest Brand: '.$biggest_brand.'</h4>
        <h4>Big Goal: '.$big_goal.'</h4>
    
    ';

    $mail->send();
    echo "Good";
} catch (Exception $e) {
    echo "Error";
}

// $to = "juancarlosvidalp@hotmail.com";
// $name = $_POST['name'];
// $email = $_POST['email'];
// $phone_number = $_POST['phone_number'];
// $brand_website = $_POST['brand_website'];
// $biggest_brand = $_POST['biggest_brand'];
// $big_goal = $_POST['big_goal'];

// 	$message = "Name: $name\nEmail: $email\nPhone Number: $phone_number\nBrand Website: $brand_website\nBiggest Brand: $biggest_brand\nBig Goal: $big_goal";
// 	$subject = "=?utf-8?B?".base64_encode("message from the site")."?=";
// 	$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/plain; charset=utf-8\r\n";

// 	if(mail($to, $subject, $message, $headers))
// 		echo "Good";
// 	else
// 		echo "Error";

?>
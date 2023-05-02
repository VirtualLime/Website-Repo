<link rel="stylesheet" href="../../Assets/vendor/bootstrap/css/bootstrap.min.css">
<?php 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
use PHPMailer\PHPMailer\SMTP;

function send_mail($data){

$name = $data['name'];
$subject = $data['subject'];
$message = $data['message'];
//$message


//$email = $POST['email'];
  
//This is required for php mailer v6
require "../assets/vendor/autoload.php"; 

//TODO: first check if the user exist with that email
$mail = new PHPMailer(true); 

$mail->isSMTP();
try { 
  //Taken straight from the readme, except using a gmail smtp server to send the email
    $mail->SMTPDebug = 0;  
    $mail->Mailer='smtp';                                      
    $mail->isSMTP();                                             
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                              
    $mail->Username   = 'automatedmailer44@gmail.com';                  
    $mail->Password   = 'xwdvvyjwlgizhdxb';                         
    $mail->SMTPSecure = 'tls';                               
    $mail->Port       = '587';   
    $mail->IsHTML(TRUE);
    $mail->setFrom('automatedmailer44@gmail.com', 'Automated Message'); 
    $mail->addAddress('TylerArsenaultt@gmail.com');
    //if you get ssl errors uncomment this and try again
    $mail->SMTPOptions = array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
      )
      );


    $mail->Subject = $subject; 
    $mail->Body    = $name . " has sent: " . $message;
    //$mail->AltBody = 'reset password'; 
    $mail->send(); 

    echo '<div class="center"><div style="text-align: center;" class="alert alert-success center" role="alert"> <span>Email has been sent</span> </div></div>';
  } catch (Exception $e) { 
    //echo '<div class="col-lg-4 center alert alert-danger" role="alert">
        //Message could not be sent. Mailer Error:'. $mail->ErrorInfo.'</div>'; 
        echo '<div class="center"><div style="text-align: center;" class="alert alert-danger center" role="alert"> <span>Message could not be sent mailer error</span> </div></div>';
    
    
} 
  
}
?> 
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// require 'vendor/autoload.php';



if(isset($_POST['password-reset-token']) && $_POST['email']){
    
    include ('../connect/config.php');
     
    $emailId = $_POST['email'];

    $sql = "SELECT * FROM student WHERE email='$emailId'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll();
 
  if($row){
     $token = md5($emailId).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
        $expDate = date("Y-m-d H:i:s",$expFormat);

        $sql_edit = "UPDATE student set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'";
        $stmt_edit = $conn->prepare($sql_edit);
        $result = $stmt_edit->execute();
    
       $link = "<a href=http://localhost/ploy-project/myprojects/index.php?menu=reset_new&key='$emailId'&token='$token' target='_blank'>Click To Reset password </a>";
    // //Load Composer's autoloader
    require '../vendor/autoload.php';

    // require_once('phpmail/PHPMailerAutoload.php');  
   
    $mail = new PHPMailer();

    // var_dump($mail); 
    // echo ($link);
 try{

    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "pipizz2402@gmail.com";
    // GMAIL password
    $mail->Password = "covnqpbgyvtntwrq";
    $mail->SMTPSecure = "ssl";  
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // sets GMAIL as the SMTP server
    $mail->Host = 'smtp.gmail.com';
    // set the SMTP port for the GMAIL server
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Port = 465;
    $mail->From='pipizz2402@gmail.com';
    $mail->FromName='มหาวิทยาลัยธนบุรี (Thonburi University)';
    $mail->AddAddress( $emailId, 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      // echo "Check Your Email and Click on the link sent to your email";
      echo "<script>alert('Check Your Email and Click on the link sent to your email');</script>";
      echo "<script>window.location='../index.php?menu=home';</script>";
      exit();
    }
    else
    {
      // echo "Mail Error - >".$mail->ErrorInfo;
      echo "<script>alert('Mail Error - >'+$mail->ErrorInfo);</script>";
      echo "<script>window.location='../index.php?menu=reset';</script>";
      exit();
    }

    }catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
        echo "<script>alert('Message could not be sent. Mailer Error: '+$mail->ErrorInfo);</script>";
        echo "<script>window.location='../index.php?menu=reset';</script>"; 
        exit();  
    }

  }else{
    // echo "Invalid Email Address. Go back";
    echo "<script>alert('Invalid Email Address. Go back');</script>";
    echo "<script>window.location='../index.php?menu=reset';</script>";   
    exit();
  }
}
?>
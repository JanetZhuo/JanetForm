<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./PHPMailer/Exception.php";
require "./PHPMailer/PHPMailer.php";
require "./PHPMailer/SMTP.php";
require "./env.php";

$mail = new PHPMailer(true);

$course_check = $_POST["course_check"];
$achieve = $_POST["achieve"];
$support_require = $_POST["support_require"];
	
$body = "<br/><br/>";

$body = $body."<strong>This course is identified in my Work Plan and Learning Agreement.</strong><br/>".$course_check."<br/><br/>";
if (strcmp($course_check, "Yes") == 0) {
	$attend_reasons = implode("<br/>", $_POST["attend"]);
	$body = $body."<strong>I am attending this session because (tick all that apply).</strong><br/>".$attend_reasons."<br/><br/>";
}

$body = $body.'<strong>What would you like to achieve as a result of your attendance? For example, I would like to learn to write better emails to improve my communication skills.</strong><br/>'.$achieve."<br/><br/>";

$body = $body."<strong>Do you require adjustments or additions to the session delivery to support your participation? For example, hearing loop or wheelchair access.</strong><br/>".$support_require."<br/><br/>";
if (strcmp($support_require, "Yes") == 0) {
	$requirement = $_POST["requirement"];
	$body = $body."<strong>Please provide details of your requirements.</strong><br/>".$requirement."<br/><br/>";
}

try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = $smtpServer;
    $mail->SMTPAuth = true;
	
    $mail->Username = $smtpUsername;
    $mail->Password = $stmpPassword;
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($toEmail, $toName);
    $mail->addReplyTo($fromEmail, $fromName);
	
    //send attachments
	$fileNames = $_FILES["file"]["name"];
	$tmpNames = $_FILES["file"]["tmp_name"];
	$fileSizes = $_FILES["file"]["size"];
	for($i=0; $i<count($fileNames); ++$i){
		if ($fileSizes[$i] > 0 ) {
			$mail->addAttachment($tmpNames[$i], $fileNames[$i]);
		}
    }
	
    $mail->isHTML(true);
    $mail->Subject = "Registration Request";
    $mail->Body    = $body;
    $mail->AltBody = $body;

    $mail->send();
    echo '<html>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your registration request;<br/> we will be in touch shortly!</p>
      </div>
    </body>
    </html>';
} catch (Exception $e) {
    echo '<html>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #cc0000;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #cc0000;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">X</i>
      </div>
        <h1>Fail</h1> 
        <p>Sorry, please try again.</p>
      </div>
    </body>
    </html>', $mail->ErrorInfo;
}

?>
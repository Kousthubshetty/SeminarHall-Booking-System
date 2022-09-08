<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
function contactussendmail($mailid,$mailname,$subject,$message,$sendername,$senderemail)
{
	
	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = false; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'seminarhallsdm@gmail.com';               //SMTP username
		$mail->Password   = 'seminarhall@sdmc';                       //SMTP password
		$mail->SMTPSecure = 'tls';            						//Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom($senderemail, $sendername);
		$mail->addAddress($mailid, $mailname);     //Add a recipient
	   // $mail->addAddress('ellen@example.com');               //Name is optional
		$mail->addReplyTo($senderemail, $sendername);
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->AltBody = $subject;
	
			$mail->send();
			//alert('Message has been sent');
		} catch (Exception $e) 
			{
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
}

function funsendmail($mailid,$mailname,$subject,$message,$tblmessage,$arrdata)
{

	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = false; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'seminarhallsdm@gmail.com';               //SMTP username
		$mail->Password   = 'seminarhall@sdmc';                       //SMTP password
		$mail->SMTPSecure = 'tls';            						//Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('seminarhall6@gmail.com', 'Seminar Hall');
		$mail->addAddress($mailid, $mailname);     //Add a recipient
	   // $mail->addAddress('ellen@example.com');               //Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

$htmlmessagetemplate = '<style>
	@media only screen and (max-width: 600px) {
		.main {
			width: 320px !important;
		}

		.top-image {
			width: 100% !important;
		}
		.inside-footer {
			width: 320px !important;
		}
		table[class="contenttable"] { 
            width: 320px !important;
            text-align: left !important;
        }
        td[class="force-col"] {
	        display: block !important;
	    }
	     td[class="rm-col"] {
	        display: none !important;
	    }
		.mt {
			margin-top: 15px !important;
		}
		*[class].width300 {width: 255px !important;}
		*[class].block {display:block !important;}
		*[class].blockcol {display:none !important;}
		.emailButton{
            width: 100% !important;
        }

        .emailButton a {
            display:block !important;
            font-size:18px !important;
        }

	}
</style>
  <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">

<table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
		<tr>
			<td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
				<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
					<tr>
						<td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid #00a5b5">
							<a href="#"><img class="top-image" src="https://technopulse.in/images/seminarhalllogo.png" style="line-height: 1;width: 600px;" alt="Seminar hall bookinG"></a>
						</td>
					</tr>
					<tr>
						<td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
							<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<tr>
									<td class="head-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 28px;line-height: 34px;font-weight: bold; text-align: center;">
										<div class="mktEditable" id="main_title">
											'. $subject .'
										</div>
									</td>
								</tr>
								<tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;"></td>
								</tr>';
if($arrdata['start_dt_tim'] != "")								
{
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
	<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff; text-align:center;">
	<div class="mktEditable" id="cta">
		<strong>Start Date</strong>: ' . $arrdata['start_dt_tim'] . '<br>
		<strong>End Date</strong>:  ' . $arrdata['end_dt_tim'] . '<br>
	</div>
	</td>
</tr>';
}
if($message != "")
{
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 21px;">
										<hr size="1" color="#eeeff0">
									</td>
								</tr>
								<tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
									<div class="mktEditable" id="main_text">';
$htmlmessagetemplate = $htmlmessagetemplate . $message;
$htmlmessagetemplate = $htmlmessagetemplate . '</div></td></tr>';
}
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
	<td>
	<div class="mktEditable" id="cta_try">
		<table border="0" cellpadding="0" cellspacing="0" class="mobile" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
			<tr>
				<td class="rm-col" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;padding-right: 15px;"></td>
				<td class="force-col" valign="top" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">';
$htmlmessagetemplate = $htmlmessagetemplate . $tblmessage . '
</td>	
			</tr>
		</table>
	</div>	
	</td>
</tr>
								<tr>
									<td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									 &nbsp;<br>
									</td>
								</tr>
								<tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									<div class="mktEditable" id="download_button" style="text-align: center;">
										<a style="color:#ffffff; background-color: #ff8300; border: 20px solid #ff8300; border-left: 20px solid #ff8300; border-right: 20px solid #ff8300; border-top: 10px solid #ff8300; border-bottom: 10px solid #ff8300;border-radius: 3px; text-decoration:none;" href="' . $arrdata['link'] . '">View Booking Detail</a>										
									</div>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
					<tr>
						<td style="padding:20px; font-family: Arial, sans-serif; -webkit-text-size-adjust: none;" align="center">
							<table>
								<tr>
									<td align="center" style="font-family: Arial, sans-serif; -webkit-text-size-adjust: none; font-size: 16px;">
										<a style="color: #00a5b5;" href="">Forward this Email</a>
										<br/><span style="font-size:10px; font-family: Arial, sans-serif; -webkit-text-size-adjust: none;" >Please only forward this email to colleagues or contacts who will be interested in receiving this email.</span>
									</td>
								</tr>
							</table>
						</td>
					</tr>
										
					<tr bgcolor="#fff" style="border-top: 4px solid #00a5b5;">
					<td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
						<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
							<tr>
								<td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
<div id="address" class="mktEditable">
									<b>Seminar Hall Booking</b><br>
									SDM College (Autonomous), Ujire <br>  574240 <br> Ph. No. 08256-236221, 225<br>
									Email : sdmcollege@sdmcujire.in<br>
									Email : pgcenter@sdmcujire.in<br>
						<a style="color: #00a5b5;" href="https://www.sdmcujire.in/">Contact Us</a>
</div>
								</td>
							</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
  </body>';


		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $htmlmessagetemplate;
		$mail->AltBody = $subject;

		$mail->send();
		//echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
function hallbookingverification($adminid,$adminname,$subject,$adminnote,$staffname,$staffid,$arrdata)
{
	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = false; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'seminarhallsdm@gmail.com';               //SMTP username
		$mail->Password   = 'seminarhall@sdmc';                       //SMTP password
		$mail->SMTPSecure = 'tls';            						//Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('seminarhallsdm@gmail.com', 'Seminar Hall Booking');
		$mail->addAddress($staffid, $staffname);     //Add a recipient
	   // $mail->addAddress('ellen@example.com');               //Name is optional
		//$mail->addReplyTo($adminid, $adminname);
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
$htmlmessagetemplate = '<style>
	@media only screen and (max-width: 600px) {
		.main {
			width: 320px !important;
		}

		.top-image {
			width: 100% !important;
		}
		.inside-footer {
			width: 320px !important;
		}
		table[class="contenttable"] { 
            width: 320px !important;
            text-align: left !important;
        }
        td[class="force-col"] {
	        display: block !important;
	    }
	     td[class="rm-col"] {
	        display: none !important;
	    }
		.mt {
			margin-top: 15px !important;
		}
		*[class].width300 {width: 255px !important;}
		*[class].block {display:block !important;}
		*[class].blockcol {display:none !important;}
		.emailButton{
            width: 100% !important;
        }

        .emailButton a {
            display:block !important;
            font-size:18px !important;
        }

	}
</style>
  <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">

<table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
		<tr>
			<td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
				<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
					<tr>
						<td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid #00a5b5">
							<a href="#"><img class="top-image" src="https://technopulse.in/images/seminarhalllogo.png" style="line-height: 1;width: 600px;" alt="Seminar hall bookinG"></a>
						</td>
					</tr>
					<tr>
						<td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
							<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<tr>
									<td class="head-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 28px;line-height: 34px;font-weight: bold; text-align: center;">
										<div class="mktEditable" id="main_title">
											'. $subject .'
										</div>
									</td>
								</tr>
								<tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;"></td>
								</tr>';
if($arrdata['start_dt_tim'] != "")								
{
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
	<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff; text-align:center;">
	<div class="mktEditable" id="cta">
		<strong>Start Date</strong>: ' . $arrdata['start_dt_tim'] . '<br>
		<strong>End Date</strong>:  ' . $arrdata['end_dt_tim'] . '<br>
	</div>
	</td>
</tr>';
}
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
	<td>
	<div class="mktEditable" id="cta_try">
		<table border="0" cellpadding="0" cellspacing="0" class="mobile" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
			<tr>
				<td class="rm-col" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;padding-right: 15px;"></td>
				<td class="force-col" valign="top" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">';
$htmlmessagetemplate = $htmlmessagetemplate . $adminnote . '
</td>	
			</tr>
		</table>
	</div>	
	</td>
</tr>
								<tr>
									<td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									 &nbsp;<br>
									</td>
								</tr>
								<tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									<div class="mktEditable" id="download_button" style="text-align: center;">
										<a style="color:#ffffff; background-color: #ff8300; border: 20px solid #ff8300; border-left: 20px solid #ff8300; border-right: 20px solid #ff8300; border-top: 10px solid #ff8300; border-bottom: 10px solid #ff8300;border-radius: 3px; text-decoration:none;" href="' . $arrdata['link'] . '">View Booking Detail</a>										
									</div>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
					<tr>
						<td style="padding:20px; font-family: Arial, sans-serif; -webkit-text-size-adjust: none;" align="center">
							<table>
								<tr>
									<td align="center" style="font-family: Arial, sans-serif; -webkit-text-size-adjust: none; font-size: 16px;">
										<a style="color: #00a5b5;" href="">Forward this Email</a>
										<br/><span style="font-size:10px; font-family: Arial, sans-serif; -webkit-text-size-adjust: none;" >Please only forward this email to colleagues or contacts who will be interested in receiving this email.</span>
									</td>
								</tr>
							</table>
						</td>
					</tr>
										
					<tr bgcolor="#fff" style="border-top: 4px solid #00a5b5;">
						<td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
							<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<tr>
									<td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
<div id="address" class="mktEditable">
										<b>Seminar Hall Booking</b><br>
										SDM College (Autonomous), Ujire <br>  574240 <br> Ph. No. 08256-236221, 225<br>
										Email : sdmcollege@sdmcujire.in<br>
										Email : pgcenter@sdmcujire.in<br>
                            <a style="color: #00a5b5;" href="https://www.sdmcujire.in/">Contact Us</a>
</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
  </body>';
		
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $htmlmessagetemplate;
			$mail->AltBody = $subject;
	
			$mail->send();
			//echo 'Message has been sent';
		} catch (Exception $e) 
			{
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
}


function staffverification($mailid,$mailname,$tblmessage,$subject,$button)
{
	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = false; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'seminarhallsdm@gmail.com';               //SMTP username
		$mail->Password   = 'seminarhall@sdmc';                       //SMTP password
		$mail->SMTPSecure = 'tls';            						//Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('seminarhall6@gmail.com', 'Seminar Hall');
		$mail->addAddress($mailid, $mailname);     //Add a recipient
	   // $mail->addAddress('ellen@example.com');               //Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

$htmlmessagetemplate = '<style>
	@media only screen and (max-width: 600px) {
		.main {
			width: 320px !important;
		}

		.top-image {
			width: 100% !important;
		}
		.inside-footer {
			width: 320px !important;
		}
		table[class="contenttable"] { 
            width: 320px !important;
            text-align: left !important;
        }
        td[class="force-col"] {
	        display: block !important;
	    }
	     td[class="rm-col"] {
	        display: none !important;
	    }
		.mt {
			margin-top: 15px !important;
		}
		*[class].width300 {width: 255px !important;}
		*[class].block {display:block !important;}
		*[class].blockcol {display:none !important;}
		.emailButton{
            width: 100% !important;
        }

        .emailButton a {
            display:block !important;
            font-size:18px !important;
        }

	}
</style>
  <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">

<table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
		<tr>
			<td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
				<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
					<tr>
						<td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid #00a5b5">
							<a href="#"><img class="top-image" src="https://technopulse.in/images/seminarhalllogo.png" style="line-height: 1;width: 600px;" alt="Seminar hall bookinG"></a>
						</td>
					</tr>
					<tr>
						<td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
							<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<tr>
									<td class="head-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 28px;line-height: 34px;font-weight: bold; text-align: center;">
										<div class="mktEditable" id="main_title">
											'. $subject .'
										</div>
									</td>
								</tr>
								<tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;"></td>
								</tr>';
if($arrdata['start_dt_tim'] != "")								
{
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
	<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff; text-align:center;">
	<div class="mktEditable" id="cta">
		<strong>Start Date</strong>: ' . $arrdata['start_dt_tim'] . '<br>
		<strong>End Date</strong>:  ' . $arrdata['end_dt_tim'] . '<br>
	</div>
	</td>
</tr>';
}
if($message != "")
{
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 21px;">
										<hr size="1" color="#eeeff0">
									</td>
								</tr>
								<tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
									<div class="mktEditable" id="main_text">';
$htmlmessagetemplate = $htmlmessagetemplate . $message;
$htmlmessagetemplate = $htmlmessagetemplate . '</div></td></tr>';
}
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
	<td>
	<div class="mktEditable" id="cta_try">
		<table border="0" cellpadding="0" cellspacing="0" class="mobile" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
			<tr>
				<td class="rm-col" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;padding-right: 15px;"></td>
				<td class="force-col" valign="top" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">';
$htmlmessagetemplate = $htmlmessagetemplate . $tblmessage . '
</td>	
			</tr>
		</table>
	</div>	
	</td>
</tr>
								<tr>
									<td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									 &nbsp;<br>
									</td>
								</tr>
								<tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									<div class="mktEditable" id="download_button" style="text-align: center;">
										' . $button . '									
									</div>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
			

					<tr bgcolor="#fff" style="border-top: 4px solid #00a5b5;">
						<td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
							<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<tr>
									<td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
<div id="address" class="mktEditable">
										<b>Seminar Hall Booking</b><br>
										SDM College (Autonomous), Ujire <br>  574240 <br> Ph. No. 08256-236221, 225<br>
										Email : sdmcollege@sdmcujire.in<br>
										Email : pgcenter@sdmcujire.in<br>
                            <a style="color: #00a5b5;" href="https://www.sdmcujire.in/">Contact Us</a>
</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
  </body>';


		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $htmlmessagetemplate;
		$mail->AltBody = $subject;

		$mail->send();
		//echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

function passwordrecoverymail($mailid,$mailname,$subject,$message,$tblmessage,$arrdatalink)
{

	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = false; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'seminarhallsdm@gmail.com';               //SMTP username
		$mail->Password   = 'seminarhall@sdmc';                       //SMTP password
		$mail->SMTPSecure = 'tls';            						//Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('seminarhall6@gmail.com', 'Seminar Hall');
		$mail->addAddress($mailid, $mailname);     //Add a recipient
	   // $mail->addAddress('ellen@example.com');               //Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

$htmlmessagetemplate = '<style>
	@media only screen and (max-width: 600px) {
		.main {
			width: 320px !important;
		}

		.top-image {
			width: 100% !important;
		}
		.inside-footer {
			width: 320px !important;
		}
		table[class="contenttable"] { 
            width: 320px !important;
            text-align: left !important;
        }
        td[class="force-col"] {
	        display: block !important;
	    }
	     td[class="rm-col"] {
	        display: none !important;
	    }
		.mt {
			margin-top: 15px !important;
		}
		*[class].width300 {width: 255px !important;}
		*[class].block {display:block !important;}
		*[class].blockcol {display:none !important;}
		.emailButton{
            width: 100% !important;
        }

        .emailButton a {
            display:block !important;
            font-size:18px !important;
        }

	}
</style>
  <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">

<table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
		<tr>
			<td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
				<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
					<tr>
						<td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid #00a5b5">
							<a href="#"><img class="top-image" src="https://technopulse.in/images/seminarhalllogo.png" style="line-height: 1;width: 600px;" alt="Seminar hall bookinG"></a>
						</td>
					</tr>
					<tr>
						<td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
							<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<tr>
									<td class="head-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 28px;line-height: 34px;font-weight: bold; text-align: center;">
										<div class="mktEditable" id="main_title">
											'. $subject .'
										</div>
									</td>
								</tr>
								<tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;"></td>
								</tr>';

if($message != "")
{
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 21px;">
										<hr size="1" color="#eeeff0">
									</td>
								</tr>
								<tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
									<div class="mktEditable" id="main_text">';
$htmlmessagetemplate = $htmlmessagetemplate . $message;
$htmlmessagetemplate = $htmlmessagetemplate . '</div></td></tr>';
}
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
	<td>
	<div class="mktEditable" id="cta_try">
		<table border="0" cellpadding="0" cellspacing="0" class="mobile" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
			<tr>
				<td class="rm-col" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;padding-right: 15px;"></td>
				<td class="force-col" valign="top" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">';
$htmlmessagetemplate = $htmlmessagetemplate . $tblmessage . '
</td>	
			</tr>
		</table>
	</div>	
	</td>
</tr>
								<tr>
									<td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									 &nbsp;<br>
									</td>
								</tr>
								<tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									<div class="mktEditable" id="download_button" style="text-align: center;">
										<a style="color:#ffffff; background-color: #ff8300; border: 20px solid #ff8300; border-left: 20px solid #ff8300; border-right: 20px solid #ff8300; border-top: 10px solid #ff8300; border-bottom: 10px solid #ff8300;border-radius: 3px; text-decoration:none;" href="' . $arrdatalink . '">Click Here to Recover Password</a>										
									</div>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
					<tr>
						<td style="padding:20px; font-family: Arial, sans-serif; -webkit-text-size-adjust: none;" align="center">
							<table>
								<tr>
									<td align="center" style="font-family: Arial, sans-serif; -webkit-text-size-adjust: none; font-size: 16px;">
										<a style="color: #00a5b5;" href="">Do not Forward this Email to Anyone</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
										
					<tr bgcolor="#fff" style="border-top: 4px solid #00a5b5;">
					<td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
						<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
							<tr>
								<td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
<div id="address" class="mktEditable">
									<b>Seminar Hall Booking</b><br>
									SDM College (Autonomous), Ujire <br>  574240 <br> Ph. No. 08256-236221, 225<br>
									Email : sdmcollege@sdmcujire.in<br>
									Email : pgcenter@sdmcujire.in<br>
						<a style="color: #00a5b5;" href="https://www.sdmcujire.in/">Contact Us</a>
</div>
								</td>
							</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
  </body>';


		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $htmlmessagetemplate;
		$mail->AltBody = $subject;

		$mail->send();
		//echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

function foodordermail($mailid,$mailname,$subject,$message,$tblmessage,$arrdatalink)
{

	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = false; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'seminarhallsdm@gmail.com';               //SMTP username
		$mail->Password   = 'seminarhall@sdmc';                       //SMTP password
		$mail->SMTPSecure = 'tls';            						//Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('seminarhall6@gmail.com', 'Seminar Hall');
		$mail->addAddress($mailid, $mailname);     //Add a recipient
	   // $mail->addAddress('ellen@example.com');               //Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

$htmlmessagetemplate = '<style>
	@media only screen and (max-width: 600px) {
		.main {
			width: 320px !important;
		}

		.top-image {
			width: 100% !important;
		}
		.inside-footer {
			width: 320px !important;
		}
		table[class="contenttable"] { 
            width: 320px !important;
            text-align: left !important;
        }
        td[class="force-col"] {
	        display: block !important;
	    }
	     td[class="rm-col"] {
	        display: none !important;
	    }
		.mt {
			margin-top: 15px !important;
		}
		*[class].width300 {width: 255px !important;}
		*[class].block {display:block !important;}
		*[class].blockcol {display:none !important;}
		.emailButton{
            width: 100% !important;
        }

        .emailButton a {
            display:block !important;
            font-size:18px !important;
        }

	}
</style>
  <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">

<table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
		<tr>
			<td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
				<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
					<tr>
						<td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid #00a5b5">
							<a href="#"><img class="top-image" src="https://technopulse.in/images/seminarhalllogo.png" style="line-height: 1;width: 600px;" alt="Seminar hall bookinG"></a>
						</td>
					</tr>
					<tr>
						<td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
							<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<tr>
									<td class="head-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 28px;line-height: 34px;font-weight: bold; text-align: center;">
										<div class="mktEditable" id="main_title">
											'. $subject .'
										</div>
									</td>
								</tr>
								<tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;"></td>
								</tr>';

if($message != "")
{
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 21px;">
										<hr size="1" color="#eeeff0">
									</td>
								</tr>
								<tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
									<div class="mktEditable" id="main_text">';
$htmlmessagetemplate = $htmlmessagetemplate . $message;
$htmlmessagetemplate = $htmlmessagetemplate . '</div></td></tr>';
}
$htmlmessagetemplate = $htmlmessagetemplate . '<tr>
	<td>
	<div class="mktEditable" id="cta_try">
		<table border="0" cellpadding="0" cellspacing="0" class="mobile" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
			<tr>
				<td class="rm-col" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;padding-right: 15px;"></td>
				<td class="force-col" valign="top" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">';
$htmlmessagetemplate = $htmlmessagetemplate . $tblmessage . '
</td>	
			</tr>
		</table>
	</div>	
	</td>
</tr>
								<tr>
									<td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									 &nbsp;<br>
									</td>
								</tr>
								<tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									<div class="mktEditable" id="download_button" style="text-align: center;">
										<a style="color:#ffffff; background-color: #ff8300; border: 20px solid #ff8300; border-left: 20px solid #ff8300; border-right: 20px solid #ff8300; border-top: 10px solid #ff8300; border-bottom: 10px solid #ff8300;border-radius: 3px; text-decoration:none;" href="' . $arrdatalink . '">View Food Order Receipt</a>										
									</div>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
					<tr>
						<td style="padding:20px; font-family: Arial, sans-serif; -webkit-text-size-adjust: none;" align="center">
							<table>
								<tr>
									<td align="center" style="font-family: Arial, sans-serif; -webkit-text-size-adjust: none; font-size: 16px;">
										<a style="color: #00a5b5;" href="">Do not Forward this Email to Anyone</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
										
					<tr bgcolor="#fff" style="border-top: 4px solid #00a5b5;">
					<td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
						<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
							<tr>
								<td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
<div id="address" class="mktEditable">
									<b>Seminar Hall Booking</b><br>
									SDM College (Autonomous), Ujire <br>  574240 <br> Ph. No. 08256-236221, 225<br>
									Email : sdmcollege@sdmcujire.in<br>
									Email : pgcenter@sdmcujire.in<br>
						<a style="color: #00a5b5;" href="https://www.sdmcujire.in/">Contact Us</a>
</div>
								</td>
							</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
  </body>';


		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $htmlmessagetemplate;
		$mail->AltBody = $subject;

		$mail->send();
		//echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
?>
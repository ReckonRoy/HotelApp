<?php
session_start();

require "phpMailer/vendor/autoload.php";

if(isset($_POST['hotel']))
{
    echo $_SESSION['name_s']."<br>";
    echo $_SESSION['surname_s']."<br>";
    echo $_SESSION['email_s']."<br>";
    echo $_SESSION['ci']."<br>";
    echo $_SESSION['co']."<br>";
    echo $_POST['hotel']."<br>";
    
	
	foreach($_SESSION['hotel_cost'] as $key => $array)
	{
		if( $key == $_POST['hotel'])
		{
			foreach( $array as $second_key => $value)
			{
				if($second_key == "total")
				{
					
					if($_SESSION['year'] > 1)
							  {
								$_SESSION['cost'] = (365 +  $_SESSION['month'] + $_SESSION['day'])* $value;
                              }else
							  {
								$_SESSION['cost'] = ($_SESSION['month'] + $_SESSION['day'] )* $value;  
							  }
				}
			}
				
		}
	}
	
	echo $_SESSION['nod']." For R".$_SESSION['cost']."<br><br>";
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
sendMail($mail, true);

//PHPMailer send email to user
function sendmail($param, $param2){
    //true is real server false is via mailtrap
    if($param2){
        try {
            //Server settings live server
            $param->SMTPDebug = 0;                          // Enable verbose debug output
            $param->isSMTP();                               // Set mailer to use SMTP
            $param->Host       = 'smtp.mailtrap.io';  		// Specify main and backup SMTP servers
            $param->SMTPAuth   = true;                      // Enable SMTP authentication
            $param->Username   = 'f4851ad2013ba7';			// SMTP username
            $param->Password   = '3d0f737c43567f';          // SMTP password
            $param->SMTPSecure = 'tls';                     // Enable TLS encryption, `ssl` also accepted
            $param->Port       = 2525;                       // TCP port to connect to
            $param->Domain = 'smtp.mailtrap.io';
            //Recipients
            $param->setFrom('info@mailtrap.io', 'Mailtrap');
            $param->addAddress($_SESSION['email_s'], 'Mailtrap');     // Add a recipient
            $param->addReplyTo('info@mailtrap.io', 'Mailtrap');
            
            // Content
            $param->isHTML(true);                                  // Set email format to HTML
            $param->Subject = 'Hotel Booking';
            $param->Body    =
            "Hi ".$_SESSION['name_s']." ".$_SESSION['surname_s']. " <br>
        Please see details of your booking below <br>
        Hotel name: <b>".$_POST['hotel']."</b> <br>
        From : info@mailtrap.io to : ".$_SESSION['email_s'] ."<br>
        The cost of the total stay is R". $_SESSION['cost'] . "<br>
        Please deposit funds into the following account<br>
        Hotel Booking, Standard Bank, 5409098790, 1092, Cheque <br>
        Using reference Number " .rand(1, 100)."<br>
        Any further queries you have can be directed to <br>
        admin@thehotelbookingteam.co.za<br>
        Thanks for your bussiness and we look forward to hearing back from you<br>
        <br>The Hotel Bookings Team";
            $param->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $param->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$param->ErrorInfo}";
        }
    }
}//endsendEmail
?>

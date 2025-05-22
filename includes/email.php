<?php
	include_once('phpmailer.php');
	
	class Email
	{
		const _DirMail = 'lepalacio@lepalacio.com.ar';
		const _DirTo = 'lepalacio@lepalacio.com.ar';
		const _DirName = 'LEP Abogados';
		const _Auth = true;
		const _Username = 'mails@lepalacio.com.ar';
		const _Password = 'mails666';
		const _Host = 'smtp.lepalacio.com.ar';
		const _Port = 26;
		
		public static function Enviar($asunto, $mailde, $html)
		{
			$mail             = new PHPMailer();
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host       = self::_Host; // sets the SMTP server
			$mail->Port       = self::_Port;                    // set the SMTP port for the GMAIL server
			
			if (self::_Auth)
			{
				$mail->SMTPAuth   = true;                 	// enable SMTP authentication
				$mail->Username   = self::_Username; 		// SMTP account username
				$mail->Password   = self::_Password;        // SMTP account password
			}
			
			$mail->SetFrom(self::_DirMail, self::_DirName);

			$mail->Subject    = $asunto;

			$mail->MsgHTML($html);

			$mail->AddAddress(self::_DirTo);
			
			if(!$mail->Send()) {
				return false;
			} else {
				return true;
			}
		}
	}
?>
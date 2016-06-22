<?php

namespace STeSI\MailDispatcher;

use STeSI\Entity\StesiMail;
use STeSI\Entity\StesiMailQuery;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer {
	/**
	 *
	 * Mauro Cerone
	 *
	 * @param Email $email        	
	 * @todo implement the attachment (path to file, or database blob)
	 */
	public static function addMailToSend(Email $email) {
		if (! empty ( $email->getStringA () )) {
			$newMail = new StesiMail ();
			$newMail->setFrom ( $email->getFrom ()->getAddress () )->setA ( $email->getStringA () )->setCc ( $email->getStringCc () )->setContent ( $email->getTemplate ()->getHtml () )->setSubject ( $email->getSubject () );
			$newMail->save ();
		}
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @todo read config from file
	 */
	public static function startSendOperation() {
		/** @var ConfigReader $conf */
		$conf = ConfigReader::getInstance ();
		$mailToSend = StesiMailQuery::create ()->filterByDeliveryStatus ( "0" )->find ();
		foreach ( $mailToSend as $mail ) {
			try {
				/** @var StesiMail $conf */
				$mailer = new PHPMailer ( true );
				$mailer->isHTML ( true );
				$mailer->SMTPAuth = true;
				$mailer->isSMTP ();
				$mailer->Username = $conf->getUsername ();
				$mailer->Password = $conf->getPassword ();
				$mailer->Host = $conf->getHost ();
				$mailer->Port = $conf->getPort ();
				$mailer->SMTPSecure = $conf->getSmtSecure ();
				$mailer->setFrom ( $mail->getFrom () );
				$mailer->Subject = $mail->getSubject ();
				$arrayA = explode ( ";", $mail->getA () );
				$arrayCC = explode ( ";", $mail->getCc () );
				foreach ( $arrayA as $a ) {
					if (! empty ( $a )) {
						$mailer->addAddress ( $a );
					}
				}
				foreach ( $arrayCC as $cc ) {
					if (! empty ( $cc )) {
						$mailer->addCC ( $cc );
					}
				}
				$mailer->msgHTML ( $mail->getContent () );
				$mailer->send ();
				$mail->setDeliveryStatus ( 1 );
			} catch ( \Exception $ex ) {
				$mail->setDeliveryStatus ( - 1 );
				$mail->setErrorMessage ( $ex->getMessage () );
			} finally {
				$mail->save ();
			}
		}
	}
}
<?php

namespace STeSI\MailDispatcher\script;

use Composer\Script\Event;

class PostInstallScript {
	/*
	 * "template_dir" : "C:\\Users\\Mauro\\workspace\\Mail Dispatcher\\template",
	 * "template_extension" : "html",
	 * "username": "gles@stesi.eu",
	 * "password": "www.stesi.eu",
	 * "host": "smtps.aruba.it",
	 * "port": "465",
	 * "smtp_secure": "ssl"
	 */
	public static function postInstall(Event $event) {
		$conf = array ();
		echo "Insert propel schema path:";
		$propelPath = trim ( fgets ( STDIN ) );
		echo "Insert template dir: ";
		$conf ['template_dir'] = trim ( fgets ( STDIN ) );
		echo "Insert template extension [html]: ";
		$input = trim ( fgets ( STDIN ) );
		$conf ['template_extension'] = empty ( $input ) ? "html" : $input;
		echo "Insert smtp username: ";
		$conf ['username'] = trim ( fgets ( STDIN ) );
		echo "Insert smtp password: ";
		$conf ['password'] = trim ( fgets ( STDIN ) );
		echo "Insert smtp host: ";
		$conf ['host'] = trim ( fgets ( STDIN ) );
		echo "Insert smtp secure [ssl]: ";
		$input = trim ( fgets ( STDIN ) );
		$conf ['smtp_secure'] = empty ( $input ) ? "ssl" : $input;
		echo "Insert smtp port [465]: ";
		$input = trim ( fgets ( STDIN ) );
		$conf ['port'] = empty ( $input ) ? "465" : $input;
		$file = "config/config.json";
		$fp = fopen ( $file, "w+" );
		fwrite ( $fp, json_encode ( $conf, JSON_PRETTY_PRINT ) );
		fclose ( $fp );
		copy ( "config/mailer.schema.xml", $propelPath . "/mailer.schema.xml" );
		echo "Please launch:\n";
		echo "\t-propel diff\n";
		echo "\t-propel migrate\n";
		echo "\t-propel model:build\n";
	}
}
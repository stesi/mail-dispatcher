<?php

namespace STeSI\MailDispatcher;

class ConfigReader {
	private static $instance = null;
	private $confPath = "";
	private $templatePath;
	private $templateExtension;
	private $username;
	private $password;
	private $host;
	private $port;
	private $smtSecure;
	/**
	 *
	 * Mauro Cerone
	 *
	 * @param string $confPath        	
	 * @throws \Exception
	 */
	protected function __construct($confPath) {
		$this->confPath = $confPath;
		if (! file_exists ( $this->confPath )) {
			throw new \Exception ( "Configuration file not found. Please create it. config/config.json" );
		}
		$str = file_get_contents ( $this->confPath );
		$json = json_decode ( $str, true );
		foreach ( $json as $key => $val ) {
			switch ($key) {
				case "template_dir" :
					$this->templatePath = $val;
					break;
				case "template_extension" :
					$this->templateExtension = $val;
					break;
				case "username" :
					$this->username = $val;
					break;
				case "password" :
					$this->password = $val;
					break;
				case "host" :
					$this->host = $val;
					break;
				case "port" :
					$this->port = $val;
					break;
				case "smtp_secure" :
					$this->smtSecure = $val;
					break;
			}
		}
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @param string $confPath        	
	 */
	public static function getInstance($confPath = '../config/config.json') {
		if (self::$instance == null) {
			$c = __CLASS__;
			self::$instance = new $c ( $confPath );
		}
		return self::$instance;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return string
	 */
	public function getConfPath() {
		return $this->confPath;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return string
	 */
	public function getTemplatePath() {
		return $this->templatePath;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return string
	 */
	public function getTemplateExtension() {
		return $this->templateExtension;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return string
	 */
	public function getHost() {
		return $this->host;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return string
	 */
	public function getPort() {
		return $this->port;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return string
	 */
	public function getSmtSecure() {
		return $this->smtSecure;
	}
}
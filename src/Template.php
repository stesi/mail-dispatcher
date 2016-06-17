<?php

namespace STeSI\MailDispatcher;

class Template {
	private $templatePath;
	private $templateExtension;
	private $keyVal;
	private $templateName;
	public function __construct($templateName = null) {
		$this->templateName = $templateName;
		$this->keyVal = array ();
		/** @var ConfigReader $conf */
		$conf = ConfigReader::getInstance();		
		$this->templatePath = $conf->getTemplatePath();
		$this->templateExtension = $conf->getTemplateExtension();
	}
	
	/**
	 *
	 * Mauro Cerone
	 * 
	 * @throws \Exception
	 * @return string
	 */
	public function getHtml() {
		$fileName = $this->templatePath . "\\" . $this->templateName . "." . $this->templateExtension;
		if (! file_exists ( $fileName )) {
			throw new \Exception ( "File " . $fileName . " not found" );
		}
		$pattern = array ();
		$replacement = array ();
		foreach ( $this->keyVal as $kv ) {
			array_push ( $pattern, "<!-- " . $kv->getKey () . " -->" );
			array_push ( $replacement, $kv->getVal () );
		}
		// return preg_replace($pattern, $replacement, implode ( " ", file ( $fileName ) ));
		return str_replace ( $pattern, $replacement, implode ( " ", file ( $fileName ) ) );
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return \STeSI\MailDispatcher\KeyVal
	 */
	public function getKeyVal() {
		return $this->keyVal;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @param KeyVal $kv        	
	 * @return \STeSI\MailDispatcher\Template
	 */
	public function addKeyVal(KeyVal $kv) {
		array_push ( $this->keyVal, $kv );
		return $this;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @param string $templateName
	 *        	The template name in tempalte folder without .html extension
	 * @return \STeSI\MailDispatcher\Template
	 *
	 */
	public function setTemplateName($templateName) {
		$this->templateName = $templateName;
		return $this;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return string
	 */
	public function getTemplateName() {
		return $this->templateName;
	}
}

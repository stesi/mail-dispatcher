<?php

namespace STeSI\MailDispatcher;

class Email {
	private $from;
	private $a;
	private $cc;
	private $subject;
	private $template;
	public function __construct() {
		$this->a = array ();
		$this->cc = array ();
		$this->ccn = array ();
		$this->tempalte = new Template ();
	}
	/**
	 *
	 * Mauro Cerone
	 * 
	 * @return string
	 */
	public function getStringA() {
		return implode ( ";", array_map ( array (
				$this,
				'addressFromContact' 
		), $this->getA () ) );
	}
	/**
	 *
	 * Mauro Cerone
	 * 
	 * @return string
	 */
	public function getStringCc() {
		return implode ( ";", array_map ( array (
				$this,
				'addressFromContact' 
		), $this->getCc () ) );
	}
	
	/**
	 *
	 * Mauro Cerone
	 * 
	 * @param Contact $c        	
	 * @return string
	 */
	private function addressFromContact(Contact $c) {
		return $c->getAddress ();
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @param Contact $from        	
	 * @return \STeSI\MailDispatcher\Email
	 */
	public 

	function setFrom(Contact $from) {
		$this->from = $from;
		return $this;
	}
	/**
	 * Mauro Cerone
	 *
	 * @return \STeSI\MailDispatcher\Contact
	 */
	public function getFrom() {
		return $this->from;
	}
	/**
	 * Mauro Cerone
	 *
	 * @return \STeSI\MailDispatcher\Contact[]
	 */
	public function getA() {
		return $this->a;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @param Contact $a        	
	 * @return \STeSI\MailDispatcher\Email
	 */
	public function addA(Contact $a) {
		array_push ( $this->a, $a );
		return $this;
	}
	/**
	 * Mauro Cerone
	 *
	 * @return \STeSI\MailDispatcher\Contact[]
	 */
	public function getCc() {
		return $this->cc;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @param Contact $cc        	
	 * @return \STeSI\MailDispatcher\Email
	 */
	public function addCc(Contact $cc) {
		array_push ( $this->cc, $cc );
		return $this;
	}
	
	/**
	 *
	 * Mauro Cerone
	 *
	 * @return string
	 */
	public function getSubject() {
		return $this->subject;
	}
	/**
	 *
	 * Mauro Cerone
	 *
	 * @param string $subject        	
	 * @return \STeSI\MailDispatcher\Email
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
		return $this;
	}
	/**
	 *
	 * Mauro Cerone
	 * 
	 * @return \STeSI\MailDispatcher\Template
	 */
	public function getTemplate() {
		return $this->template;
	}
	/**
	 *
	 * Mauro Cerone
	 * 
	 * @param Template $template        	
	 * @return \STeSI\MailDispatcher\Email
	 */
	public function setTemplate(Template $template) {
		$this->template = $template;
		return $this;
	}
}
<?php

namespace STeSI\MailDispatcher;

class Contact {
	private $address;
	public function __construct($address=null){
		$this->address=$address;
	}
	/**
	 * 
	 *	Mauro Cerone
	 * @return string
	 */
    public function getAddress(){
        return $this->address;
    }
    /**
     * 
     *	Mauro Cerone
     * @param string $address
     * @return \STeSI\MailDispatcher\Contact
     */
    public function setAddress($address){
        $this->address = $address;
        return $this;
    }
    
    public function __toString(){
    	return $this->address;
    }
}
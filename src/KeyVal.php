<?php

namespace STeSI\MailDispatcher;

class KeyVal {
	private $key;
	private $val;

    public function getKey(){
        return $this->key;
    }

    public function setKey($key){
        $this->key = $key;
        return $this;
    }

    public function getVal(){
        return $this->val;
    }

    public function setVal($val){
        $this->val = $val;
        return $this;
    }

}
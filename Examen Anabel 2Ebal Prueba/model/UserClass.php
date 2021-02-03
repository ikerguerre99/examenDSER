<?php

class UserClass{
  
    protected $username;
    protected $password;
    protected $tel;
    protected $keyWord;
   
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getTel() {
        return $this->tel;
    }

    function getKeyWord() {
        return $this->keyWord;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setKeyWord($keyWord) {
        $this->keyWord = $keyWord;
    }





}

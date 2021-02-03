<?php

class HiresClass{
  
    protected $idHire;
    protected $username;
    protected $idArticle ;
    protected $startingDate;
    protected $returnDate;
  
   
    function getIdHire() {
        return $this->idHire;
    }

    function getUsername() {
        return $this->username;
    }

    function getIdArticle() {
        return $this->idArticle;
    }

    function getStartingDate() {
        return $this->startingDate;
    }

    function getReturnDate() {
        return $this->returnDate;
    }

    function setIdHire($idHire) {
        $this->idHire = $idHire;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setIdArticle($idArticle) {
        $this->idArticle = $idArticle;
    }

    function setStartingDate($startingDate) {
        $this->startingDate = $startingDate;
    }

    function setReturnDate($returnDate) {
        $this->returnDate = $returnDate;
    }
    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    } 
    

   


}

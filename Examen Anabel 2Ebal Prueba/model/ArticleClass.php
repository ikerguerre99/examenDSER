<?php

class ArticleClass{
  
    protected $idArticle;
    protected $article ;
    protected $description;
    protected $idCategory;
   
    function getIdArticle() {
        return $this->idArticle;
    }

    function getArticle() {
        return $this->article;
    }

    function getDescription() {
        return $this->description;
    }

    function getIdCategory() {
        return $this->idCategory;
    }

    function setIdArticle($idArticle) {
        $this->idArticle = $idArticle;
    }

    function setArticle($article) {
        $this->article = $article;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }
    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    } 

   


}

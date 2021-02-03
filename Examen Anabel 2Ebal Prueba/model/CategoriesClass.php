<?php

class CategoriesClass{
  
    protected $idCategory;
    protected $categoryName;
      
    function getIdCategory() {
        return $this->idCategory;
    }

    function getCategoryName() {
        return $this->categoryName;
    }

    function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
    }
}

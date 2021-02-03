<?php
include_once 'connect_data.php';
include_once 'HiresModel.php';
include_once 'ArticleClass.php';

class ArticleModel extends ArticleClass{
   
   private $link;   
   private $listHires=array();
   
    
public function OpenConnect()
{
    $konDat=new connect_data();
     try
    {
        $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
    }
    catch(Exception $e)
    {
         echo $e->getMessage();
     }
    $this->link->set_charset("utf8"); 
}                   
public function CloseConnect()
{
     try
     { 
       $this->link->close();
     }
     catch(Exception $e)
    {
     echo $e->getMessage();
    }  
} 

public function setList(){
    
    $this->OpenConnect();
    
    $article=$this->article;
    $sql="call spAllCategoies";
    $result= $this->link->query($sql);
    
    $list=array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $nuevo= new ArticleModel();

        $nuevo->idArticle=$row['idArticle'];
        $nuevo->article=$row['article'];
        $nuevo->description=$row['description'];
        $nuevo->idCategory=$row['category'];

        array_push($list, get_Object_Vars($nuevo));
        
    }
    mysqli_free_result($result);
    $this->CloseConnect();
    
    return $list;
}

function ObjVars()
{
    return get_object_vars($this);
}
}

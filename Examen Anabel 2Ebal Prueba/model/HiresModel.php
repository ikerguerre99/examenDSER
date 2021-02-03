<?php
include_once 'connect_data.php';
include_once 'HiresClass.php';
include_once 'ArticleModel.php';
include_once 'UserModel.php';

class HiresModel extends HiresClass {

 	private $link;
 	private $objArticle;

public function OpenConnect(){
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

public function CloseConnect(){
     try
     { 
       $this->link->close();
     }
     catch(Exception $e)
    {
     echo $e->getMessage();
    }  
}

// function getAllHiresUser() {
    
//     $this->OpenConnect();
//     $username= $this->getUsername();
//     $sql = "call spAllHiresByUsername('$username')";
//     $result = $this->link->query($sql);
//     $list=array();
    
//     while ($row = $result->fetch_array(MYSQLI_ASSOC)){
//         $new = new HiresModel();
//         $new->idHire=$row['idHire'];
//         $new->startingDate=$row['startingDate'];
//         $new->returnDate=$row['returnDate'];
        
//         $objArticle=new ArticleModel();
//         $objArticle->setIdArticle($row['idArticle']);
//         $objArticle->setArticle($row['article']);
//         $objArticle->setDescription($row['description']);
        
        
//         $new->objArticle=$objArticle->ObjVars();
        
//         array_push($list, get_object_vars($new));
//     }
//     mysqli_free_result($result);
//     $this->CloseConnect();
//     return $list;
    
// }

function ObjVars(){
    return get_object_vars($this);
}
}
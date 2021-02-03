<?php
include_once 'connect_data.php';
include_once 'CategoriesClass.php';

class CategoriesModel extends CategoriesClass{
   
   private $link;
  
   
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
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
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
        

        $sql="call spAllCategories()";
        $result= $this->link->query($sql);
        
        $list=array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $nuevo= new CategoriesModel();
            
            $nuevo->idCategory=$row['idCategory'];
            $nuevo->categoryName=$row['categoryName'];
            
            array_push($list, get_object_vars($nuevo));
            
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

<?php
include_once 'connect_data.php';
include_once 'UserClass.php';
include_once 'HiresModel.php';

class UserModel extends UserClass{
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
   
    public function findUserByUsername($num1, $letras){
        
        $this->OpenConnect();
        
        $username=$this->getUsername();
        
        $returnValue = "no error";
        $sql = "call spFindUserByUsername('$username')";
        
        $result = $this->link->query($sql);
        
        $error='no error';
        
        if ($row = $result->fetch_array(MYSQLI_ASSOC)){
            
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->tel = $row['tel'];
            $this->keyword = $row['keyWord'];

            $pos = strpos($row['keyWord'], $letras);

            if ( ($pos != $letras)){
                $error='no error';
            } else {
                $error='letters error';
            }
            
        } else {
            
            $error='User or password error';
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return $error;
    }
    

    function ObjVars()
    {
        return get_object_vars($this);
    }
}

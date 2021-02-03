<?php

include_once '../model/UserModel.php';

$data=json_decode(file_get_contents("php://input"),true);

$username = $data['username'];
$password = $data['password'];
$num1=$data['num1'];
$letras=$data['letras'];


$response = array();

$user = new UserModel();
$user->setUsername($username);

$error=$user->findUserByUsername($num1, $letras);

if ($error !="no error" ) {
    
    $response["message"] = $error;
    
} else {
    
    $response["message"] = $error;
    
    if (!isset($_SESSION))
    {
        session_start();
    }
    $_SESSION['username']=$user->getUsername();
    $_SESSION['password']=$user->getPassword();
    $response["message"] = "no error";
    
}
echo json_encode($response);

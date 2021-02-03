<?php
session_start();

$response=array();
$response["message"]="no logged";

if (  isset($_SESSION['username']) && isset($_SESSION['password'])){
    
    $response["message"]="Logged";
    $response["username"]=$_SESSION['username'];
    $response["password"]=$_SESSION['password'];
    
}

echo json_encode($response);

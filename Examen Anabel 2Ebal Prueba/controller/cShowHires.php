<?php

include_once '../model/HiresModel.php';

$data=json_decode(file_get_contents("php://input"),true);

$hire=new HiresModel();

$usuario=$data['usuario'];

$hire->setUsername($usuario);

$response=array();

$response['list']=$hire->getAllHiresUser();
$response['error']='no error';

echo json_encode($response);

unset($response);


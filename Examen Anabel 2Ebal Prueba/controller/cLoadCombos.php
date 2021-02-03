<?php
include_once '../model/CategoriesModel.php';

$response = array();

$categories = new CategoriesModel;

$response['list']= $categories->setList();
$response['error']='no error';

echo json_encode($response);
unset($response);


<?php 

session_start();

include '../helpers/generatorHelper.php';
include '../helpers/redirectHelper.php';

$generated_id=generatorhelper::generatorId();

$_SESSION['items']['todo'][$generated_id]=[
"title"=>$_POST["title"],
"description"=>$_POST["description"],
"created_at"=>generatorhelper::generateCurrentDate()
];

$_SESSION['message']='The "'. $_POST['title'] . '" successfully created item';

redirectHelper::redirectToPreviousPage();

    
?>
<?php

session_start();
include '../helpers/GeneratorHelper.php';
include '../helpers/RedirectHelper.php';
include '../constants/ItemTypes.php';
$id = $_POST['item_id'];

$deleted_from=$_POST['delete_from'];

// actual add

if($deleted_from==ItemTypes::COMPLETED){
    $item= $_SESSION['items']['completed'][$id];
    $completed_at=$item['completed_at'];
    unset($_SESSION['items']['completed'][$id]);
}
else{
    $item= $_SESSION['items']['todo'][$id];
    $completed_at=null;
    unset($_SESSION['items']['todo'][$id]);  
}

$_SESSION['items']['deleted'][$id] =  $item;
$_SESSION['items']['deleted'][$id]['deleted_at'] =  GeneratorHelper::generateCurrentDate();
$_SESSION['items']['deleted'][$id]['deleted_from'] =  $deleted_from;

$_SESSION['message'] = "the '" . $item['title'] . "' is deleted now.";
RedirectHelper::redirectToPreviousPage();

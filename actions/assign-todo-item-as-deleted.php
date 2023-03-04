<?php 

session_start();

include '../helpers/generatorHelper.php';
include '../helpers/redirectHelper.php';
include '../constants/itemTypes.php';

$id= $_POST['item_id'];
$deleted_from = $_POST['delete_from'];

if($deleted_from == ItemTypes::COMPLETED){

    $item = $_SESSION['items']['completed'][$id];
    unset($_SESSION['items']['completed'][$id]);
}else{
    $item= $_SESSION['items']['todo'][$id];
    $completed_at = null;
    unset($_SESSION['items']['todo'][$id]);
}

$_SESSION['items']['deleted'][$id] =  $item;
$_SESSION['items']['deleted'][$id]['deleted_at'] =  generatorhelper::generateCurrentDate();
$_SESSION['items']['deleted'][$id]['deleted_from'] =  $deleted_from;

$_SESSION['message']='The "'. $item['title'] . '" successfully deleted item';
RedirectHelper::redirectToPreviousPage();
?>
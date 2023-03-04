<?php

session_start();


include '../helper/GenertorHelper.php';
include '../helper/RedirectHelper.php';
include '../constants/ItemTypes.php';


$id = $_POST['item_id'];
$deletedFrom = $_POST['delete_from'];

if($deletedFrom == ItemTypes::COMPLETED){

    $item = $_SESSION['items']['completed'][$id];
    unset($_SESSION['items']['completed'][$id]);

}else{

    $item = $_SESSION['items']['todo'][$id];
    $completed_at = null;
    unset($_SESSION['items']['todo'][$id]);

}


$_SESSION['items']['deleted'][$id] =  $item;
$_SESSION['items']['deleted'][$id]['deleted_at'] =  GeneratorHelper::generateCurrentDate();
$_SESSION['items']['deleted'][$id]['deleted_from'] =  $deletedFrom;

$_SESSION['message'] = "The `" . $item['title'] . "` is Deleted now.";

RedirectHelper::redirectToPreviousPage();
?>

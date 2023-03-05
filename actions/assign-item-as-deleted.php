<?php
include "../Helpers/GeneratorHelper.php";
include "../Helpers/RedirectHelper.php";
include "../constants/itemTypes.php";


session_start();

$id = $_POST['item_id'];
$deleted_from=$_POST['delete_from'];


if($deleted_from===itemTypes::COMPLETED){

    $item=$_SESSION['items']['completed'][$id];
    unset( $_SESSION['items']['completed'][$id] );

}else {

    $item = $_SESSION['items']['todo'][$id];
    $item['completed_at'] = null;
    unset($_SESSION['items']['todo'][$id]);
}


$_SESSION['items']['deleted'][$id]=$item;
$_SESSION['items']['deleted'][$id]['deleted_at'] =  GeneratorHelper::generateCurrentDate();
$_SESSION['items']['deleted'][$id]['deleted_from'] =  $deleted_from;

$_SESSION["message"] = "The '{$item["title"]}' is deleted now";
RedirectHelper::RedirectToPreviousPage();
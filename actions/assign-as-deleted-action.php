<?php
include "../helper/GeneraterHelper.php";
include "../helper/RedirectHelper.php";
include "../const/ItemTypes.php";
session_start();
$id = $_POST['item_id'];
$delete_from=$_POST["delete_from"];
if($delete_from ==ItemTypes::COMPLETED){
    $item=$_SESSION['items']["completed"][$id];
    unset($_SESSION['items']["completed"][$id]);
}
else{
    $item=$_SESSION['items']["todo"][$id];
    $item['completed_at']=null;
    unset($_SESSION['items']["todo"][$id]);
}
$_SESSION['items']["deleted"][$id] = $item;
$_SESSION['items']["deleted"][$id]['deleted_at'] = GeneraterHelper::generateCurrentDate();
$_SESSION['items']["deleted"][$id]['deleted_from']=$delete_from;
$_SESSION['message']="item '".  $item['title']."' is deleted";

RedirectHelper::redirectToPreviousPage();

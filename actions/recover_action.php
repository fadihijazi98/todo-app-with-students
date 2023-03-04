<?php
session_start();
include "../Constents/Item.php";
$id=$_POST['item_id'];
$recover_to=$_POST['recover_to'];
$deleted_from=$_SESSION['items']['deleted'][$id]['deleted_from'];

$item=$_SESSION['items']['deleted'][$id];
unset($_SESSION['items']['deleted'][$id]);

$target_key=Item::COMPLETED;
if($recover_to==Item::TODO){
    $target_key=Item::TODO;
    $item['completed_at']=null;
}

$_SESSION['items'][$target_key][$id]=$item;

$_SESSION['message']="The '".$item['title']."' item successfuly recover";
include "../helpers/RedirectHelper.php";
RedirectHelper::redirectToPreviousPage();
?>

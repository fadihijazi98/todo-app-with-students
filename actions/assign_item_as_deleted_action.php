<?php
include "../Constents/Item.php";
include "../helpers/GeneratorHelper.php";
session_start();
$id=$_POST['item_id'];
$deleted_from=$_POST['delete_from'];

if($deleted_from==Item::TODO){
    $from=Item::TODO;
    $item['completed_at']=null;
    $item=$_SESSION['items']['todo'][$id];
    unset($_SESSION['items']['todo'][$id]);


}
else{

    $item=$_SESSION['items']['completed'][$id];
    unset($_SESSION['items']['completed'][$id]);

}

$_SESSION['items']['deleted'][$id]=$item;
$_SESSION['items']['deleted'][$id]['deleted_at']=GeneratorH::generate_date();
$_SESSION['items']['deleted'][$id]['deleted_from']=$deleted_from;

$_SESSION['message']="The '".$item['title']."' item successfuly deleted";

include "../helpers/RedirectHelper.php";
RedirectHelper::redirectToPreviousPage();
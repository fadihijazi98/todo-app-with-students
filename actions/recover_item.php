<?php
include "../Helpers/RedirectHelper.php";
include "../constants/itemTypes.php";

session_start();

$id =$_POST['item_id'];
$recover_to=$_POST['recover_to'];

$item=$_SESSION['items']['deleted'][$id];

$_SESSION["message"] = "The '{$item["title"]}' is recovered ";

unset( $item['deleted_at'] );
unset( $item['deleted_from'] );
$targetKey='completed';

unset( $_SESSION['items']['deleted'][$id] );

if($recover_to ==itemTypes::TODO) {
    $targetKey ="todo";
    unset($item['completed_at']);
}

    $_SESSION['items'][$targetKey][$id]=$item;
    RedirectHelper::RedirectToPreviousPage();


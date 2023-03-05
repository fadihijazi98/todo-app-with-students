<?php

session_start();

include '../helper/RedirectHelper.php';
include '../const/ItemTypes.php';

$id = $_POST['item_id'];
$recover_to = $_POST['recover_to'];

$item = $_SESSION['items']['deleted'][$id];

unset($_SESSION['items']['deleted'][$id]);
unset($item['deleted_from']);
unset($item['deleted_at']);

$target_Key = "completed";

if ($recover_to == ItemTypes::TODO) {
    unset($item['completed_at']);
    $target_Key = "todo";
}
$_SESSION['items'][$target_Key][$id]=$item ;
$_SESSION['message'] = "the '" . $item['title'] . "' is recovered now and become ".$recover_to ;

RedirectHelper::redirectToPreviousPage();


<?php

session_start();
include '../helpers/redirectHelper.php';

$id=$_POST ['item_id'];
$recover_to= $_POST['recover_to'];

$item = $_SESSION['items']['deleted'][$id];

unset($_SESSION['items']['deleted'][$id]);
unset($item['deleted_from']);
unset($item['deleted_at']);

$targetKey = "completed";

if ($recover_to == "todo_item") {

    unset($item['completed_at']);
    $targetKey = "todo";
}


$_SESSION['items'][$targetKey][$id] = $item;

$_SESSION['message'] = "the '" . $item['title'] . "' is recovered now.";
 
RedirectHelper::redirectToPreviousPage();


?>
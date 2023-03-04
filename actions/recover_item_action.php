<?php

session_start();

include '../helper/RedirectHelper.php';
include '../constants/ItemTypes.php';

$id = $_POST['item_id'];
$recover_to = $_POST['recover_to'];

$deletItems = $_SESSION['items']['deleted'][$id];
unset($_SESSION['items']['deleted'][$id]);

unset($deletItems['deleted_from']);
unset($deletItems['deleted_at']);


$targetKey = "completed";

if ($recover_to == ItemTypes::TODO) {

    unset($deletItems['completed_at']);
    $targetKey = "todo";
}


$_SESSION['items'][$targetKey][$id] = $deletItems;

$_SESSION['message'] = "The `" . $deletItems['title'] . "` is Recovered Now.";
    
RedirectHelper::redirectToPreviousPage(); 

?>

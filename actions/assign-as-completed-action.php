<?php
include "../helper/RedirectHelper.php";
include "../helper/GeneraterHelper.php";
session_start();
$id = $_POST['item_id'];
$todoitem = $_SESSION['items']['todo'][$id];
$_SESSION['items']['completed'][$id] = [
    'title' => $todoitem['title'],
    'description' => $todoitem['description'],
    'created_at' => $todoitem['created_at'],
    'completed_at' => GeneraterHelper::generateCurrentDate()
];
unset($_SESSION['items']['todo'][$id]);
$_SESSION['message']="item '".  $todoitem['title']."' is sucessfully completed";

RedirectHelper::redirectToPreviousPage();
?>


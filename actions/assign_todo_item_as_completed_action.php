<?php

session_start();

include '../helper/GenertorHelper.php';
include '../helper/RedirectHelper.php';

$id = $_POST['item_id'];

$todoItem = $_SESSION['items']['todo'][$id];

$_SESSION['items']['completed'][$id] = $todoItem;
$_SESSION['items']['completed'][$id]['completed_at'] = GeneratorHelper::generateCurrentDate();


unset($_SESSION['items']['todo'][$id]);

$_SESSION['message'] = "The `" . $todoItem['title'] . "` assigned as Completed.";

RedirectHelper::redirectToPreviousPage();

?>

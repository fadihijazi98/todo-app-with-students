<?php

session_start();

include '../helpers/GeneratorHelper.php';
include '../helpers/RedirectHelper.php';

$id = $_POST['item_id'];

$item = $_SESSION['items']['todo'][$id];

// actual add
$_SESSION['items']['completed'][$id] = $item;
$_SESSION['items']['completed'][$id]['completed_at'] = GeneratorHelper::generateCurrentDate();

unset($_SESSION['items']['todo'][$id]);
$_SESSION['message'] = "the '" . $item['title'] . "' assigned as completed.";
RedirectHelper::redirectToPreviousPage();

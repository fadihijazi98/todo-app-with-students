<?php
include "../Helpers/RedirectHelper.php";
include "../Helpers/GeneratorHelper.php";

session_start();

$id = $_POST['item_id'];

$item=$_SESSION['items']['todo'][$id];

$_SESSION['items']['completed'][$id]= $item;

$_SESSION['items']['completed'][$id]['completed_at'] = GeneratorHelper::generateCurrentDate();

unset( $_SESSION['items']['todo'][$id] );
$_SESSION["message"] = "The '{$item["title"]}' assigned as completed ";
RedirectHelper::RedirectToPreviousPage();
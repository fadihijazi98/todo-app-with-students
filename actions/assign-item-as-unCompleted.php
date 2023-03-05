<?php
include '../Helpers/RedirectHelper.php';

session_start();

$id = $_POST['item_id'];

$item=$_SESSION['items']['completed'][$id];

$_SESSION['items']['todo'][$id]=$item;


unset( $_SESSION['items']['completed'][$id] );
$_SESSION["message"] = "The '{$item["title"]}' is uncompleted now";

RedirectHelper::RedirectToPreviousPage();
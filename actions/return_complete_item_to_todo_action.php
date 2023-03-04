<?php

session_start();
include "../Constents/Item.php";

$id=$_POST['item_id'];

$todoItem=$_SESSION['items']['completed'][$id];
unset($todoItem['completed_at']);
$_SESSION['items']['todo'][$id]=$todoItem;

unset($_SESSION['items']['completed'][$id]);
$_SESSION['message']="The '".$todoItem['title']."' item uncompleted";

include "../helpers/RedirectHelper.php";
RedirectHelper::redirectToPreviousPage();
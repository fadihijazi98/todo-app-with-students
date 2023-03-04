<?php
include "../Constents/Item.php";
include "../helpers/GeneratorHelper.php";
session_start();
$id=$_POST['item_id'];

$todoItem=$_SESSION['items']['todo'][$id];

$_SESSION['items']['completed'][$id]=
[
    "title"=>$todoItem['title'],
    "description"=>$todoItem['description'],
    "created_at"=>$todoItem['created_at'],
    "completed_at"=>GeneratorH::generate_date()
];
unset($_SESSION['items']['todo'][$id]);
$_SESSION['message']="The '".$todoItem['title']."' item successfuly completed";

include "../helpers/RedirectHelper.php";
RedirectHelper::redirectToPreviousPage();
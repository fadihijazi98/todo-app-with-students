<?php
include "../helper/RedirectHelper.php";
include "../helper/GeneraterHelper.php";
session_start();
$generateId=GeneraterHelper::generateId();
$_SESSION['items']['todo'][$generateId]=[
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'created_at' => GeneraterHelper::generateCurrentDate()
];
$_SESSION['message']="item '". $_POST['title']."' is sucessfully created";
RedirectHelper::redirectToPreviousPage();


<?php

session_start();
$id=$_POST['item_id'];

$todoItem=$_SESSION['items']['completed'][$id];

$_SESSION['items']['todo'][$id]=
[
    "title"=>$todoItem['title'],
    "description"=>$todoItem['description'],
    "created_at"=>$todoItem['created_at']
];
unset($_SESSION['items']['completed'][$id]);

header("Location: completed.php");
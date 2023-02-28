<?php

session_start();

$id = $_POST['item_id'];

$todoItem=$_SESSION['items']['todo'][$id];

$_SESSION['items']['completed'][$id]=[
    'title'=>$todoItem['title'],
    'description' => $todoItem['description'],
    'created_at'=> $todoItem['created_at'],
    'completed_at' => date("y-m-d h:m:s")
];
unset( $_SESSION['items']['todo'][$id] );
$_SESSION["message"] = "The '{$todoItem["title"]}' assigned as completed ";
header("Location:completed.php");
?>
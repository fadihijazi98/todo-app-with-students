<?php

session_start();

$id = $_POST['item_id'];

$completedItem=$_SESSION['items']['completed'][$id];

$_SESSION['items']['todo'][$id]=[
    'title'=>$completedItem['title'],
    'description' => $completedItem['description'],
    'created_at'=>$completedItem['created_at']
];

unset( $_SESSION['items']['completed'][$id] );
$_SESSION["message"] = "The '{$completedItem["title"]}' is uncompleted now";
header("Location:todo.php");
?>
<?php
session_start();
$id=$_POST['item_id'];
$completedItem=$_SESSION['items']['completed'][$id];
unset($_SESSION['items']['completed'][$id]);
$_SESSION['items']['todo'][$id]=[
    'title'=>$completedItem['title'],
    'description'=>$completedItem['description'],
    'created_at'=>$completedItem['created_at']
];
$_SESSION['message']="item '".  $completedItem['title']."' is not completed any more";
header("Location:todo.php");
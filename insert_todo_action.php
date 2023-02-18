<?php
session_start();
$_SESSION['items'][]=[
    'title'=>$_POST['title'],
    'description'=>$_POST['description'],
    'created_at'=>date("Y-m-d H:i:s")
];
header("LOCATION: todo.php");
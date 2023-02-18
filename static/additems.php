<?php
session_start();

$_SESSION['items'][]=
[
    "title"=>$_POST['title'],
    "description"=>$_POST['description'],
    "status"=>"todo",
    "created_at"=>date("Y-M-d h:i:s")
];
header("Location:todo.php");
?>
<?php
session_start();

$_SESSION["items"][]=[
    "title"=>$_POST["title"],
    "description"=>$_POST["description"],
    "status"=>"to-do",
    "created_at"=>date("y-m-d h-i-s")
];

header("Location:todo.php");
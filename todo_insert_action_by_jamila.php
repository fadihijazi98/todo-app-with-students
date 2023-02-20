<?php

session_start();

$_SESSION["items"][] = [
    "title"=>$_POST["title"],
    "description"=>$_POST["description"],
    "status"=>"to do",
    "created_at"=>date("Y-m-d H:i:s")
];

header("Location:todo_by_jamila.php");



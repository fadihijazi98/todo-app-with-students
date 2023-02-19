<?php

session_start();

$_SESSION["items"][] = [
    "title"=>$_POST["title"],
    "description"=>$_POST["description"],
    "status"=>"to do",
    "created_at"=>date("Y-m-d H:i:s")
];

header("Location:to_do_jamila's_task.php");



<?php

session_start();

$id = $_POST["item_id"];

$todoItem = $_SESSION["items"]["todo"][$id];

$_SESSION["items"]["completed"][$id]=[
    "title"=>$todoItem["title"],
    "description"=>$todoItem["description"],
    "created_at"=>$todoItem["created_at"],
    "completed_at"=>date("Y-m-d H:i:s")
];

$_SESSION["message"] = "The '{$todoItem["title"]}' is completed now :)";

unset($_SESSION["items"]["todo"][$id]);

header("Location:completed.php");












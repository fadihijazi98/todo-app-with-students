<?php

session_start();

$id = $_POST["item_id"];
$recover_to = $_POST["recover_to"];
$item = $_SESSION["items"]["deleted"][$id];
$_SESSION["message"] = "The '{$item["title"]}' is recovered now :)";


unset($_SESSION["items"]["deleted"][$id]);

if($recover_to == "todo_item")
{
    $_SESSION["items"]["todo"][$id]=[
        "title"=>$item["title"],
        "description"=>$item["description"],
        "created_at"=>$item["created_at"]
    ];
    header("Location:todo.php");
}
else
{
    $_SESSION["items"]["completed"][$id]=[
        "title"=>$item["title"],
        "description"=>$item["description"],
        "created_at"=>$item["created_at"],
        "completed_at"=>$item["completed_at"]
    ];
    header("Location:completed.php");
}

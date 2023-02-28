<?php

session_start();
$id=$_POST["item_id"];
$deleted_from=$_POST["delete_from"];

if ($deleted_from=="todo")
{
    $todo_item=$_SESSION["items"]["todo"][$id];
    $_SESSION["items"]["deleted"][$id] = [
        "title"=>$todo_item["title"],
        "description"=>$todo_item["description"],
        "created_at"=>$todo_item["create_at"],
        "deleted_at"=>date("Y-m-d H:i:s"),
        "deleted_from"=>$deleted_from
];
    unset($_SESSION["items"]["todo"]["$id"]);
    header("Location:todo.php");

}else
{
    $completed_item=$_SESSION["items"]["completed"][$id];
    $_SESSION["items"]["deleted"][$id] = [
        "title"=>$completed_item["title"],
        "description"=>$completed_item["description"],
        "created_at"=>$completed_item["created_at"],
        "completed_at"=>$completed_item["completed_at"],
        "deleted_at"=>date("Y-m-d H:i:s"),
        "deleted_from"=>$deleted_from

    ];

    unset($_SESSION["items"]["completed"]["$id"]);
    header("Location:completed.php");



}

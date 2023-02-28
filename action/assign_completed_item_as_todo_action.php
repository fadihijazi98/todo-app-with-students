<?php
session_start();
$id=$_POST["item_id"];
$item=$_SESSION["items"]["completed"][$id];
unset($_SESSION["items"]["completed"][$id]);


$_SESSION["items"]["todo"][$id]=[
    "title"=>$item["title"],
    "description"=>$item["description"],
    "created_at"=>$item["created_at"]
];

header("Location:../views/completed.php");
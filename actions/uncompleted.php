<?php

session_start();
include '../helpers/redirectHelper.php';

$id=$_POST['item_id'];

    $completeditem=$_SESSION['items']['completed'][$id];
    unset($_SESSION['items']['completed'][$id]);

    $_SESSION['items']['todo'][$id]=[
        "title"=>$completeditem["title"],
        "description"=>$completeditem["description"],
        "created_at"=> $completeditem["created_at"]
    ];

    $_SESSION['message']='The "'. $completeditem["title"] . '" successfully uncompleted item to todo';

    RedirectHelper::redirectToPreviousPage();

?>
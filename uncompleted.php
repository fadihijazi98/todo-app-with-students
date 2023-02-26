<?php

session_start();

$id=$_POST['item_id'];

    $completeditem=$_SESSION['items']['completed'][$id];
    unset($_SESSION['items']['completed'][$id]);

    $_SESSION['items']['todo'][$id]=[
        "title"=>$completeditem["title"],
        "description"=>$completeditem["description"],
        "created_at"=>date("Y-m-d H:i:s")
    ];

    $_SESSION['message']='The "'. $completeditem["title"] . '" successfully uncompleted item to todo';
    header('Location: todo.php');

?>
<?php

session_start();

$id = $_POST['item_id'];

$item_c = $_SESSION['items']['completed'][$id];
unset($_SESSION['items']['completed'][$id]);

$_SESSION['items']['todo'][$id] = [
    'title' => $item_c['title'],
    'description' => $item_c['description'],
    'created_at' => $item_c['created_at']
];

$_SESSION['message'] = "The `" .$item_c['title'] . "` isn't Completed any more.";

header("Location:../views/todo.php"); 

?>
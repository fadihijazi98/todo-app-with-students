<?php

session_start();

$id = $_POST['item_id'];

$completedItem = $_SESSION['items']['completed'][$id];
unset($_SESSION['items']['completed'][$id]);

$_SESSION['items']['todo'][$id] = [
    'title' => $completedItem['title'],
    'description' => $completedItem['description'],
    'created_at' => $completedItem['created_at']
];

$_SESSION['message'] = "the '" .$completedItem['title'] . "' isn't completed any more.";
header('Location:../views/todo.php');

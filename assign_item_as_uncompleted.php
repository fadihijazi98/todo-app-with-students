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

$_SESSION['message'] = "The '" .$completedItem['title'] . "' is not COMPLETED any more.";
header('Location:todo.php');

?>
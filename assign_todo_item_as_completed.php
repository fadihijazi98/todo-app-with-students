<?php

session_start();

$id = $_POST['item_id'];

$todoItem = $_SESSION['items']['todo'][$id];

// actual add
$_SESSION['items']['completed'][$id] = [
    'title' => $todoItem['title'],
    'description' => $todoItem['description'],
    'created_at' => $todoItem['created_at'],
    'completed_at' => date("Y-m-d H:i:s")
];

unset($_SESSION['items']['todo'][$id]);

$_SESSION['message'] = "the '" . $todoItem['title'] . "' assigned as completed.";
header("Location:completed.php");
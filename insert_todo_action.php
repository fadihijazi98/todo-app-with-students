<?php

session_start();

$generated_id = generateId(); // unique & auto increment

$_SESSION['items']['todo'][$generated_id] = [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    "created_at" => date("Y-m-d H:i:s")
];


header("Location:todo.php");


function generateId()
{
    if (! key_exists('items', $_SESSION)) {
        return 1;
    }
    $items = $_SESSION['items'];

    $todoItems = [];
    $completedItems = [];
    $deletedItems = [];

    if ( key_exists('todo', $items)) {
        $todoItems = array_keys($items['todo']);

    }
    if ( key_exists('completed', $items)) {
        $completedItems = array_keys($items['completed']);
    }
    if ( key_exists('deleted', $items)) {
        $deletedItems = array_keys($items['deleted']);

    }
    $maxIdOfTodos = max($todoItems);
    $maxIdOfCompletes = max($completedItems);
    $maxIdOfDeletes = max($deletedItems);

    return max($maxIdOfTodos, $maxIdOfCompletes, $maxIdOfDeletes) + 1;
}

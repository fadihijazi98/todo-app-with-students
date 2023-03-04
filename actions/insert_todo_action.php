<?php

session_start();

$generated_id = generateId();// unique & auto increment

$_SESSION['items']['todo'][$generated_id]=[
    'title'=>$_POST['title'],
    'description'=>$_POST['description'],
    'created_at'=>date('Y-m-d H:i:s')
];
$_SESSION['message'] = "the '" . $_POST['title'] . "' item successfully created.";

header('Location:../views/todo.php');

function generateId()
{
    if (! key_exists('items', $_SESSION)) {
        return 1;
    }
    $items = $_SESSION['items'];

    $todoItems = [0];
    $completedItems = [0];
    $deletedItems = [0];

    if ( key_exists('todo', $items) && $items['todo']) {
        $todoItems = array_keys($items['todo']);

    }
    if ( key_exists('completed', $items) && $items['completed']) {
        $completedItems = array_keys($items['completed']);
    }
    if ( key_exists('deleted', $items) && $items['deleted']) {
        $deletedItems = array_keys($items['deleted']);

    }

    $maxIdOfTodos = max($todoItems);
    $maxIdOfCompletes = max($completedItems);
    $maxIdOfDeletes = max($deletedItems);

    return (int)(max($maxIdOfTodos, $maxIdOfCompletes, $maxIdOfDeletes)) + 1;
}
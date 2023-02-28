<?php

session_start();

$id = $_POST['item_id'];
$recover_to = $_POST['recover_to'];

$deletedItem = $_SESSION['items']['deleted'][$id];
unset($_SESSION['items']['deleted'][$id]);

if ($recover_to == 'completed_item') {

    $_SESSION['items']['completed'][$id] = [
        'title' => $deletedItem['title'],
        'description' => $deletedItem['description'],
        'created_at' => $deletedItem['created_at'],
        'completed_at' => $deletedItem['completed_at']
    ];

    $_SESSION['message'] = "The '" . $deletedItem['title'] . "' is recovered to COMPLETED items.";


    header("Location:completed.php");

} else {

    $_SESSION['items']['todo'][$id] = [
        'title' => $deletedItem['title'],
        'description' => $deletedItem['description'],
        'created_at' => $deletedItem['created_at'],
    ];

    $_SESSION['message'] = "The '" . $deletedItem['title'] . "' is recovered to TODO items.";

    
    header("Location:todo.php");
}
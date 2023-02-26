<?php

session_start();

$id = $_POST['item_id'];
$deletedFrom = $_POST['delete_from'];

if($deletedFrom == 'completed_items'){

    $item = $_SESSION['items']['completed'][$id];
    $completed_at = $item['completed_at'];
    unset($_SESSION['items']['completed'][$id]);

}else{

    $item = $_SESSION['items']['todo'][$id];
    $completed_at = null;
    unset($_SESSION['items']['todo'][$id]);

}


$_SESSION['items']['deleted'][$id] = [
    'title' => $item['title'],
    'description' => $item['description'],
    'created_at' => $item['created_at'],
    'deleted_at' => date("Y-m-d H:i:s"),
    'comleted_at' => $completed_at,
    'deleted_from' => $deletedFrom
];

$_SESSION['message'] = "The `" . $item['title'] . "` is Deleted now.";

header("Location:archived.php");

?>
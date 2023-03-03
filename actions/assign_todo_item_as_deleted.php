<?php

session_start();

$id = $_POST['item_id'];

$deleted_from=$_POST['delete_from'];

// actual add

if($deleted_from=='completed_items'){
    $item= $_SESSION['items']['completed'][$id];
    $completed_at=$item['completed_at'];
    unset($_SESSION['items']['completed'][$id]);
}
else{
    $item= $_SESSION['items']['todo'][$id];
    $completed_at=null;
    unset($_SESSION['items']['todo'][$id]);  
}

$_SESSION['items']['deleted'][$id] = [
    'title' => $item['title'],
    'description' => $item['description'],
    'completed_at' =>   $completed_at,
    'created_at' => $item['created_at'],
    'deleted_from'=> $deleted_from,
    'deleted_at' => date("Y-m-d H:i:s")
];

$_SESSION['message'] = "the '" . $item['title'] . "' is deleted now.";

header("Location:../views/deleted.php");
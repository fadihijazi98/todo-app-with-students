<?php
session_start();

$id=$_POST['item_id'];
$items=$_SESSION['items'];

 if( key_exists('completed', $items)) {
    $deletedItem= $_SESSION['items']['completed'][$id]; 
    unset($_SESSION['items']['completed'][$id]);


        $_SESSION['items']['deleted'][$id] = [
            'title' => $deletedItem['title'] ,
            'description' => $deletedItem['description'],
            'created_at' => $deletedItem['created_at'],
            'deleted_at' => date("Y-m-d H:i:s"),
            'completed_at' =>$deletedItem['completed_at'],
            'deleted_from' => 'completed'
        ];
$_SESSION['message'] = "the '" .$deletedItem['title'] . "' is deleted  any more.";

header('location:../views/deleted.php');

    }
   
     else {
        $deletedItem= $_SESSION['items']['todo'][$id]; 
        unset($_SESSION['items']['todo'][$id]);

        $_SESSION['items']['deleted'][$id] = [
            'title' => $deletedItem['title'],
            'description' => $deletedItem['description'],
            'created_at' => $deletedItem['created_at'],
            'deleted_at' => date("Y-m-d H:i:s"),
            'deleted_from' => 'todo'

        ];

        $_SESSION['message'] = "the '" .$deletedItem['title'] . "' is deleted  any more.";


        header('location:../views/deleted.php');



}


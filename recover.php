<?php

session_start();

$id = $_POST['item_id'];

$recover_to=$_POST['recover_to'];

$item= $_SESSION['items']['deleted'][$id];
unset($_SESSION['items']['deleted'][$id]);

// actual add

if($recover_to=='completed_items'){

    $_SESSION['items']['completed'][$id] = [
        'title' => $item['title'],
        'description' => $item['description'],
        'completed_at' =>   $completed_at,
        'created_at' => $item['created_at'],
        
    ];
    $_SESSION['message'] = "the '" . $Item['title'] . "' is recovered to completed now.";
    header("Location:completed.php");
    
}
else{
   

    $_SESSION['items']['todo'][$id] = [
        'title' => $item['title'],
        'description' => $item['description'],
        'created_at' => $item['created_at'],
       
    ];
    $_SESSION['message'] = "the '" . $Item['title'] . "' is recovered to todo now.";
    header("Location:todo.php");
    
}



header("Location:deleted.php");
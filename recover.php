<?php

session_start();

$id = $_POST['item_id'];

$recover_to=$_POST['recover_to'];

$Item= $_SESSION['items']['deleted'][$id];
unset($_SESSION['items']['deleted'][$id]);

// actual add

if($recover_to=='completed_items'){

    $_SESSION['items']['completed'][$id] = [
        'title' => $Item['title'],
        'description' => $Item['description'],
        'completed_at' =>   $completed_at,
        'created_at' => $Item['created_at'],
        
    ];
    $_SESSION['message'] = "the '" . $Item['title'] . "' is recovered to completed now.";
    header("Location:completed.php");
    
}
else{
   

    $_SESSION['items']['todo'][$id] = [
        'title' => $Item['title'],
        'description' => $Item['description'],
        'created_at' => $Item['created_at'],
       
    ];
    $_SESSION['message'] = "the '" . $Item['title'] . "' is recovered to todo now.";
    header("Location:todo.php");
    
}




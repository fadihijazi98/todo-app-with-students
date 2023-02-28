<?php

session_start();

$id = $_POST['item_id'];
$recover_to = $_POST['recover_to'];

$deletItems = $_SESSION['items']['deleted'][$id];
unset($_SESSION['items']['deleted'][$id]);

if($recover_to == 'todo_items'){

    $_SESSION['items']['todo'][$id] = [
        'title' =>$deletItems['title'] ,
        'description' => $deletItems['description'],
        'created_at' => $deletItems['created_at']
    ];
    
    $_SESSION['message'] = "The `" . $deletItems['title'] . "` is Recovered to todo Now.";
    header("Location:../views/todo.php"); 

}else {

    $_SESSION['items']['completed'][$id] = [
        'title' =>$deletItems['title'] ,
        'description' => $deletItems['description'],
        'created_at' => $deletItems['created_at'],
        'completed_at' => $deletItems['completed_at']
    ];

    $_SESSION['message'] = "The `" . $deletItems['title'] . "` is Recovered to Completed Now.";
    header("Location:../views/completed.php"); 

}

?>
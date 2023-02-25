<?php
session_start();
$id = generateNextId();
    $_SESSION['items']['todo'][$id]=[
        'title'=>$_POST['title'],
        'description'=>$_POST['description'],
        'created_at'=>date("y-m-d h:i:s")
    ];

header("Location:todo.php");

function generateNextId(){
    if(! key_exists('items', $_SESSION)){
        return 1;
    }
    $items=$_SESSION['items'];
    $todo_items=[0];
    $completed_items=[0];
    $deleted_items=[0];

    if(key_exists('todo',$items)){
        $todo_items=array_keys($items['todo']);
    }
    if(key_exists('completed',$items)){
        $completed_items=array_keys($items['completed']);
    }
    if(key_exists('deleted',$items)){
        $deleted_items=array_keys($items['deleted']);
    }
    $max=max(
        max($todo_items),
        max($completed_items),
        max($deleted_items)
    );
    return $max+1;
    
}
?>
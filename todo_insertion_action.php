<?php
session_start();
$id = generateNextId();
    $_SESSION['items']['todo'][$id]=[
        'title'=>$_POST['title'],
        'description'=>$_POST['description'],
        'created_at'=>date("y-m-d h:i:s")
    ];
    $_SESSION['message']="The '". $_POST['title']."' item created successfully";

header("Location:todo.php");

function generateNextId(){
    if(! key_exists('items', $_SESSION)){
        return 1;
    }
    $items=$_SESSION['items'];
    $todo_items=[];
    $completed_items=[];
    $deleted_items=[];

    if(key_exists('todo',$items)){
        $todo_items=array_keys($items['todo']);
    }
    if(key_exists('completed',$items)){
        $completed_items=array_keys($items['completed']);
    }
    if(key_exists('deleted',$items)){
        $deleted_items=array_keys($items['deleted']);
    }
   $max = 0;

    if (!empty($todo_items)) {
        $max = max($max, max($todo_items));
    }
    if (!empty($completed_items)) {
        $max = max($max, max($completed_items));
    }
    if (!empty($deleted_items)) {
        $max = max($max, max($deleted_items));
    }
    return $max+1;
    
}
?>
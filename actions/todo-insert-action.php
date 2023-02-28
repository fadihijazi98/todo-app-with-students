<?php

session_start();
$genareted_id=generateId();

$_SESSION['items']['todo'][$genareted_id] =[

    "title"=> $_POST['title'],
    "description" => $_POST['description'],
    "created_at"=>date("y-m-d h:m:s")
];
$_SESSION["message"] = "The '{$_SESSION["items"]["todo"][$genareted_id]["title"]}' is created successfully ";

header("Location:../views/todo.php");

function generateId()
{
    if(!key_exists('items',$_SESSION)){
        return 1;
    }
    $items=$_SESSION['items'];
/* or [0] to all array */

    $todoItems=[];
    $completedItems=[];
    $deletedItems=[];

    if(key_exists('todo',$items)){
        $todoItems=array_keys($items['todo']);
    }
    if(key_exists('completed',$items)){
        $completedItems=array_keys($items['completed']);
    }
    if(key_exists('deleted',$items)){
        $deletedItems=array_keys($items['deleted']);
    }
if(sizeof($todoItems)==0){
    $maxIdOfTodos=0;
}else {
    $maxIdOfTodos = max($todoItems);
}
    if(sizeof($completedItems)==0){
        $maxIdOfCompletes=0;
    }else {
        $maxIdOfCompletes = max($completedItems);
    }
    if(sizeof($deletedItems)==0){
        $maxIdOfDeletes=0;
    }else {
        $maxIdOfDeletes = max($deletedItems);
    }
   return max($maxIdOfTodos,$maxIdOfCompletes,$maxIdOfDeletes) +1;
   }
/*
[
'items' => [
'todo' => [
'todo-id-value-1' => [
'title' => '',
'description' => '',
'created_at' => ''
],
'todo-id-value-2' => [
'title' => '',
'description' => '',
'created_at' => ''
]
],
'completed' => [
'completed-id-value-1' => [
'title' => '',
'description' => '',
'created_at' => '',
'completed_at' => ''
],
...
],
'deleted' => [
'deleted-id-value-1' => [
'title' => '',
'description' => '',
'created_at' => '',
'completed_at' => '',
'deleted_at' => '',
'deleted_from' => ''
],
]
]
];
*/
?>
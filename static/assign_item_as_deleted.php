<?php

session_start();
$id=$_POST['item_id'];
$deleted_from=$_POST['delete_from'];

if($deleted_from=='todo_item'){
    $from="from_todo";
    $completed_at=null;
    $item=$_SESSION['items']['todo'][$id];
    unset($_SESSION['items']['todo'][$id]);


}
else{
    $from="from_completed";
    $completed_at=$_SESSION['items']['completed'][$id]['completed_at'];
    $item=$_SESSION['items']['completed'][$id];
    unset($_SESSION['items']['completed'][$id]);

}

$_SESSION['items']['deleted'][$id]=[
    "title"=>$item['title'],
    "description"=>$item['description'],
    "created_at"=>$item['created_at'],
    "completed_at"=>$completed_at,
    "deleted_at"=>date("Y-M-d H:i:s"),
    "deleted_from"=>$from
];
if($deleted_from=='todo_item')
header("Location:todo.php");
else
header("Location:completed.php");
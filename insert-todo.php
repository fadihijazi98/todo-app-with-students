<?php
session_start();
$generateId=generateId();
$_SESSION['items']['todo'][$generateId]=[
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'created_at' => date("Y-m-d h:i:s" )
];
$_SESSION['message']="item '". $_POST['title']."' is sucessfully created";
header("Location:todo.php");

function generateId(){
    if( ! key_exists('items', $_SESSION)){
        return 1;
    }
    $items=$_SESSION["items"];

    $todoItems=[0];
    $completedItems=[0];
    $deletedItems=[0];

    if((key_exists('todo',$items))&& $items['todo']){  //if there is todo item it return true always
        $todoItems=array_keys($items['todo']);}
    if((key_exists('completed',$items)) && $items['todo']){
        $completedItems=array_keys($items['completed']);}
    if((key_exists('deleted',$items)) && $items['todo']){
        $deletedItems=array_keys($items['deleted']);}

    $max_todo= max($todoItems);
    $max_completed= max($completedItems);
    $max_deleted= max($deletedItems);
    return max($max_completed,$max_deleted,$max_todo) +1;
}
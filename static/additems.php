<?php
session_start();

$generated_id=generated_id();
$_SESSION['items']['todo'][$generated_id]=
[
    "title"=>$_POST['title'],
    "description"=>$_POST['description'],
    "created_at"=>date("Y-M-d h:i:s")
];
header("Location:todo.php");

function generated_id(){
    if(! key_exists('items',$_SESSION)){
    return 1;}
    
    $items=$_SESSION['items'];

    $todoItems=[];
    $completedItems=[];
    $deletedItems=[];

    if(key_exists('todo',$items)){
    $todoItems=array_keys($items['todo']);}

    if(key_exists('completed',$items)){
    $completedItems=array_keys($items['completed']);}

    if(key_exists('deleted',$items)){
    $deletedItems=array_keys($items['deleted']);}
      if($deletedItems!=null && $completedItems!=null && $todoItems!=null ){
    $maxIdOfTodos=max($todoItems);
    $maxIdOfCompletes=max($completedItems);
    $maxIdOfDeletes=max($deletedItems);
       
    return max($maxIdOfCompletes,$maxIdOfDeletes,$maxIdOfTodos)+1;}
}
?>
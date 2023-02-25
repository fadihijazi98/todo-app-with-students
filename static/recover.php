<?php
session_start();
$id=$_POST['item_id'];
$recover_to=$_POST['recover_to'];
$deleted_from=$_SESSION['items']['deleted'][$id]['deleted_from'];

$item=$_SESSION['items']['deleted'][$id];
unset($_SESSION['items']['deleted'][$id]);

if($recover_to=='todo-list'){
    $to="todo";
    $completed_at=null;
}
else{
    $to="completed";
    $completed_at=$_SESSION['items']['deleted'][$id]['completed_at'];

}

$_SESSION['items'][$to][$id]=[
    "title"=>$item['title'],
    "description"=>$item['description'],
    "created_at"=>$item['created_at'],
    "completed_at"=>$completed_at
];

if($deleted_from=='from_todo')
header("Location:todo.php");
else
header("Location:completed.php");
?>

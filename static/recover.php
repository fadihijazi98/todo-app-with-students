<?php
session_start();
$id=$_POST['item_id'];
$recover_to=$_POST['recover_to'];

if($recover_to=='todo-list'){
    $to="todo";
    $completed_at=null;
    $item=$_SESSION['items']['deleted'][$id];
    unset($_SESSION['items']['deleted'][$id]);


}
else{
    $to="completed";
    $completed_at=$_SESSION['items']['deleted'][$id]['completed_at'];
    $item=$_SESSION['items']['deleted'][$id];
    unset($_SESSION['items']['deleted'][$id]);

}

$_SESSION['items'][$to][$id]=[
    "title"=>$item['title'],
    "description"=>$item['description'],
    "created_at"=>$item['created_at'],
    "completed_at"=>$completed_at
];

header("Location:deleted.php");
?>

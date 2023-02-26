<?php 
session_start();
$recover_to=$_POST['recover_to'];
$id=$_POST['item_id'];

$recovered_item=$_SESSION['items']['deleted'][$id];
unset($_SESSION['items']['deleted'][$id]);
$_SESSION['message']="The '".$recovered_item['title']."' item was recovered  !";

if($recover_to == 'todo-list'){
    $_SESSION['items']['todo'][$id]=[
        'title'=>$recovered_item['title'],
        'description'=>$recovered_item['description'],
        'created_at'=>$recovered_item['created_at']
    ];
  header('location:todo.php');
}
elseif($recover_to == 'completed-list'){
     $_SESSION['items']['completed'][$id]=[
        'title'=>$recovered_item['title'],
        'description'=>$recovered_item['description'],
        'created_at'=>$recovered_item['created_at'],
        'completed_at'=>$recovered_item['completed_at']
    ];
   header("location: completed.php");
}

 
?>
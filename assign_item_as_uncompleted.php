<?php
    session_start();
    $id=$_POST['item_id'];

    $uncompleted_item=$_SESSION['items']['completed'][$id];
    unset($_SESSION['items']['completed'][$id]);
    $_SESSION['items']['todo'][$id]=[
        'title'=>$uncompleted_item['title'],
        'description'=>$uncompleted_item['description'],
        'created_at'=>$uncompleted_item['created_at']
    ];
    $_SESSION['message']="The '".$uncompleted_item['title']."' item assigned as uncompleted  !";

    header('location: todo.php');
?>
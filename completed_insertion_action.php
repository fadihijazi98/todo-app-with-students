<?php
    session_start();
    $completed_item_id= $_POST['item_id'];
    $completed_item=$_SESSION['items']['todo'][$completed_item_id];
    $_SESSION['items']['completed'][$completed_item_id]=[
        'title'=>$completed_item['title'],
        'description'=>$completed_item['description'],
        'created_at'=>$completed_item['description'],
        'completed_at'=>date("y-m-d h:i:s")
    ];
    unset($_SESSION['items']['todo'][$completed_item_id]);
    header('Location:completed.php');

?>
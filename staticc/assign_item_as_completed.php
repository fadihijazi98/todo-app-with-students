<?php
    session_start();
    $id= $_POST['item_id'];
    $completed_item=$_SESSION['items']['todo'][$id];
    $_SESSION['items']['completed'][$id]=[
        'title'=>$completed_item['title'],
        'description'=>$completed_item['description'],
        'created_at'=>$completed_item['description'],
        'completed_at'=>date("y-m-d h:i:s")
    ];
    $_SESSION['message'] = "the '" .$completed_item['title'] . "' is completed any more.";

    unset($_SESSION['items']['todo'][$id]);

    header('Location:completed.php');

?>
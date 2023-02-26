<?php
    session_start();
    $id=$_POST['item_id'];
    $deleted_from=$_POST['deleted_from'];
    

    if($deleted_from == "completed-list"){
        $deleted_item=$_SESSION['items']['completed'][$id];
        $completed_at=$_SESSION['items']['completed'][$id]['completed_at'];
        unset($_SESSION['items']['completed'][$id]);

    }
    else{
        $deleted_item=$_SESSION['items']['todo'][$id];
        $completed_at=null;
        $deleted_from='todo-list';
        unset($_SESSION['items']['todo'][$id]);
    }
   // var_dump($deleted_item['title']); return;
    $_SESSION['items']['deleted'][$id]=[
        'title'=>$deleted_item['title'],
        'description'=>$deleted_item['description'],
        'created_at'=>$deleted_item['created_at'],
        'completed_at'=>$completed_at,
        'deleted_at'=>date("y-m-d h:i:s"),
        'deleted_from'=>$deleted_from
    ];
    $_SESSION['message']="The '".$deleted_item['title']."' item was deleted !";
    header("location: archived.php")
?>
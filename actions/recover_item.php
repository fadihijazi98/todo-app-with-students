<?php

session_start();
$id=$_POST ['item_id'];
$recover_to= $_POST['recover_to'];

if($recover_to == 'completed_item'){
    $item= $_SESSION['items']['deleted'][$id];
    unset($_SESSION['items']['deleted'][$id]);

    $_SESSION['items']['completed'][$id]=[
        'title' => $item['title'],
        'description' => $item['description'],
        'created_at' => $item['created_at'],
        'completed_at' => $completed_at,
        'deleted_from' => $deleted_From,
        'deleted_at'=>date("Y-m-d H:i:s")
    ];

 $_SESSION['message']='The "'. $item['title'] . '" successfully recover to completed item after deleted';   
header("Location:../views/completed.php");
}

else{
    $item= $_SESSION['items']['deleted'][$id];
    unset($_SESSION['items']['deleted'][$id]);

    $_SESSION['items']['todo'][$id]=[
        "title"=>$item["title"],
        "description"=>$item["description"],
        "created_at"=>date("Y-m-d H:i:s")
        ];

 $_SESSION['message']='The "'. $item['title'] . '" successfully recover to todo item after deleted';
header("Location:../views/todo.php");
}


?>
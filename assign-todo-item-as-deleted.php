<?php

session_start();

$id = $_POST['item_id'];


$deleted_from=$_POST['delete_from'];
$_SESSION["message"] = "The '{$item["title"]}' is deleted now";


if($deleted_from=="completed_item"){

    $Item=$_SESSION['items']['completed'][$id];
    $completed_at= $completedItem['completed_at'];
    unset( $_SESSION['items']['completed'][$id] );
    $_SESSION["message"] = "The '{$item["title"]}' is deleted now";

}else {

    $Item = $_SESSION['items']['todo'][$id];
    $completed_at = null;

    unset($_SESSION['items']['todo'][$id]);
    $_SESSION["message"] = "The '{$item["title"]}' is deleted now";

}

$_SESSION['items']['deleted'][$id]=[
    'title'=>$Item['title'],
    'description' => $Item['description'],
    'created_at'=> $Item['created_at'],
    'deleted_from'=>$deleted_from,
    'completed_at'=>$completed_at,
    'deleted_at' => date("y-m-d h:m:s")
];

header("Location:archived.php");
?>
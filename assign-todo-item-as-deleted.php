<?php 

session_start();

$id= $_POST['item_id'];
$deleted_from = $_POST['delete_from'];

if($deleted_from == 'completed_item'){
    $item= $_SESSION['items']['completed'][$id];
    $completed_at=$items['completed_at'];
    unset($_SESSION['items']['completed'][$id]);

}else{
    $item= $_SESSION['items']['todo'][$id];
    $completed_at = null;
    unset($_SESSION['items']['completed'][$id]);
}

$_SESSION['items']['deleted'][$id]=[
    'title' => $item['title'],
    'description' => $item['description'],
    'created_at' => $item['created_at'],
    'completed_at' => $completed_at,
    'deleted_from' => $deleted_from,
    'deleted_at'=>date("Y-m-d H:i:s")
];

$_SESSION['message']='The "'. $item['title'] . '" successfully deleted item';
header("Location:deleted.php");
?>

<?php 

session_start();

$id = $_POST['item_id'];

$todoItem = $_SESSION['items']['todo'][$id];

$_SESSION['items']['completed'][$id] = [
    'title' => $todoItem['title'],
    'description' => $todoItem['description'],
    'created_at' => $todoItem['created_at'],
    'completed_at' => date("Y-m-d H:i:s")
];

unset($_SESSION['items']['todo'][$id]);

$_SESSION['message']='The "'. $todoItem['title'] . '" successfully completed item';
header("Location:../views/completed.php");
?>
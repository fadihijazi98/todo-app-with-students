<?php
session_start();
$id = $_POST['item_id'];
$todoitem = $_SESSION['items']['todo'][$id];
$_SESSION['items']['completed'][$id] = [
    'title' => $todoitem['title'],
    'description' => $todoitem['description'],
    'created_at' => $todoitem['created_at'],
    'completed_at' => date("Y-m-d h:i:s")
];
unset($_SESSION['items']['todo'][$id]);
$_SESSION['message']="item '".  $todoitem['title']."' is sucessfully completed";

header("Location:completed.php");
?>


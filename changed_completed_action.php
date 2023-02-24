<?php
session_start();
// print_r($_SESSION['items'][3]);
$item = $_SESSION['items']['todo'][$_POST['item_id']];
$_SESSION['items']['completed'][$_POST['item_id']] = [
    'title' => $item['title'],
    'description' => $item['description'],
    'created_at' => $item['created_at'],
    'compelted_at' => date("Y-m-d H:i:s")

];
unset($_SESSION['items']['todo'][$_POST['item_id']]);
header("LOCATION: todo.php");

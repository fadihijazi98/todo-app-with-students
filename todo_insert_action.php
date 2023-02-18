<?php
$todoItems=$_SESSION['items'];

/**
 * superglobal variables
     * $_POST
     * $_GET
     * $_SERVER
 * what next? Session
 */

$title = $_POST['title'];
$description = $_POST['description'];

$todoItems = [];

$todoItems[] = [
    'title' => $title,
    'description' => $description
];

session_start();
$_SESSION['items'][]=[
    'Title'=>$_POST['Title'],
    'Description'=>$_POST['Description'],
    'Status'=>'To Do',
    'Created_at'=>date('y-m-d h:i:s')
];
header('Location:todo.php');
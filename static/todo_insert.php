<?php

session_start();
$_SESSION['items'][] = [
    "title" => $_POST['title'],
    "description" => $_POST['desctiption'],
    "created_at" => date("Y-m-d h-i-s"),
    "status" => "todo"
];

header("Location:index.php");
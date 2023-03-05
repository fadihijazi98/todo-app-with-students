<?php
session_start();

include '../Helpers/RedirectHelper.php';
include '../Helpers/GeneratorHelper.php';


$generated_id=GeneratorHelper::generateId();

$_SESSION['items']['todo'][$generated_id] =[

    "title"=> $_POST['title'],
    "description" => $_POST['description'],
    "created_at"=>GeneratorHelper::generateCurrentDate()
];
$_SESSION["message"] = "The '{$_SESSION["items"]["todo"][$generated_id]["title"]}' is created successfully ";

RedirectHelper::RedirectToPreviousPage();
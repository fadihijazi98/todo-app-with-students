<?php

session_start();

include '../helper/GenertorHelper.php';
include '../helper/RedirectHelper.php';

$generated_id = GeneratorHelper::generateId();

$_SESSION['items']['todo'][$generated_id] = [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'created_at' => GeneratorHelper::generateCurrentDate()
];

$_SESSION['message'] = "The `" . $_POST['title'] . "` item Successfully Created.";

RedirectHelper::redirectToPreviousPage();

?>



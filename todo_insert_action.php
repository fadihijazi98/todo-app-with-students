<?php

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


<?php

$todoItem = [
    'title' => "",
    'description' => "",
    'status' => "todo",
    'created_at' => ""
];

$completedItem = [
    'title' => "",
    'description' => "",
    'status' => "completed",
    'created_at' => "",
    'completed_at' => ""
];

$deletedItem = [
    'title' => "",
    'description' => "",
    'status' => "deleted",
    'deleted_from' => "",
    'created_at' => "",
    'completed_at' => "", // completed_at can be null when deleted_from is "todo"
    'deleted_at' => ""
];

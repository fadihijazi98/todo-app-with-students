<?php
session_start();
$index = geterated_id();

echo $index;
$_SESSION['items']['todo'][$index] = [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'status' => 'todo',
    'created_at' => date("Y-m-d H:i:s")
];
header("LOCATION: todo.php");
function geterated_id()
{
    if (!array_key_exists('items', $_SESSION))
        return 1;
    $todoKeys = [0];
    $completedKeys = [0];
    $deletedKeys = [0];
    if (array_key_exists('todo', $_SESSION['items']) && sizeof($_SESSION['items']['todo']) > 0) {
        $todoKeys = array_keys($_SESSION['items']['todo']);
    }
    if (array_key_exists('completed', $_SESSION['items']) && sizeof($_SESSION['items']['completed']) > 0) {
        $completedKeys = array_keys($_SESSION['items']['completed']);
    }
    if (array_key_exists('deleted', $_SESSION['items']) && sizeof($_SESSION['items']['deleted']) > 0) {
        $deletedKeys = array_keys($_SESSION['items']['deleted']);
    }
    $maxtodoid = max($todoKeys);
    $maxcompletedid = max($completedKeys);
    $maxdeletedid = max($deletedKeys);
    return max($maxdeletedid, $maxcompletedid, $maxtodoid) + 1;
}
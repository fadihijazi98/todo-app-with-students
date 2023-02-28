<?php

session_start();

$generated_ID = generateID();


$_SESSION["items"]["todo"][$generated_ID]=[

    "title"=>$_POST["title"],
    "description"=>$_POST["description"],
    "created_at"=>date("Y-m-d H:i:s")

];



header("Location:todo.php");

function generateID()
{

    if(!key_exists("items",$_SESSION)) {
        return 1;
    }

    $Items = $_SESSION["items"];

    $todoItems = [0];
    $completedItems = [0];
    $deletedItems = [0];

    

    if (key_exists("todo", $Items) && $Items["todo"]) {
            $todoItems = array_keys($Items["todo"]);
    }

    if (key_exists("completed", $Items) && $Items["completed"]) {
            $completedItems = array_keys($Items["completed"]);
    }

    if (key_exists("deleted", $Items)&& $Items["deleted"]) {
            $deletedItems = array_keys($Items["deleted"]);
    }

     $maxIdOfTodos = max($todoItems);
     $maxIdOfCompletes = max($completedItems);
     $maxIdOfDeletes = max($deletedItems);
    
        return max($maxIdOfTodos, $maxIdOfCompletes, $maxIdOfDeletes) + 1;
        

    }



?>


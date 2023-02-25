<?php

session_start();

$generated_ID = generateID();


$_SESSION["items"]["todo"][$generated_ID]=[

    "title"=>$_POST["title"],
    "description"=>$_POST["description"],
    "created_at"=>date("Y-m-d H:i:s")

];

$_SESSION["message"] = "The '{$_SESSION["items"]["todo"][$generated_ID]["title"]}' is created successfully ^^";

header("Location:todo.php");

function generateID()
{

    if(!key_exists("items",$_SESSION)) {
        return 1;
    }

    else {
        $Items = $_SESSION["items"];

        $todoItems_indexes_as_keys = [];
        $completedItems_indexes_as_keys = [];
        $deletedItems_indexes_as_keys = [];

        if (key_exists("todo", $Items)) {
            $todoItems_indexes_as_keys = array_keys($Items["todo"]);
        }

        if (key_exists("completed", $Items)) {
            $completedItems_indexes_as_keys = array_keys($Items["completed"]);
        }

        if (key_exists("deleted", $Items)) {
            $deletedItems_indexes_as_keys = array_keys($Items["deleted"]);
        }
        if(sizeof($todoItems_indexes_as_keys)==0)
        {
            $max_index_of_todos = 0;
        }
        else
        {
            $max_index_of_todos = max($todoItems_indexes_as_keys);

        }
        if(sizeof($completedItems_indexes_as_keys)==0)
        {
            $max_index_of_completes = 0;
        }
        else
        {
            $max_index_of_completes = max($completedItems_indexes_as_keys);

        }
        if(sizeof($deletedItems_indexes_as_keys)==0)
        {
            $max_index_of_deletes = 0;
        }
        else
        {
            $max_index_of_deletes = max($deletedItems_indexes_as_keys);

        }

        return max($max_index_of_todos, $max_index_of_completes, $max_index_of_deletes) + 1;

    }

}
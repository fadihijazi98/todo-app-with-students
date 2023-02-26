<?php 

session_start();

$generated_id=generateId();

$_SESSION['items']['todo'][$generated_id]=[
"title"=>$_POST["title"],
"description"=>$_POST["description"],
"created_at"=>date("Y-m-d H:i:s")
];

$_SESSION['message']='The "'. $_POST['title'] . '" successfully created item';

header("Location:todo.php");

function generateId(){

    if(! key_exists('items' ,$_SESSION)){
        return 1;
    }
    
        $items=$_SESSION['items'];

        $todoItems=[0];
        $completedItems=[0];
        $deletedItems=[0];

        if(key_exists('todo' ,$items) && $items['todo']){
            $todoItems=array_keys($items['todo']);
        }
        
        if(key_exists('completed' ,$items) && $items['todo']){
            $completedItems=array_keys($items['completed']);
        }
        
        if(key_exists('deleted' ,$items) && $items['todo']){
            $deletedItems=array_keys($items['deleted']);
        }
        
        $maxIdOfTodo=max($todoItems);
        $maxIdOfComplete=max($completedItems);
        $maxIdOfDelete=max($deletedItems);

        return max($maxIdOfTodo, $maxIdOfComplete, $maxIdOfDelete) + 1;
}
?>
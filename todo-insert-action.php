<?php 

session_start();
$_SESSION["items"][]=[
"title"=>$_POST["title"],
"discription"=>$_POST["discription"],
"status"=>"todo",
"created_at"=>date("Y-m-d H:i:s")
];

header("Location:todo.php");
?>
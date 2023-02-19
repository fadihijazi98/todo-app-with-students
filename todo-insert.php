<?php

session_start();

$_SESSION ['item'] [] = [

   "title" => $_POST['title'],
   "description" => $_POST['description'],
   "create_at" => date("Y-M-D h:i:s")


];


header ("Location:todo.php");













?>
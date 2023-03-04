<?php
ob_start();
session_start();

if(! key_exists("items",$_SESSION)){
    $_SESSION['items']=[];
}

$status=["todo","completed","deleted"];

foreach($status as $value){
    if(! key_exists($value,$_SESSION['items']))
    $_SESSION['items'][$value]=[];
}
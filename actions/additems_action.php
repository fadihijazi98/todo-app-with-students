<?php
session_start();
include "../helpers/GeneratorHelper.php";
$generated_id=GeneratorH::generated_id();
$_SESSION['items']['todo'][$generated_id]=
[
    "title"=>$_POST['title'],
    "description"=>$_POST['description'],
    "created_at"=>GeneratorH::generate_date()
];
$_SESSION['message']="The '".$_POST['title']."' item successfuly created";

include "../helpers/RedirectHelper.php";
RedirectHelper::redirectToPreviousPage();
?>
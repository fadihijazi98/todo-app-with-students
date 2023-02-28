<?php

session_start();
$id=$_POST["item_id"];
$recover_to=$_POST["recover_to"];
$item=$_SESSION["items"]["deleted"][$id];
if ($recover_to=="completed"){

    $_SESSION["items"]["completed"][$id]=[

        'title' => $item['title'],
        'description' => $item['description'],
        "completed_at" => $item["completed_at"],
        "created_at" =>$item["created_at"]
    ];
       unset($_SESSION["items"]["deleted"][$id]);

}else{
    $_SESSION["items"]["todo"][$id]=[

        'title' => $item['title'],
        'description' => $item['description'],
        "completed_at" => $item["completed_at"],
        "created_at" =>$item["created_at"]
    ];
    unset($_SESSION["items"]["deleted"][$id]);


}
header("Location:delete.php");


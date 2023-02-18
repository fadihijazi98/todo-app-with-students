<?php
session_start();

$_SESSION["items"][]=[
   "ot do"=>

       ["title"=>$_POST["title"],
    "description"=>$_POST["description"],
    "status"=>"to-do",
    "created_at"=>date("y-m-d h-i-s")
        ]
    ,

       "completed"=>

       ["title"=>$_POST["title"],
           "description"=>$_POST["description"],
           "status"=>"to-do",
           "created_at"=>date("y-m-d h-i-s")
       ]

      ,
          "ot do"=>

       ["deleted"=>$_POST["title"],
           "description"=>$_POST["description"],
           "status"=>"to-do",
           "created_at"=>date("y-m-d h-i-s")
       ]
];

header("Location:todo.php");
<?php


?>

<!DOCTYPE HTML PUBLIC>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@200;400;700&display=swap"
          rel="stylesheet">
    <title>
    </title>
    <style>
        .font-source-code-pro {
    font-family: 'Source Code Pro', monospace;
        }
    </style>
</head>
<body>
<div id="main" class="min-h-screen bg-gray-200 p-8">

    <div class="bg-gray-100 space-y-12 py-10 rounded-2xl">
        <div class="bg-gray-100 space-y-12 py-10 rounded-2xl">
            <div>
                <h3 class="text-3xl text-center font-source-code-pro"> Home Page </h3>
                <!-- ::if statement start here to show this message once;; -->

                <div class="bg-purple-500 my-8 py-4 font-source-code-pro text-lg text-white text-center">
                    <!-- {$redirect_message} -->
             <i>Please choose the menu  </i>
                </div>
                <!-- ::if statement end here to show this message once;; -->
            </div>
            <div style="display: flex; justify-content: space-evenly" >

                <!-- button todo list  -->

                    <form action="todo.php" method="POST">
                        <!-- {$id} -->
                        <button type="submit" class="text-sm bg-purple-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-purple-500 duration-500">
                             todo list
                        </button>
                    </form>


                <!-- button completed list -->
                    <form  action="completed.php" method="POST">
                        <button class="text-sm bg-green-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-green-500 duration-300">
                            completed list
                        </button>
                    </form>
                <!-- button deleted list -->

                <form action="delete.php" method="POST">
                    <button class="text-sm bg-red-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-green-500 duration-500">
                        deleted list
                    </button>
                </form>
        </div>


</body>
</html>
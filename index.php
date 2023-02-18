<<<<<<< HEAD

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
        <div>
            <h3 class="text-3xl text-center font-source-code-pro"> Todo items </h3>
        </div>
        <!-- to-do item element -->
        <div class="container flex justify-center gap-16">
            <div>
                <div class="w-80 mb-6">
                    <!-- {loop start should be here} -->
                    <div class="bg-white my-4 max-w-sm mx-auto rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                        <div class="h-20 bg-purple-500 flex items-center justify-start gap-3">
                            <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">
                                <!-- {$index} -->
                            </h1>
                            <p class="mr-20 text-white text-lg">
                                <!-- {$title} -->
                            </p>
                        </div>
                        <form action="" method="" id="todo-item-{$id}"
                              class="my-0 flex items-center px-4 gap-3">
                                <span class=''>
                                  <input hidden name="item_id" value="{$id}">
                                  <input type="checkbox"
                                         onclick="document.getElementById('todo-item-{$id}').submit()"
                                         class='h-6 w-6 bg-white checked:scale-75 transition-all duration-200 peer'/>
                                </span>
                            <p class="py-6 text-lg tracking-wide gap-2 text-purple-800">
                                <!-- {$description} -->
                            </p>
                        </form>
                        <form action="" method="">
                            <input hidden name="item_id" value="{$id}">
                            <button type="submit"
                                    class="text-sm bg-red-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-red-500 duration-500">
                                Delete
                            </button>
                        </form>
                        <div class="flex justify-between px-5 my-4 text-sm text-gray-600">
                            <p>Created at</p>
                            <p>
                                <!-- {$created_at} -->
                            </p>
                        </div>
                    </div>
                    <!-- {loop end should be here} -->
                </div>
            </div>
        </div>
    </div>


</div>
</body>
</html>
=======
<?php
$todoItem = [
    'title' => "",
    'description' => "",
    'status' => "todo",
    'created_at' => ""
];

$completedItem = [
    'title' => "",
    'description' => "",
    'status' => "completed",
    'created_at' => "",
    'completed_at' => ""
];

$deletedItem = [
    'title' => "",
    'description' => "",
    'status' => "deleted",
    'deleted_from' => "",
    'created_at' => "",
    'completed_at' => "", // completed_at can be null when deleted_from is "todo"
    'deleted_at' => ""
];

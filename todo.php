<?php

session_start();

$todoItems = $_SESSION["items"]["todo"];

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
    <!-- ::put the (todo, completed, or archived) content here;; -->
    <div class="bg-gray-100 space-y-12 py-10 rounded-2xl">
        <div>
            <h3 class="text-3xl text-center font-source-code-pro"> Todo items </h3>
            <!-- ::if statement start here to show this message once;; -->
            <?php if(key_exists("message",$_SESSION)){ ?>
            <div class="bg-purple-500 my-8 py-4 font-source-code-pro text-lg text-white text-center">
                <!-- {$redirect_message} -->
                <?php echo $_SESSION["message"];
                unset($_SESSION["message"]);
                ?>

            </div>
            <!-- ::if statement end here to show this message once;; -->
            <?php } ?>
        </div>
        <!-- to-do item element -->
        <div class="container flex justify-center gap-16">
            <div class="w-80 border-r border-r-2 pr-4 border-purple-500">
                <form action="todo_insert_action.php" method="post">
                    <div class="mb-6">
                        <label for="title"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                        <input type="text" id="title" name="title"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="i have to .." required="">
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                        <input type="text" id="description" name="description"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="i have to more details" required="">
                    </div>
                    <button type="submit"
                            class="text-white bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </form>
            </div>
            <div>
                <div class="w-80 mb-6">
                    <!-- ::loop of items.todo should start here;; -->
                    <?php $index = 1; ?>
                    <?php foreach ($todoItems as $id=>$todoItem){?>
                        <div class="bg-white my-4 max-w-sm mx-auto rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                            <div class="h-20 bg-purple-500 flex items-center justify-start gap-3">
                                <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">
                                    <!-- {$index} -->
                                    <?php echo $index++;?>
                                </h1>
                                <p class="mr-20 text-white text-lg">
                                    <!-- {$title} -->
                                    <?php echo $todoItem["title"];?>
                                </p>
                            </div>

                            <form action="assign_todo_item_as_completed.php" method="post" id="todo-item-<?php echo $id; ?>"

                                  class="my-0 flex items-center px-4 gap-3">
                                <span class=''>
                                  <input hidden name="item_id" value="<?php echo $id; ?>">
                                  <input type="checkbox"
                                         onclick="document.getElementById('todo-item-<?php echo $id; ?>').submit()"
                                         class='h-6 w-6 bg-white checked:scale-75 transition-all duration-200 peer'/>
                                </span>
                                <p class="py-6 text-lg tracking-wide gap-2 text-purple-800">
                                    <!-- {$description} -->
                                    <?php echo $todoItem["description"];?>
                                </p>
                            </form>
                            <form action="assign_item_as_deleted.php" method="post">
                                <input hidden name="item_id" value="<?php echo $id; ?>">
                                <input hidden name="delete_from" value="todo_item" />
                                <button type="submit"
                                        class="text-sm bg-red-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-red-500 duration-500">
                                    Delete
                                </button>
                            </form>
                            <div class="flex justify-between px-5 my-4 text-sm text-gray-600">
                                <p>Created at</p>
                                <p>
                                    <!-- {$created_at} -->
                                    <?php echo $todoItem["created_at"];?>
                                </p>
                            </div>
                        </div>
                        <!-- ::loop of items.todo should end here;; -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
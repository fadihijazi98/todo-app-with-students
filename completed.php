<?php 
session_start();
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
    <!-- content -->
    <div class="bg-gray-100 space-y-12 py-10 rounded-2xl">
    <div>
        <h3 class="text-3xl text-center font-source-code-pro">
            Completed items
        </h3>
        <?php if(key_exists('message', $_SESSION)){ ?>

        <div class="bg-green-500 my-8 py-4 font-source-code-pro text-lg text-white text-center">
            <!-- {$redirect_message} -->
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);    
            ?>
        </div>
        <?php } ?>
    </div>
    <!-- completed item element -->
    <?php
    $completed_items=$_SESSION['items']['completed'];
    ?>
    <div class="container mx-auto">
        <!-- {$id} -->
        <?php 
            if (empty($completed_items)) { ?>
                <h3 class="text-2xl text-center font-source-code-pro">
                    Completed items will be shown here !
                </h3>
        <?php
            } else {
            $index = 1;
            foreach($completed_items as $id => $completed_item){
        ?>
        <div class="bg-white my-4 max-w-sm mx-auto rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
            <div class="h-20 bg-green-500 flex items-center justify-start gap-3">
                <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">
                    <!-- {$i}  -->
                    <?php echo $index++; ?>
                </h1>
                <p class="mr-20 text-white text-lg">
                    <!-- {$title} -->
                    <?php echo $completed_item['title']; ?>
                </p>
            </div>

            <div class="flex items-center px-4 gap-3">
                    <form method="post" action="assign_item_as_uncompleted.php" id="completed-item-<?php echo $id; ?>" class='my-0'>
                            <!-- {$id} -->
                            <input hidden name="item_id" value="<?php echo $id; ?>">
                            <input type="checkbox" onclick="document.getElementById('completed-item-<?php echo $id; ?>').submit()"
                                   checked class='h-6 w-6 bg-white checked:scale-75 transition-all duration-200 peer'/>
                    </form>
                <p class="py-6 text-lg tracking-wide gap-2 text-green-800">
                    <!-- {$description} -->
                    <?php echo $completed_item['description']; ?>
                </p>
            </div>

            <form action="deleted_insertion_action.php" method="post">
                <!-- {$id} -->
                <input hidden name="item_id" value="<?php echo $id; ?>">
                <input hidden name="deleted_from" value="completed-list" />
                <button type="submit"
                        class="text-sm bg-red-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-red-500 duration-500">
                    Delete
                </button>
            </form>

            <div class="flex justify-between px-5 my-4 text-sm text-gray-600">
                <p>Completed at</p>
                <p>
                    <!-- {$completed_at} -->
                    <?php $completed_item['completed_at']; ?>
                    
                </p>
            </div>
        </div>
        <?php }} ?>
    </div>
</div>
</div>
</body>
</html>
<?php
include "../Constents/Item.php";
include "../uitls/init_including_templete_uitl.php";
$completed_items = $_SESSION['items']['completed'];
?>


<div id="main" class="min-h-screen bg-gray-200 p-8">
    <!-- content -->
    <div class="bg-gray-100 space-y-12 py-10 rounded-2xl">
    <div>
        <h3 class="text-3xl text-center font-source-code-pro">
            Completed items
        </h3>
        <?php if(key_exists('message',$_SESSION)) { ?>
        <div class="bg-green-500 my-8 py-4 font-source-code-pro text-lg text-white text-center">
        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
        <?php } ?>
    </div>
    <!-- completed item element -->
    <?php $index=1;
                  foreach($completed_items as $id =>$completeItem){?>
    <div class="container mx-auto">
        
        <div class="bg-white my-4 max-w-sm mx-auto rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
            <div class="h-20 bg-green-500 flex items-center justify-start gap-3">
                <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">
                <?php echo $index++;?>
                </h1>
                <p class="mr-20 text-white text-lg">
                <?php echo $completeItem['title'] ;?>
                    
                </p>
            </div>

            <div class="flex items-center px-4 gap-3">
                    <form method="post" action="../actions/return_complete_item_to_todo_action.php" id="completed-item-<?php echo $id;?>" class='my-0'>
                    
                            <input hidden name="item_id" value="<?php echo $id;?>">
                            <input type="checkbox" onclick="document.getElementById('completed-item-<?php echo $id;?>').submit()"
                                   checked class='h-6 w-6 bg-white checked:scale-75 transition-all duration-200 peer'/>
                    </form>
                <p class="py-6 text-lg tracking-wide gap-2 text-green-800">
                <?php echo $completeItem['description'] ;?>
                    
                </p>
            </div>

            <form action="../actions/assign_item_as_deleted_action.php" method="POST">
            
                <input hidden name="item_id" value="<?php echo $id;?>">
                <input hidden name="delete_from" value="<?php echo Item::COMPLETED;?>" />
                <button type="submit"
                        class="text-sm bg-red-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-red-500 duration-500">
                    Delete
                </button>
            </form>

            <div class="flex justify-between px-5 my-4 text-sm text-gray-600">
                <p>Completed at</p>
                <p>
                <?php echo $completeItem['completed_at'];?>
                </p>
            </div>
        </div>
        <?php };?>
    </div>
</div>
<?php 
include "../uitls/render_templete_uitl.php";
?>

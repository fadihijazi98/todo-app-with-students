<?php
class generatorhelper{
    public static function generatorId(){

        if(! session_id()){
            session_start();
        }

        if(! key_exists('items' ,$_SESSION)){
            return 1;
        }
        
            $items=$_SESSION['items'];
    
            $todoItems=[0];
            $completedItems=[0];
            $deletedItems=[0];
    
            if(key_exists('todo' ,$items) && $items['todo']){
                $todoItems=array_keys($items['todo']);
            }
            
            if(key_exists('completed' ,$items) && $items['completed']){
                $completedItems=array_keys($items['completed']);
            }
            
            if(key_exists('deleted' ,$items) && $items['deleted']){
                $deletedItems=array_keys($items['deleted']);
            }
            
            $maxIdOfTodo=max($todoItems);
            $maxIdOfComplete=max($completedItems);
            $maxIdOfDelete=max($deletedItems);
    
            return max($maxIdOfTodo, $maxIdOfComplete, $maxIdOfDelete) + 1;
           
    }
    public static function generateCurrentDate() {

        return date("Y-m-d H:i:s");
    }
    
}
?>
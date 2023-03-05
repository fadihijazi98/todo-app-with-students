<?php


class GeneraterHelper
{
    public static function generateId(){
        if( ! key_exists('items', $_SESSION)){
            return 1;
        }
        $items=$_SESSION["items"];

        $todoItems=[0];
        $completedItems=[0];
        $deletedItems=[0];

        if((key_exists('todo',$items))&& $items['todo']){  //if there is todo item it return true always
            $todoItems=array_keys($items['todo']);}
        if((key_exists('completed',$items)) && $items['completed']){
            $completedItems=array_keys($items['completed']);}
        if((key_exists('deleted',$items)) && $items['deleted']){
            $deletedItems=array_keys($items['deleted']);}

        $max_todo= max($todoItems);
        $max_completed= max($completedItems);
        $max_deleted= max($deletedItems);
        return max($max_completed,$max_deleted,$max_todo) +1;
    }
    public static function generateCurrentDate(){
        return date("Y-m-d H:i:s");
    }

}
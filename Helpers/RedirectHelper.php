<?php
class RedirectHelper
{
   public static function RedirectToPreviousPage(){
       header("Location:" . $_SERVER['HTTP_REFERER']);
   }
}
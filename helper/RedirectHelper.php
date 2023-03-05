<?php

class RedirectHelper
{
public static function redirectToPreviousPage(){
    return header("Location:" .$_SERVER['HTTP_REFERER']);
}
}
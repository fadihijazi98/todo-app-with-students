
<?php 

session_start();
include '../helpers/generatorHelper.php';
include '../helpers/redirectHelper.php';


$id = $_POST['item_id'];

$item = $_SESSION['items']['todo'][$id];

$_SESSION['items']['completed'][$id] = $item;
$_SESSION['items']['completed'][$id]['completed_at'] = generatorhelper::generateCurrentDate();

unset($_SESSION['items']['todo'][$id]);

$_SESSION['message']='The "'. $item['title'] . '" successfully completed item';

RedirectHelper::redirectToPreviousPage();
?>
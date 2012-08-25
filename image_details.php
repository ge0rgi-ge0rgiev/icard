<?php

header('Content-Type: text/html; charset=utf-8');
require_once 'includes/initialize.php';

$smarty = new MySmarty();
$photo = Photograph::find_by_id($_GET['id']);

if(!$photo) {
    $session->message('The Photo could not be located');
    redirect_to('index.php');
}




$smarty->assign('photo', $photo);
$smarty->assign('message', output_message($message));

$smarty->display('header.tpl');
$smarty->display('image_details.tpl');
$smarty->display('footer.tpl');
<?php

header('Content-Type: text/html; charset=utf-8');
require_once 'includes/initialize.php';

$smarty = new MySmarty();
$max_file_size = 1048576;

if(isset($_POST['submit'])) {
    
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    
    $title = ($title !== '') ? $title : 'Untitled';
    $description = ($description !== '') ? $description : 'Untitled';
    
    $photo = new Photograph();
    
    $photo->title = $title;
    $photo->description = $description;
    $photo->created = strftime("%#d-%B-%Y, %H:%M:%S");
    
    $photo->attach_file($_FILES['image']);
    if($photo->save()) {
        $session->message("Photograph uploaded successfully.");
        redirect_to('index.php');
    }
    else {
        $message = join('<br />', $photo->errors);
    }
}


$smarty->assign('message', output_message($message));
$smarty->assign('max_file_size', $max_file_size);

$smarty->display('header.tpl');
$smarty->display('photo_upload.tpl');
$smarty->display('footer.tpl');


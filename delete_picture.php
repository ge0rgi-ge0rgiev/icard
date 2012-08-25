<?php

require_once 'includes/initialize.php';

if(empty($_GET['id'])) {
    $session->message("No picture ID was provided.");
    redirect_to('index.php');
}

$photo = Photograph::find_by_id($_GET['id']);

if($photo && $photo->destroy()) {
    $session->message("The photo <b>{$photo->filename}</b> was deleted.");
    redirect_to('index.php');
}
else {
    $session->message("The photo could not be deleted.");
    redirect_to('index.php');
}
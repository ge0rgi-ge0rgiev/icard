<?php

function __autoload($class) {
    $file = LIB_PATH . DS . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        die("The file {$class}.php could not found.");
    }
}

function show_error() {
    if (SHOW_ERROR) {
        return mysql_error();
    }
}

function print_array($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function redirect_to($location) {
    if ($location) {
        header("Location: {$location}");
        exit();
    }
}

function output_message($message) {
    if (!empty($message)) {
        return '<p clas="message"><b>' . $message . '</b></p>';
    }
}

function date_as_text($datetime) {
    $unixtime = strtotime($datetime);
    return strftime("%#d %B, %Y at %H:%M", $unixtime + (60 * 60 * 3));
}

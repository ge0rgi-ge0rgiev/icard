<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', '/home'.DS.'vol12'.DS.'freehosting.bg'.DS.'freeh_11044549'.DS.'htdocs'.DS.'icard');
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

// Config file and common use functions
require_once LIB_PATH.DS.'config.php';
require_once LIB_PATH.DS.'functions.php';

// Common classes
require_once LIB_PATH.DS.'Session.php';
require_once LIB_PATH.DS.'Database.php';
require_once LIB_PATH.DS.'DatabaseObject.php';
require_once LIB_PATH.DS.'MySmarty.php';
require_once LIB_PATH.DS.'Pagination.php';

// Database-related classes
require_once LIB_PATH.DS.'Photograph.php';

<?php

header('Content-Type: text/html; charset=utf-8');
require_once 'includes/initialize.php';


$smarty = new MySmarty();
$where = '';
$order_by = '';

if(isset($_POST['submit'])) {
    if(trim($_POST['title']) != '') {
        $where = Photograph::where('title', $_POST['title']);
    }
}

$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$per_page = 3;
$total_count = Photograph::count_all($where);

$pagination = new Pagination($page, $per_page, $total_count);


$order_by = Photograph::order_by();


$sql = "SELECT * FROM pictures ";
$sql .= "{$where} ";
$sql .= "{$order_by[0]} ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";


$photos = Photograph::find_by_sql($sql);

$smarty->assign('message', output_message($message));
$smarty->assign('photos', $photos);
$smarty->assign('pagination', $pagination);
$smarty->assign('current_page', $page);
$smarty->assign('order_by', $order_by);


$smarty->display('header.tpl');
$smarty->display('index.tpl');
$smarty->display('footer.tpl');
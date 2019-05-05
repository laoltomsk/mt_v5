<?php
session_start();
require_once("../settings.php");
require_once("../models/newsmodel.php");
require_once("../views/sitemap_view.php");

$model = new NewsModel();
$view = new SiteMapView();

$data = array();
$data['news'] = $model->getData($db, '', '', infinity, $_GET['page'] * newsOnSiteMapPage, newsOnSiteMapPage);
$data['page'] = $_GET['page'];
$data['numberOfPages'] = $model->getNumberOfData($db) / newsOnSiteMapPage + 1;

if ($data['news']) {
    $view->show($data);
}
else {
    header("Location: /error404");
}
?>
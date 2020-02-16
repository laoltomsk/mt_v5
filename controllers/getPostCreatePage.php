<?php
session_start();
require_once("../settings.php");
require_once("../views/post_create_view.php");
require_once("../models/adsmodel.php");

if (checkAdmin()) {
    $view = new PostCreateView();
    $ads = new AdsModel();

    $data = Array();
    $data['ads'] = $ads->getData($db);

    $view->show($data);
}
else {
    header("Location: /error404");
}

?>
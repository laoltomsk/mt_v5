<?php
session_start();
require_once("../settings.php");
require_once("../models/postmodel.php");
require_once("../views/post_edit_view.php");
require_once("../models/adsmodel.php");

if (checkAdmin()) {

    $model = new PostModel();
    $view = new PostEditView();
    $ads = new AdsModel();

    $data = array();
    $data['post'] = $model->getData($db, $_GET['id']);
    $data['ads'] = $ads->getData($db);

    if ($data['post']) {
        $view->show($data);
    }
    else {
        header("Location: /error404");
    }
}
else {
    header("Location: /error404");
}

?>
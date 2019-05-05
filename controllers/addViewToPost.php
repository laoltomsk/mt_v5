<?php
session_start();
require_once("../settings.php");
require_once("../models/postmodel.php");

$model = new PostModel();

$model->addView($db, $_GET['id']);
?>
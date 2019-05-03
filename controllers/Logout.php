<?php
session_start();
require_once("../settings.php");

unset($_SESSION['user']);
unset($_SESSION['ip']);

header("Location: /controllers/getPosts.php");
?>
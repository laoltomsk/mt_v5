<?php
session_start();
require_once("../settings.php");
require_once("../models/tipmodel.php");
if ($_POST['check'] === date("Y")) {
    $model = new TipModel();

    $model->setData($db, $_POST['tip'], $_POST['contact']);

    header("Location: /");
}
else {
    header("Location: /sendtip.html");
}
?>
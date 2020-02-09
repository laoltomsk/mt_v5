<?php
session_start();
require_once("../settings.php");

if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
    include_once("helpers/picture_helpers.php");
    include_once("helpers/naming_helpers.php");

    $name = NamingHelpers::remove_quotes($_POST['name']);
    $engname = NamingHelpers::convert_to_translit($name);
    $curdate = strtolower(date("Fy/d"));
    $id = $_POST['id'];
    $goalwidth = PictureHelpers::getTotalWidth($_POST['colnum']) / $_POST['colnum'];
    $pic = $_FILES['pic'];
    $picnum = $_POST['picnum'];
    $savenames = $_POST['saveNames'];

    $tmpname = $pic["tmp_name"];
    $oldname = $pic["name"];
    $filetype = PictureHelpers::getFileType($oldname);
    $newname = PictureHelpers::getNewName($oldname, $engname, $id . "_" . $picnum, $filetype, $savenames === "true");

    $src = PictureHelpers::openImage($tmpname, $filetype);
    PictureHelpers::convertPngOrBmpToJpg($src, $filetype, $tmpname, $newname);
    PictureHelpers::pushImage($tmpname, $newname, $curdate, true);

    $imgsize = getimagesize($pic["tmp_name"]);
    $goalHeight = $imgsize[IMAGESIZE_Y] / $imgsize[IMAGESIZE_X] * $goalwidth;
    PictureHelpers::resizeImageInPlace($src, $tmpname, $filetype, $goalHeight);
    $newname_resize = explode(".", $newname)[0] . "_resize." . $filetype;
    PictureHelpers::pushImage($tmpname, $newname_resize, $curdate, false);
}
?>
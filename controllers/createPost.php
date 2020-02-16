<?php
session_start();
require_once("../settings.php");
require_once("../models/postmodel.php");

if (checkAdmin()) {
    include_once("helpers/naming_helpers.php");
    include_once("helpers/picture_helpers.php");

    $name = NamingHelpers::remove_quotes($_POST['title']);
    $curdate = strtolower(date("Fy/d"));
    $currentPicIndex = 1;
    $author = "";

    $content = json_decode($_POST['content']);
    $text = "";

    foreach ($content as $block) {
        if (!file_exists("blocks/".$block->type."_block.php"))
            continue;

        require_once("blocks/".$block->type."_block.php");
        $className = $block->type."Block";
        $blockHandler = new $className($block);
        $text .= $blockHandler->generate();
    }

    $text .= "\r\n<br><br>";

    $model = new PostModel();

    $src = $_POST['source'];
    if ($_POST['sourceLink'] != "") $src = '<a href="'.$_POST['sourceLink'].'">'.$src.'</a>';

    $newPostId = $model->setData($db, $_POST['title'], $_POST['category'], $text, $_POST['lead'],
        "", $_POST['author'], $src, $_POST['tags']);

    print $newPostId;
}
else {
    header("Location: /error404");
}
?>
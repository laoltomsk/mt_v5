<?php
require_once("block.php");

class yandexBlock extends Block
{
    public function __construct($block)
    {
    }

    public function generate()
    {
        $result = "\r\n<br><br>";
        $result .= "\r\n<div id=\"div_yandex_direct\"></div>";
        $result .= "\r\n<ul><script type=\"text/javascript\"><!--";
        $result .= "\r\nloadDynamicContent_Direct();";
        $result .= "\r\n//--></script></ul>";
        return $result;
    }
}
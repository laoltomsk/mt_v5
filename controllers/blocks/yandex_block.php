<?php
require_once("block.php");

class yandexBlock extends Block
{
    public function __construct($block)
    {
    }

    public function printCode()
    {
        print "\r\n<br><br>";
        print "\r\n<div id=\"div_yandex_direct\"></div>";
        print "\r\n<ul><script type=\"text/javascript\"><!--";
        print "\r\nloadDynamicContent_Direct();";
        print "\r\n//--></script></ul>";
    }
}
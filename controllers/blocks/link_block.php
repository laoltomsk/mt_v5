<?php
require_once("block.php");

class linkBlock extends Block
{
    private $content;

    public function __construct($block)
    {
        $this->content = $block->content;
    }

    public function printCode()
    {
        print "\r\n<br>";
        print "\r\n<div style=\"text-align: center; font-size: 115%;\"><b>";
        print "\r\n".$this->content;
        print "\r\n"."</b></div>";
    }
}
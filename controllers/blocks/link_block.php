<?php
require_once("block.php");

class linkBlock extends Block
{
    private $content;

    public function __construct($block)
    {
        $this->content = $block->content;
    }

    public function generate()
    {
        $result = "\r\n<br>";
        $result .= "\r\n<div style=\"text-align: center; font-size: 115%;\"><b>";
        $result .= "\r\n".$this->content;
        $result .= "\r\n"."</b></div>";
        return $result;
    }
}
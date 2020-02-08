<?php
require_once("block.php");

class rawBlock extends Block
{
    private $content;

    private $isDiv;

    public function __construct($block)
    {
        $this->content = $block->content;
        $this->isDiv = $block->isDiv;
    }

    public function generate()
    {
        if ($this->isDiv)
            return "\r\n<br><br>\r\n<div style=\"text-align: center;\">" . $this->content . "</div>";

        return "\r\n<br><br>\r\n".$this->content;
    }
}
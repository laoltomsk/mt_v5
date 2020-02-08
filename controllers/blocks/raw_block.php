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

    public function printCode()
    {
        print "\r\n<br><br>";
        if ($this->isDiv) {
            print "\r\n<div style=\"text-align: center;\">" . $this->content . "</div>";
        } else {
            print "\r\n".$this->content;
        }
    }
}